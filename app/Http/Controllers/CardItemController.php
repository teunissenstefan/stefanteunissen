<?php

namespace App\Http\Controllers;

use App\CardItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CardItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CardItem  $cardItem
     * @return \Illuminate\Http\Response
     */
    public function show(CardItem $cardItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CardItem  $cardItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CardItem $cardItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CardItem  $cardItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardItem $cardItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CardItem  $cardItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardItem $carditem)
    {
        $id = $carditem->cardList->id;
        $carditem->delete();
        return Redirect::route("cardlists.show",['cardlist'=>$id]);
    }
}
