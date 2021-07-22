<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modles\Author;
use App\Modles\AuthorCiteArticle;

class Article extends Model
{
    use HasFactory;
    public $id;
    public $title;
    public $link;

    public function authorCitesArticle()
    {
        return $this->hasMany(AuthorCiteArticle::class);
    }
}
