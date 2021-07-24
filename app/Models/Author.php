<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Author
 * @package App\Models
 * @version July 22, 2021, 6:58 am UTC
 *
 */
class Author extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'authors';

    public $link;
    public $alias_name;
    public $author_id;
    public $author_group;

    protected $dates = ['deleted_at'];



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
