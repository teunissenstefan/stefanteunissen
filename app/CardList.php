<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    public function element()
    {
        return $this->morphOne(Element::class, 'elementable');
    }

    public function cardItems(){
        return $this->hasMany('App\CardItem','card_list_id','id')->orderBy('created_at','desc');
    }
}
