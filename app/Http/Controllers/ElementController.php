<?php

namespace App\Http\Controllers;

use App\Element;
use App\Http\Requests\StorePage;
use App\Http\Requests\UpdatePage;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ElementController extends Controller
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
            'elements' => Element::orderBy('order','asc')->get()
        ];
        return view('elements.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        $data = [
            'element' => $element
        ];
        return view('elements.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Element $element)
    {

    }

    /**
     * Edit the element order.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeOrder()
    {
        $elements = Element::orderBy('order','asc')->get();
        $data = [
            'elements' => $elements
        ];
        return view('elements.order')->with($data);
    }

    /**
     * Update the element order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $i = 1;
        foreach($request->get("elements") as $pageId){
            $elements = Element::find($pageId);
            if($elements){
                $elements->order = $i;
                $elements->save();
            }
            $i++;
        }
        return Redirect::route('elements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        $element->delete();
        return Redirect::route("elements.index");
    }
}
