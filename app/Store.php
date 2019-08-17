<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function item()
	{
	   return $this->belongsToMany('App\Item', 'stocks' , 'store_id' ,'item_id')
	                    ->withPivot('quantity');
	}

	public function biild(){

        return $this->hasMany('App\Billd');
    }
}
