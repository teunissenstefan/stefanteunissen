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
        $data = [
            'pages' => Page::orderBy('order','asc')->get()
        ];
        return view('pages.index')->with($data);
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
        $page = new Page();
        $page->fill($request->all());
        $page->save();
        return Redirect::route('pages.index');
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
        $page->fill($request->all());
        $page->save();
        return Redirect::route('pages.index');
    }

    /**
     * Edit the page order.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeOrder()
    {
        $pages = Page::orderBy('order','asc')->get();
        $data = [
            'pages' => $pages
        ];
        return view('pages.order')->with($data);
    }

    /**
     * Update the page order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $i = 1;
        foreach($request->get("pages") as $pageId){
            $page = Page::find($pageId);
            if($page){
                $page->order = $i;
                $page->save();
            }
            $i++;
        }
        return Redirect::route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return Redirect::route("pages.index");
    }
}
