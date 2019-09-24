<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CardItem extends Model
{
    public function cardList()
    {
        return $this->belongsTo('App\CardList');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $lastItem = CardItem::where('card_list_id',$model->card_list_id)->orderBy('order','desc')->first();
            $lastOrder = $lastItem ? $lastItem->order : 0;
            $model->order = $lastOrder + 1;
        });

        self::created(function($model){

        });

        self::updating(function($model){
        });

        self::updated(function($model){
        });

        self::deleting(function($model){

        });

        self::deleted(function($model){

        });
    }
}
