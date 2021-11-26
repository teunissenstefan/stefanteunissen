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
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
        $imageName = "f" . Str::random(25) . ".webp";
        $thumbName = "t" . Str::random(25) . ".webp";
        $imageImage = Image::make($img)
            ->encode('webp');
        $thumbImage = Image::make($img)
            ->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('webp', 80);
        Storage::disk('images')->put($imageName,  $imageImage);
        Storage::disk('images')->put($thumbName,  $thumbImage);

        $cardItem = new CardItem();
        $cardItem->card_list_id = $cardlist->id;
        $cardItem->title = $request->get('title');
        $cardItem->description = $request->get('description');
        $cardItem->image = $imageName;
        $cardItem->thumb = $thumbName;
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
            $imageName = "f" . Str::random(25) . ".webp";
            $thumbName = "t" . Str::random(25) . ".webp";
            $imageImage = Image::make($img)
                ->encode('webp');
            $thumbImage = Image::make($img)
                ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('webp', 80);
            Storage::disk('images')->put($imageName,  $imageImage);
            Storage::disk('images')->put($thumbName,  $thumbImage);
            $cardItem->image = $imageName;
            $cardItem->thumb = $thumbName;
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
