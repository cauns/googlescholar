<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Helper\Helper;
use voku\helper\HtmlDomParser;
use App\Models\Author;
use App\helper\ScholarHelper;

class UpdateDatabaseRemote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:remote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command update dabase with data in remote site ';

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
        try{
            $scholarHelper = new ScholarHelper();
            //get list author
            $authors = Author::all();
            $listRequest = [];
            foreach($authors as $author){
                $data = $scholarHelper->getArticleByAuthorId($author->id);
                    
            }
            //make dir
            Storage::disk('public')->makeDirectory('download');
            //
            $client = new Client();
            $client->request('GET','https://viblo.asia/p/tim-hieu-tao-cron-job-trong-laravel-63vKjaYM52R',[
                'sink' => public_path('storage/download/x.html')
            ]);
            \Log::info("thanh cong");
        }
        catch(\Exception $exception){
            \Log::info("that bai");
            \Log::error($exception);
        }
    }
}
