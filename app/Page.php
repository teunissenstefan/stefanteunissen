<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'identifier', 'content', 'order',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $lastPage = Page::orderBy('order','desc')->first();
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
