<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\item;

class itemController extends Controller
{
    public function index()
    {
       $items = Item::get();

       return view('item.index',compact('items')); 
    }


    public function create()
    {
       $stores = Store::get();
       return view('item.create',compact('stores'));

    }

    public function store(Request $request)
    {
          $data = json_decode($_GET['emps']);

          $item = new Item;
          $item->name = $data[0]->item;
          $item->sell = $data[0]->sprice;
          $item->buy  = $data[0]->pprice;
          $item->tax = $data[0]->tax;

          $myarr = array();
          for ($i=1; $i < count($data); $i = $i + 2) 
          { 
            
            $myarr[count($myarr)] = array($data[$i] , $data[$i+1]);
          }  

          if (count($myarr) == 0) {
            
            return "false";
          }

           $item->save(); 
          
          for ($i=0; $i < count($myarr) ; $i++) 
          { 
             $item->store()->attach(Store::where('name', $myarr[$i][0])->first() ,  ['quantity'=> $myarr[$i][1] ]);
          }   
             
          
    }



    public function edit($id)
    {
        $item = Item::find($id);
        $store = Store::get();
        return view('item.edit' , compact('item' , 'store'));
    }

    public function update(Request $request)
    {

          $data = json_decode($_GET['emps']);

          $item = Item::find($data[0]->id);
          foreach ($item->store as $store) {
          $item->store()->detach($store->id);
          }
          $item->name = $data[0]->item;
          $item->sell = $data[0]->sprice;
          $item->buy  = $data[0]->pprice;

          $myarr = array();
          for ($i=1; $i < count($data); $i = $i + 2) 
          { 
            
            $myarr[count($myarr)] = array($data[$i] , $data[$i+1]);
          }  

          if (empty($myarr)) {
            
            return "false";
          }

           $item->save(); 
          
          for ($i=0; $i < count($myarr) ; $i++) 
          { 
             $item->store()->attach(Store::where('name', $myarr[$i][0])->first() ,  ['quantity'=> $myarr[$i][1] ]);
          }   
             
          
    }

    public function destroy($id)
    {
       $item = Item::find($id);
       

       foreach ($item->store as $store) {
          $item->store()->detach($store->id);
       }

      $item->destroy($id);

       return redirect(route('index.item'))->with('msg','item deleted');

    }
}
