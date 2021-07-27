<?php

namespace App\Console\Commands;

use App\Helpers\ScholarHelper;
use App\Models\AuthorCiteArticle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command get update author';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $helpers = new ScholarHelper();
            $items = DB::table('author_cite_articles')
                ->select('cites.cite_id', 'cites.link_get', 'authors.alias_name', 'author_cite_articles.total', 'authors.author_id')
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
                $result = $helpers->downloadAllFileQuote($links, public_path('storage/' . $slug));
                if ($result) {
                    foreach ($items as $item) {
                        $authorCite = AuthorCiteArticle::where('cite_id', $item->cite_id)->where('author_id', $item->author_id)->first();
                        $data = $helpers->setQuoteInArticle('storage/' . $slug . '/' . $item->cite_id . '.html', $item->total);

                        if ($data) {
                            $authorCite->total_only_author = $data['only_author'];
                            $authorCite->total_not_by_author = $data['out_author'];
                            $authorCite->status = true;
                            $authorCite->save();
                        }
                    }
                    Log::channel('history')->info('thanh cong');
                }
            }
        } catch (\Exception $exception) {
            Log::channel('history')->error('loi: ' . $exception->getMessage());
        }
    }
}
