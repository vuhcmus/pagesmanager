<?php

namespace Vuhcmus\Pagesmanager\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vuhcmus\Pagesmanager\Models\Page;
use Vuhcmus\Pagesmanager\Repositories\EloquentRepository;

class PageController extends Controller
{

    protected $model;

    /**
     * PageController constructor.
     * @param $model
     */
    public function __construct(Page $model)
    {
        $this->model = new EloquentRepository($model);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->model->all();
        return view('pagesmanager::index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesmanager::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $path = $request->file('cover')->store('public/page_cover');
        $data['slug'] = str_slug($data['title']);
        $data['cover'] = $path;
        $this->model->create($data);
        return redirect('/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->model->find($id);
        return $page;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->model->find($id);
        return view('pagesmanager::edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = $this->model->find($id);
        $data = $request->all();
        $path = $request->file('cover')->store('public/page_cover');
        $data['slug'] = str_slug($data['title']);
        $data['cover'] = $path;
        $page->update($data);
        return redirect('/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
