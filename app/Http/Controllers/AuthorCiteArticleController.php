<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorCiteArticleRequest;
use App\Http\Requests\UpdateAuthorCiteArticleRequest;
use App\Repositories\AuthorCiteArticleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AuthorCiteArticleController extends AppBaseController
{
    /** @var  AuthorCiteArticleRepository */
    private $authorCiteArticleRepository;

    public function __construct(AuthorCiteArticleRepository $authorCiteArticleRepo)
    {
        $this->authorCiteArticleRepository = $authorCiteArticleRepo;
    }

    /**
     * Display a listing of the AuthorCiteArticle.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $authorCiteArticles = $this->authorCiteArticleRepository->all();

        return view('author_cite_articles.index')
            ->with('authorCiteArticles', $authorCiteArticles);
    }

    /**
     * Show the form for creating a new AuthorCiteArticle.
     *
     * @return Response
     */
    public function create()
    {
        return view('author_cite_articles.create');
    }

    /**
     * Store a newly created AuthorCiteArticle in storage.
     *
     * @param CreateAuthorCiteArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateAuthorCiteArticleRequest $request)
    {
        $input = $request->all();

        $authorCiteArticle = $this->authorCiteArticleRepository->create($input);

        Flash::success('Author Cite Article saved successfully.');

        return redirect(route('authorCiteArticles.index'));
    }

    /**
     * Display the specified AuthorCiteArticle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $authorCiteArticle = $this->authorCiteArticleRepository->find($id);

        if (empty($authorCiteArticle)) {
            Flash::error('Author Cite Article not found');

            return redirect(route('authorCiteArticles.index'));
        }

        return view('author_cite_articles.show')->with('authorCiteArticle', $authorCiteArticle);
    }

    /**
     * Show the form for editing the specified AuthorCiteArticle.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $authorCiteArticle = $this->authorCiteArticleRepository->find($id);

        if (empty($authorCiteArticle)) {
            Flash::error('Author Cite Article not found');

            return redirect(route('authorCiteArticles.index'));
        }

        return view('author_cite_articles.edit')->with('authorCiteArticle', $authorCiteArticle);
    }

    /**
     * Update the specified AuthorCiteArticle in storage.
     *
     * @param int $id
     * @param UpdateAuthorCiteArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAuthorCiteArticleRequest $request)
    {
        $authorCiteArticle = $this->authorCiteArticleRepository->find($id);

        if (empty($authorCiteArticle)) {
            Flash::error('Author Cite Article not found');

            return redirect(route('authorCiteArticles.index'));
        }

        $authorCiteArticle = $this->authorCiteArticleRepository->update($request->all(), $id);

        Flash::success('Author Cite Article updated successfully.');

        return redirect(route('authorCiteArticles.index'));
    }

    /**
     * Remove the specified AuthorCiteArticle from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $authorCiteArticle = $this->authorCiteArticleRepository->find($id);

        if (empty($authorCiteArticle)) {
            Flash::error('Author Cite Article not found');

            return redirect(route('authorCiteArticles.index'));
        }

        $this->authorCiteArticleRepository->delete($id);

        Flash::success('Author Cite Article deleted successfully.');

        return redirect(route('authorCiteArticles.index'));
    }
}
