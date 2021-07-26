<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Author
 * @package App\Models
 * @version July 24, 2021, 10:27 am UTC
 *
 * @property string $author_id
 * @property string $alias_name
 * @property string $link
 * @property string $author_group
 */
class Author extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'authors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'author_id',
        'alias_name',
        'link',
        'author_group'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'author_id' => 'string',
        'alias_name' => 'string',
        'link' => 'string',
        'author_group' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'author_id' => 'required'
    ];

    public function authorCitesArticle()
    {
        return $this->hasMany(AuthorCiteArticle::class);
    }

    
}
