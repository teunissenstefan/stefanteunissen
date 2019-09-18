<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Element extends Model
{
    public function elementable()
    {
        return $this->morphTo();
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $lastPage = Element::orderBy('order','desc')->first();
            $lastOrder = $lastPage ? $lastPage->order : 0;
            $model->order = $lastOrder + 1;
            if(!$model->identifier){
                $model->identifier = Str::random(3) . "-" . Str::slug($model->title);
            }
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
