<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\Item;
use App\Store;

class stockController extends Controller
{
        public function index()
    {
       $stocks = Stock::get();
       return view('stock.index',compact('stocks')); 
    }


    public function create()
    {

       return view('stock.create');

    }

    public function store(Request $request)
    {

        $item = Item::where('id' , $request->input('it_id'))->first();
        $store = Store::where('id' , $request->input('st_id'))->first();

        $this->validate($request,[

            'it_id'=>'required|integer|max:255',
            'st_id'=>'required|integer|max:255',
            'qua'  => 'required|max:255'
       ]);

       if( empty($item) || empty($store) )
       {
         return redirect(route('index.stock'))->with('msgerr','maybe store or item not found ');
       }
  
       $stock = new Stock;

       $stock->item_id = $request->input('it_id');
       $stock->store_id = $request->input('st_id');
       $stock->quantity = $request->input('qua');
       $stock->save();

       return redirect(route('index.stock'))->with('msg','stock created');

    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stock.edit' , compact('stock'));
    }

    public function update(Request $request , $id)
    {
       $stock = Stock::find($id);

       $this->validate($request,[

            'it_id'=>'required|integer|max:255',
            'st_id'=>'required|integer|max:255',
            'qua'  => 'required|max:255'
       ]);

  

       $stock->item_id = $request->input('it_id');
       $stock->store_id = $request->input('st_id');
       $stock->quantity = $request->input('qua');
       $stock->save();

       return redirect(route('index.stock'))->with('msg','stock Edited');
    }

    public function destroy($id)
    {
       $stock = stock::find($id);
       
       $stock->destroy($id);

        return redirect(route('index.sotre'))->with('msg','stock deleted');

    }
}
