<?php

namespace App\Repositories;

use App\Models\AuthorCiteArticle;
use App\Repositories\BaseRepository;

/**
 * Class AuthorCiteArticleRepository
 * @package App\Repositories
 * @version July 24, 2021, 10:36 am UTC
*/

class AuthorCiteArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'author_id',
        'cite_id',
        'article_id',
        'by_author'
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
        return AuthorCiteArticle::class;
    }
}
