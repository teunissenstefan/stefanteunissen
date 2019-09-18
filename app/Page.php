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

    public function element()
    {
        return $this->morphOne(Element::class, 'elementable');
    }
}
