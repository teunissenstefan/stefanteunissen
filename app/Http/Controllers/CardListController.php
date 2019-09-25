<?php

namespace App\Http\Controllers;

use App\CardItem;
use App\CardList;
use App\Http\Requests\StoreCardList;
use App\Http\Requests\UpdateCardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CardListController extends Controller
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
        return view('cardlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardList $request)
    {
        $class = 'App\\CardList';
        $cardlist = new $class;
        $cardlist->save();
        $element = new \App\Element();
        $element->title = $request->get('title');
        $element->elementable()->associate($cardlist);
        $element->save();
        return Redirect::route('cardlists.show',['cardlist'=>$cardlist->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function show(CardList $cardlist)
    {
        $data = [
            'cardList' => $cardlist
        ];
        return view('cardlists.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function edit(CardList $cardlist)
    {
        $cardlist['title'] = $cardlist->element->title;
        $data = [
            'cardList' => $cardlist
        ];
        return view('cardlists.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardList $request, CardList $cardlist)
    {
        $cardlist->element->title = $request->get('title');
        $cardlist->element->save();
        $cardlist->save();
        return Redirect::route('cardlists.show',['cardlist'=>$cardlist]);
    }

    /**
     * Edit the card items order.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeOrder(CardList $cardlist)
    {
        $carditems = CardItem::where('card_list_id',$cardlist->id)->orderBy('order','asc')->get();
        $data = [
            'carditems' => $carditems,
            'cardList' => $cardlist
        ];
        return view('cardlists.order')->with($data);
    }

    /**
     * Update the card items order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $i = 1;
        foreach($request->get("carditems") as $carditemId){
            $cardItems = CardItem::find($carditemId);
            if($cardItems){
                $cardItems->order = $i;
                $cardItems->save();
            }
            $i++;
        }
        return Redirect::route('cardlists.show',['cardlist'=>$request->get('cardlistid')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CardList  $cardList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardList $cardList)
    {
        //
    }
}
