<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billh extends Model
{
    public function user(){

    	return $this->belongsTo('App\User' , "client_id");
    }

    public function biild(){

        return $this->hasMany('App\Billd' ,"billhs_id");
    }


}
