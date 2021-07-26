<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCiteRequest;
use App\Http\Requests\UpdateCiteRequest;
use App\Repositories\CiteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CiteController extends AppBaseController
{
    /** @var  CiteRepository */
    private $citeRepository;

    public function __construct(CiteRepository $citeRepo)
    {
        $this->citeRepository = $citeRepo;
    }

    /**
     * Display a listing of the Cite.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cites = $this->citeRepository->all();

        return view('cites.index')
            ->with('cites', $cites);
    }

    /**
     * Show the form for creating a new Cite.
     *
     * @return Response
     */
    public function create()
    {
        return view('cites.create');
    }

    /**
     * Store a newly created Cite in storage.
     *
     * @param CreateCiteRequest $request
     *
     * @return Response
     */
    public function store(CreateCiteRequest $request)
    {
        $input = $request->all();

        $cite = $this->citeRepository->create($input);

        Flash::success('Cite saved successfully.');

        return redirect(route('cites.index'));
    }

    /**
     * Display the specified Cite.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cite = $this->citeRepository->find($id);

        if (empty($cite)) {
            Flash::error('Cite not found');

            return redirect(route('cites.index'));
        }

        return view('cites.show')->with('cite', $cite);
    }

    /**
     * Show the form for editing the specified Cite.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cite = $this->citeRepository->find($id);

        if (empty($cite)) {
            Flash::error('Cite not found');

            return redirect(route('cites.index'));
        }

        return view('cites.edit')->with('cite', $cite);
    }

    /**
     * Update the specified Cite in storage.
     *
     * @param int $id
     * @param UpdateCiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCiteRequest $request)
    {
        $cite = $this->citeRepository->find($id);

        if (empty($cite)) {
            Flash::error('Cite not found');

            return redirect(route('cites.index'));
        }

        $cite = $this->citeRepository->update($request->all(), $id);

        Flash::success('Cite updated successfully.');

        return redirect(route('cites.index'));
    }

    /**
     * Remove the specified Cite from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cite = $this->citeRepository->find($id);

        if (empty($cite)) {
            Flash::error('Cite not found');

            return redirect(route('cites.index'));
        }

        $this->citeRepository->delete($id);

        Flash::success('Cite deleted successfully.');

        return redirect(route('cites.index'));
    }
}
