<?php

namespace App\Repositories;

use App\Helpers\ScholarHelper;
use App\Models\Author;
use App\Models\AuthorCiteArticle;
use App\Models\Cite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class AuthorRepository
 * @package App\Repositories
 * @version July 24, 2021, 10:27 am UTC
*/

class AuthorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'author_id',
        'alias_name',
        'link',
        'author_group'
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
        return Author::class;
    }

    public function create($input)
    {

        $helper = new ScholarHelper();
        $data = $helper->getArticleByAuthorId($input['author_id']);
        $input['alias_name'] = $data['alias_name'];
        $slug = Str::slug($data['alias_name']);
        Storage::disk('public')->makeDirectory($slug);
        $model = $this->model->newInstance($input);
        try {
            DB::beginTransaction();
            foreach ($data['publications']['list'] as $key => $item) {
                $cite = DB::table('cites')->select('*')->where('cite_id', $key)->first();
                if (!$cite) {
                    $cite = new Cite();
                    $cite->cite_id = $key;
                    $cite->link_get = $item['link_get'];
                    $cite->link = $item['link'];
                    $cite->title = $item['title'];
                    $cite->author = $item['author'];
                    $cite->sub_title = $item['sub_title'];
                    $cite->year = $item['year'];
                    $cite->save();
                }

                //set author cites
                $authorCites = DB::table('author_cite_articles')->select('*')
                    ->where('cite_id', $key)
                    ->where('author_id', $input['author_id'])->first();

                if (!$authorCites) {
                    $authorCites = new AuthorCiteArticle();
                    $authorCites->author_id = $input['author_id'];
                    $authorCites->cite_id = $key;
                    $authorCites->total = $item['total_citations'];
                    $authorCites->total_only_author = 0;
                    $authorCites->total_not_by_author = 0;
                    $authorCites->status = 0;
                    $authorCites->save();
                }
            }
            $model->save();
            DB::commit();
            return $model;
        }
        catch (\Exception $exception){
            Log::error($exception);
            DB::rollBack();
            return false;
        }
    }
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }
}
