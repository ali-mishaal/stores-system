<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class storesController extends Controller
{
    
     public function index()
    {
       $stores = Store::get();
       return view('store.index',compact('stores')); 
    }


    public function create()
    {

       return view('store.create');

    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required|string|max:255',
       ]);

        $check = Store::where('name',$request->input('name'))->first();
        if(count($check) > 0)
        {
          return redirect(route('create.sotre'))->with('msgerr',"you can't add sotre 
            with the same name");
        }

       $sotre = new Store;

       $sotre->name = $request->input('name');
       $sotre->save();
       return redirect(route('index.sotre'))->with('msg',"store created");

    }

    public function edit($id)
    {
        $store = Store::where('id' , $id);
        print_r($store);die;
        return view('store.edit' , compact('store'));
    }

    public function update(Request $request , $id)
    {
       $store = Store::find($id);
       $this->validate($request,[

            'name'=>'required|string|max:255',
       ]);


       $store->name = $request->input('name');
       $store->save();

       return redirect(route('index.sotre'))->with('msg','store edited');
    }

    public function destroy($id)
    {
       $store = Store::find($id);
       
       foreach ($store->item as $item) {
          $store->item()->detach($item->id);
       }
       
       $store->destroy($id);

        return redirect(route('index.sotre'))->with('msg','store deleted');

    }
}
