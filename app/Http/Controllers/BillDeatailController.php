<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billd;
use App\Store;
use App\Item;
use App\Billh;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class BillDeatailController extends Controller
{
    public function index()
    {
       $bills = Billd::get();

       return view('billdetail.index',compact('bills')); 
    }

    public function create()
    {
       $bills = Billh::get();
       $stores = Store::get(); 
       return view('billdetail.create', compact('bills' , 'stores'));
    }

    public function store(Request $request)
    {
      
        $this->validate($request,[

            'billh'=>'required|numeric',
            'store'=>'required|string',
            'item'=>'required|string',
            'qua'=>'required|numeric',
            'price'=>'required|numeric',
            'total'=>'required|numeric',

       ]);


       $billh = Billh::find($request->input('billh'));
       $billh->total = $billh->total + $request->input('total');
       $billh->save();
       
       $bill = new Billd;

       $bill->billhs_id = $request->input('billh');
       $bill->store_id = $request->input('store');
       $bill->item_id = $request->input('item');
       $bill->quantity = $request->input('qua');
       $bill->price = $request->input('price');
       $bill->total = $request->input('total');
       $bill->save();

       return redirect(route('index.detail'))->with('msg','bill detail created');

    }

    public function edit($id)
    {
       $bill = Billd::find($id);
       $bills = Billh::get();
       $stores = Store::get(); 
       return view('billdetail.edit', compact('bill','bills' , 'stores'));
    }

    public function update(Request $request ,$id)
    {
        $bill = Billd::find($id);

        $this->validate($request,[

            'billh'=>'required|numeric',
            'store'=>'required|string',
            'item'=>'required|string',
            'qua'=>'required|numeric',
            'price'=>'required|numeric',
            'total'=>'required|numeric',
       ]);

       $billh = Billh::find($request->input('billh'));
       $billh->total = $billh->total - $bill->total + $request->input('total');
       $billh->save();
       
       

       $bill->billhs_id = $request->input('billh');
       $bill->store_id = $request->input('store');
       $bill->item_id = $request->input('item');
       $bill->quantity = $request->input('qua');
       $bill->price = $request->input('price');
       $bill->total = $request->input('total');
       $bill->save();

       return redirect(route('index.detail'))->with('msg','bill detail edited');

    }


    public function destroy($id)
    {
    	$bill = Billd::find($id);

    	$billh = Billh::find($bill->billhs_id);

        $billh->total = $billh->total - $bill->total;
        $billh->save();

        $bill->destroy($id);

        return redirect(route('index.detail'))->with('msg','bill detail edited');
    }

}
