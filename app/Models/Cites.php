<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modles\AuthorCiteArticle;

class Cites extends Model
{
    use HasFactory;
    public $id;
    public $cites_id;
    public $total;
    public $total_only_author;
    public $total_not_author;

    public function authorCitesArticle()
    {
        return $this->hasMany(AuthorCiteArticle::class);
    }
}
