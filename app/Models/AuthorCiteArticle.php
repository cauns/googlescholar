<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AuthorCiteArticle
 * @package App\Models
 * @version July 24, 2021, 10:36 am UTC
 *
 * @property string $author_id
 * @property string $cite_id
 * @property string $article_id
 * @property boolean $by_author
 */
class AuthorCiteArticle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'author_cite_articles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'author_id',
        'cite_id',
        'by_author',
        'status',
        'total' => 'integer',
        'total_only_author' => 'integer',
        'total_not_by_author' => 'integer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'author_id' => 'string',
        'cite_id' => 'string',
        'by_author' => 'boolean',
        'status' => 'boolean',
        'total' => 'integer',
        'total_only_author' => 'integer',
        'total_not_by_author' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'author_id' => 'required',
        'cite_id' => 'required'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }

    public function cites()
    {
        return $this->belongsTo(Cite::class, 'cite_id', 'cite_id');
    }

    
}
