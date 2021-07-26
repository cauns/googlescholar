<?php


namespace App\Helpers;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use voku\helper\HtmlDomParser;

class Service
{
    public function downloadFile($folder,$fileName,$url){
       try {
           if (!Storage::disk('public')->exists($folder)) {
               Storage::disk('public')->makeDirectory($folder);
           }
           $clien = new Client();
           $contents = $clien->get($url, ['sink' => public_path('storage/' . $folder . '/' . $fileName)]);
           return $contents;
       }
       catch (\Exception $exception){
           return false;
       }
    }

    public  function getArticleByAuthorId($id)
    {
        $html = HtmlDomParser::file_get_html('http://scholar.google.se/citations?user=' . $id, false, null, 0);
        $result = $html->find("#gsc_rsb_st td.gsc_rsb_std", 0);
        if (!$result) {
            return response()->json([
                'status' => 202,
                'data' => '<p>Không tìm thấy tác giả</p>'
            ]);
        }

        $data = [];
        $data['total_citations'] = $html->find("#gsc_rsb_st td.gsc_rsb_std", 0)->plaintext;
        $data['years'] = $html->findMulti('.gsc_g_t');
        $data['scores'] = $html->findMulti('.gsc_g_al');
        $data['publications'] = $html->findMulti("#gsc_a_t .gsc_a_tr");
        $data['information'] = $html->findOne('#gsc_prf_i');
        $data['alias_name'] = $data['information']->find('#gsc_prf_in', 0)->plaintext;
        $data['same_author'] = $html->findOne('#gsc_rsb_co');
        $data['publications']['list'] = [];
        $slugName = Str::slug($data['alias_name']);
        $listLink = [];
//        foreach ($data['publications'] as $pub) {
//            $pub1 = $pub;
//            $temp = [];
//            if (is_array($pub)) {
//                break;
//            }
//            try {
//                preg_match_all('/cites=\d+/m', $pub->findOne(".gsc_a_c a", 0)->href, $citesArr, PREG_SET_ORDER, 0);
//                if(isset($citesArr[0][0])) {
//                    preg_match_all('/\d+/m', $citesArr[0][0], $citesArr, PREG_SET_ORDER, 0);
//                    $cites = (isset($citesArr[0][0])) ? $citesArr[0][0] : 0;
//                    $temp['cites'] = $cites;
//                    $temp['link_get'] = 'https://scholar.google.com/scholar?hl=vi&&scipsc=1&q=-%22' . $data['alias_name'] . '%22&cites=' . $cites;
//                    $temp['link'] = 'https://scholar.google.com/' . $pub1->findOne(".gsc_a_t a", 0)->href;
//                    $temp['title'] = trim($pub1->findOne(".gsc_a_at", 0)->plaintext);
//                    $temp['author'] = trim($pub1->findOne(".gsc_a_at", 0)->plaintext);
//                    $temp['sub_title'] = trim($pub1->findOne(".gs_gray", 1)->plaintext);
//                    $temp['total_citations'] = (int)$pub1->findOne(".gsc_a_ac", 0)->plaintext;
//                    $temp['year'] = $pub1->findOne(".gsc_a_y", 0)->plaintext;
//                    $listLink[$cites] = $temp['link_get'];
//                    Storage::disk('public')->makeDirectory($slugName);
//                    if (Storage::disk('public')->exists(Str::slug($data['alias_name']) . '/x.html')) {
//                        $cacuale = $this->setQuoteInArticle(Str::slug($data['alias_name']) . '/x.html', (int)$temp['total_citations']);
//                        if ($cacuale) {
//                            $temp['total_out_author'] = $cacuale['out_author'];
//                            $temp['total_only_author'] = $cacuale['only_author'];
//                        }
//                    } else {
//                        $temp['total_out_author'] = 0;
//                        $temp['total_only_author'] = 0;
//                    }
//                    $data['publications']['list'][$cites] = $temp;
//                }
//            } catch (\Exception $exception) {
//                Log::error($exception);
//                break;
//            }
//
//        }
        return $data;
    }
}
