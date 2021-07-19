<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 7/17/21
 * Time: 2:46 PM
 */

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use function GuzzleHttp\Promise\unwrap;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use voku\helper\HtmlDomParser;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function search(Request $request){
        if ($request->ajax()) {
            $html = HtmlDomParser::file_get_html('http://scholar.google.se/citations?user='.$request->request->get('search'),false, null, 0);
            $result = $html->find("#gsc_rsb_st td.gsc_rsb_std", 0);
            if(!$result){
                return response()->json([
                    'status' => 202,
                    'data' => '<p>Không tìm thấy tác giả</p>'
                ]);
            }
//            $x = new Client();
//            $html1 = $x->request('GET','https://scholar.google.com/scholar?oi=bibs&hl=vi&cites=11309449965069791253',[
//                'sink' => public_path('storage/x.html')
//            ]);
//            dd($html1);
            $data = [];
            $data['total_citations'] = $html->find("#gsc_rsb_st td.gsc_rsb_std", 0)->plaintext;
            $data['years'] = $html->findMulti('.gsc_g_t');
            $data['scores'] = $html->findMulti('.gsc_g_al');
            $data['publications'] = $html->findMulti("#gsc_a_t .gsc_a_tr");
            $data['information'] = $html->findOne('#gsc_prf_i');
            $data['alias_name'] = $data['information']->find('#gsc_prf_in',0)->plaintext;
            $data['same_author'] = $html->findOne('#gsc_rsb_co');
            $data['publications']['list'] = [];
            $slugName = Str::slug($data['alias_name']);
            $listLink = [];
            foreach ($data['publications'] as $pub){
                $pub1 = $pub;
                $temp = [];
                if(is_array($pub)){
                    break;
                }
                try {
                    preg_match_all('/cites=\d+/m', $pub->findOne(".gsc_a_c a", 0)->href, $citesArr, PREG_SET_ORDER, 0);
                    preg_match_all('/\d+/m', $citesArr[0][0], $citesArr, PREG_SET_ORDER, 0);
                    $cites = (isset($citesArr[0][0])) ? $citesArr[0][0] : 0;
                    $temp['cites'] = $cites;
                    $temp['link_get'] = 'https://scholar.google.com/scholar?hl=vi&&scipsc=1&q=-%22' . $data['alias_name'] . '%22&cites=' . $cites;
                    $temp['link'] = 'https://scholar.google.com/' . $pub1->findOne(".gsc_a_t a", 0)->href;
                    $temp['title'] = trim($pub1->findOne(".gsc_a_at", 0)->plaintext);
                    $temp['author'] = trim($pub1->findOne(".gsc_a_at", 0)->plaintext);
                    $temp['sub_title'] = trim($pub1->findOne(".gs_gray", 1)->plaintext);
                    $temp['total_citations'] = (int)$pub1->findOne(".gsc_a_ac", 0)->plaintext;
                    $temp['year'] = $pub1->findOne(".gsc_a_y", 0)->plaintext;
                    $listLink[$cites] = $temp['link_get'];
                    $data['publications']['list'][$cites] = $temp;
                    Storage::disk('public')->makeDirectory($slugName);
                }
                catch (\Exception $exception){
                    break;
                }


//                if(isset($citesArr[0][0])) {
//                    preg_match_all('/\d+/m', $citesArr[0][0], $citesArr, PREG_SET_ORDER, 0);
//                    $cites = (isset($citesArr[0][0])) ? $citesArr[0][0] : 0;
//                    $temp['cites'] = $cites;
//                    $temp['link_get'] =  'https://scholar.google.com/scholar?hl=vi&&scipsc=1&q=-%22' . $data['alias_name'] . '%22&cites=' . $cites;
//                    $cuz = new Client();
//                    $fileName = Str::slug($data['alias_name']) . '_' . $cites . '.html';
//
//                    $cuz->request('GET', 'https://scholar.google.com/scholar?hl=vi&&scipsc=1&q=-%22' . $data['alias_name'] . '%22&' . $cites[0], ['sink' => public_path('storage/' . $fileName)]);
//
//                    $htmlDomInner = new HtmlDomParser();
//                    $htmlInner = $htmlDomInner->load_file(public_path("storage/" . $fileName));
//
//                    $str = $htmlInner->find('#gs_ab_md .gs_ab_mdw', 0)->plaintext;
//                    preg_match_all('/\s\d+\s/', $str, $matches, PREG_SET_ORDER, 0);
//                    $temp['total_citations_minus_author'] = isset($matches[0][0]) ? (int)trim($matches[0][0]) : 0;
//                }
//                $temp['total_citations_author'] =  $temp['total_citations'] - $temp['total_citations_minus_author'];


            }
            $client = new Client();
            $requestPromises = [];
            foreach ($listLink as $key => $site) {
                $requestPromises[$key] = $client->getAsync($site,['sink' => public_path('storage/'.$slugName.'/' . $key.'.html')]);
            }
            $results = unwrap($requestPromises);
//            foreach ($data['publications']['list'] as $key => $item){
//                    $htmlDomInner = new HtmlDomParser();
//                    $htmlInner = $htmlDomInner->load_file(public_path("storage/" .$slugName."/".$key.'.html'));
//                    $str = $htmlInner->find('#gs_ab_md .gs_ab_mdw', 0)->plaintext;
//                    preg_match_all('/\s\d+\s/', $str, $matches, PREG_SET_ORDER, 0);
//                    //dd($matches);
//                    $data['publications']['list'][$key]['total_citations_minus_author'] = isset($matches[0][0]) ? (int)trim($matches[0][0]) : 0;
//                    $data['publications']['list'][$key]['total_citations_by_author'] = $data['publications']['list'][$key]['total_citations'] - $data['publications']['list'][$key]['total_citations_minus_author'];
//            }

            $viewHtml = view('result', compact('data'))->render();
            return response()->json([
                'status' => 200,
                'data' => $viewHtml,
                'code' => $data['publications']['list'],
            ]);

        }


        return \response()->json([
           'status' => 201,
           'data' =>  'omg'
        ]);
    }
}
