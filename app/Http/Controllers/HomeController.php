<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function frontEnd()
    {
        $items = DB::table('author_cite_articles')
            ->select('cites.*', 'authors.alias_name','authors.author_id','author_cite_articles.total as x_total','author_cite_articles.total_only_author as x_total_only_author','author_cite_articles.total_not_by_author as x_total_not_by_author')
            ->leftJoin('authors', 'author_cite_articles.author_id', '=', 'authors.author_id')
            ->leftJoin('cites', 'cites.cite_id', '=', 'author_cite_articles.cite_id')
            ->get();
        return response(json_encode($items));
    }
}
