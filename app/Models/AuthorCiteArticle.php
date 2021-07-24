<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthorCiteArticle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'author_cite_articles';
    public $id;
    public $author_id;
    public $article_id;
    public $cites_id;
    public $by_author;

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }

    public function cites()
    {
        return $this->belongsTo(Cites::class, 'cites_id', 'cites_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'id', 'article_id');
    }
}
