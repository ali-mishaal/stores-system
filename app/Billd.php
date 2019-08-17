<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billd extends Model
{
    public function billh(){

    	return $this->belongsTo('App\Billh' , "billhs_id");
    }

    public function item(){

    	return $this->belongsTo('App\Item');
    }

    public function store(){

    	return $this->belongsTo('App\Store');
    }
}
