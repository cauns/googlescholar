<?php

namespace App\Repositories;

use App\Models\Cite;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class CiteRepository
 * @package App\Repositories
 * @version July 24, 2021, 10:32 am UTC
*/

class CiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cite_id',
        'total',
        'total_only_author',
        'total_not_by_author'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cite::class;
    }

    public static function findByCiteId($id){
        return DB::table('cites')->select('*')->where('cite_id',$id)->first();
    }
}
