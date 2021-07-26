<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 7/25/21
 * Time: 4:11 PM
 */

namespace App\Http\Controllers;


use App\Helpers\ScholarHelper;
use App\Models\AuthorCiteArticle;
use App\Models\Cite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function index()
    {
        try {
            $helpers = new ScholarHelper();
            $items = DB::table('author_cite_articles')
                ->select('cites.cite_id','cites.link_get', 'authors.alias_name','author_cite_articles.total','authors.author_id')
                ->leftJoin('authors', 'author_cite_articles.author_id', '=', 'authors.author_id')
                ->leftJoin('cites', 'cites.cite_id', '=', 'author_cite_articles.cite_id')
                ->where('author_cite_articles.status', 0)
                ->get();

            if (count($items) > 0) {
                $links = [];
                $aliasName = null;
                foreach ($items as $item) {
                    $links[$item->cite_id] = $item->link_get;
                    $aliasName = $item->alias_name;
                }
                $slug = Str::slug($aliasName);
                Storage::disk('public')->makeDirectory($slug);
                //$result = $helpers->downloadAllFileQuote($links, public_path('storage/' . $slug));
                if (true) {
                    foreach ($items as $item) {
                        $authorCite = AuthorCiteArticle::where('cite_id', $item->cite_id)->where('author_id',$item->author_id)->first();
                        $data = $helpers->setQuoteInArticle('storage/' . $slug . '/' . $item->cite_id . '.html', $item->total);

                        if ($data) {
                            $authorCite->total_only_author = $data['only_author'];
                            $authorCite->total_not_by_author = $data['out_author'];
                            $authorCite->status = true;
                            $authorCite->save();
                        }
                    }
                    dd('done');
                }
            }
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}
