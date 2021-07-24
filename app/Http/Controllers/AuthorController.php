<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $authors = Author::all();
            return datatables()->of($authors)
                ->addColumn('action', function ($row) {
                    $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a> ';
                    $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
                    return $html;
                })->toJson();
        }

        return view('authors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Author::create($request->all());
        return ['success' => true, 'message' => 'Inserted Successfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Author::find($id)->update(request()->all());
        return ['success' => true, 'message' => 'Updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::find($id)->delete();
        return ['success' => true, 'message' => 'Deleted Successfully'];
    }
}
