<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function store()
	{
	   return $this->belongsToMany('App\Store', 'stocks' , 'item_id' ,'store_id')
	                    ->withPivot('quantity');
	}

	public function biild(){

        return $this->hasMany('App\Billd');
    }
}
