<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePage;
use App\Http\Requests\UpdatePage;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {
        $class = 'App\\Page';
        $elementable = new $class;
        $elementable->content = $request->get('content');
        $elementable->save();
        $element = new \App\Element();
        $element->title = $request->get('title');
        $element->elementable()->associate($elementable);
        $element->save();
        return Redirect::route('elements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page['identifier'] = $page->element->identifier;
        $page['title'] = $page->element->title;
        $data = [
            'page' => $page
        ];
        return view('pages.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePage $request, Page $page)
    {
        $page->content = $request->get('content');
        $page->element->title = $request->get('title');
        $page->element->identifier = $request->get('identifier');
        $page->element->save();
        $page->save();
        return Redirect::route('elements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {

    }
}
