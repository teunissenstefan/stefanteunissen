<?php

namespace App\Http\Controllers;

use App\CardItem;
use App\CardList;
use App\Http\Requests\StoreCardItem;
use App\Http\Requests\UpdateCardItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CardItemController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CardList $cardlist)
    {
        $data = [
            'cardList' => $cardlist
        ];
        return view('carditems.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardItem $request, CardList $cardlist)
    {
        $img = $request->file('image');
        $filename = $img->getFilename().'.'.$img->getClientOriginalExtension();
        Storage::disk('images')->put($filename,  File::get($img));

        $cardItem = new CardItem();
        $cardItem->card_list_id = $cardlist->id;
        $cardItem->title = $request->get('title');
        $cardItem->description = $request->get('description');
        $cardItem->image = $filename;
        $cardItem->btn_code = $request->get('btn_code');
        $cardItem->btn_demo = $request->get('btn_demo');
        $cardItem->technologies = json_encode(array_map('trim',explode(',',$request->get('technologies'))));
        $cardItem->save();
        return Redirect::route('cardlists.show',['cardlist'=>$cardlist->id]);
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
    public function edit(CardItem $carditem)
    {
        $i = 0;
        $technologiesArray = json_decode($carditem->technologies);
        $len = count($technologiesArray);
        $technologiesString = "";
        foreach($technologiesArray as $technology){
            $i++;
            $technologiesString.= $technology;
            if($i !== ($len)){
                $technologiesString .= ", ";
            }
        }
        $carditem['technologies'] = $technologiesString;
        $data = [
            'cardItem' => $carditem
        ];
        return view('carditems.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CardItem  $cardItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardItem $request, CardItem $carditem)
    {
        $cardItem = $carditem;

        if($request->file('image')){
            $img = $request->file('image');
            $filename = $img->getFilename().'.'.$img->getClientOriginalExtension();
            Storage::disk('images')->put($filename,  File::get($img));
            $cardItem->image = $filename;
        }

        $cardItem->title = $request->get('title');
        $cardItem->description = $request->get('description');
        $cardItem->btn_code = $request->get('btn_code');
        $cardItem->btn_demo = $request->get('btn_demo');
        $cardItem->technologies = json_encode(array_map('trim',explode(',',$request->get('technologies'))));
        $cardItem->save();
        return Redirect::route('cardlists.show',['cardlist'=>$carditem->cardList->id]);
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
