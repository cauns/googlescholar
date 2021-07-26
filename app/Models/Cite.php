<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cite
 * @package App\Models
 * @version July 24, 2021, 10:32 am UTC
 *
 * @property string $cite_id
 * @property integer $total
 * @property integer $total_only_author
 * @property integer $total_not_by_author
 */
class Cite extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cites';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cite_id',
        'link_get',
        'link',
        'title',
        'author',
        'sub_title',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cite_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cite_id' => 'required'
    ];

    public function authorCitesArticle()
    {
        return $this->hasMany(AuthorCiteArticle::class);
    }


    
}
