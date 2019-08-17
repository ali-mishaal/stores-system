<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billh;
use App\User;
use App\Store;
use App\Item;
use App\Billd;

class BillHeadController extends Controller
{
    public function index()
    {
       $bills = Billh::get();

       return view('billhead.index',compact('bills')); 
    }

    public function create()
    {  
       $users = User::get();
       $bills = Billh::latest()->first();

       if (empty($bills)) 
       {
       	$id = 1;
       }else
       {
       	$id = $bills->id + 1;
       }

       $stores = Store::get();

       

       return view('billhead.create',compact('id' , 'users' ,  'stores'));

    }

    public function edit($id)
    {
       $bill = Billh::find($id);
       $users = User::get();
       $stores = Store::get();
       
       return view('billhead.edit',compact('bill','users' , 'stores'));

    }


    public function getitem(Request $request)
    {
        $data = (int)$_GET['id'];
      
        $store = Store::where('id',$data)->first();

        $items = "<option value='select'>select item</option>";

        foreach ($store->item as $item) 
        {
         $items .= "<option value='".$item->id."'>".$item->name."</option>";
        }

        return $items;
    }

    public function getprice(Request $request)
    {
      $data = json_decode($_GET['emps']);

      $gtt_item = Item::where('id',$data[0]->item)->first();
      $quantity = $gtt_item->store->where('id',$data[0]->store)->first();

      $price = $gtt_item->sell;
      $qua = $quantity->pivot->quantity ;
      $tax = $gtt_item->tax; 
       $data=array(

           "price" => $price,
           "quantity" => $qua,
            "tax"     => $tax,
       );

      return $data;

      
    }

     public function getpriceedit(Request $request)
    {
      $data = json_decode($_GET['emps']);

      $gtt_item = Item::where('id',$data[0]->item)->first();
      $gtt_store = Store::where('id',$data[0]->store)->first();
      $quantity = $gtt_item->store->where('id',$data[0]->store)->first();
      
      $billd = Billd::where('item_id' , $data[0]->item)->where('store_id',$data[0]->store)->where('billhs_id', $data[0]->bill)->first();

      if($billd)
      {
        $price = $gtt_item->sell;
        $tax = $gtt_item->tax; 
        $qua = $quantity->pivot->quantity + $billd->quantity;
        $value = $quantity->pivot->quantity;
      }else
      {
        $price = $gtt_item->sell;
        $tax = $gtt_item->tax; 
        $qua = $quantity->pivot->quantity ;
        $value = $quantity->pivot->quantity;
      }

      

       $re=array(

           "price" => $price,
           "quantity" => $qua,
           "value"    => $value,
           "tax"     => $tax,
       );

      return $re;

      
    }


    public function store(Request $request)
    {
          $data = json_decode($_GET['emps']);
          
          

          $bill = new Billh;
          $bill->id = $data[0]->id;
          $bill->billdate = $data[0]->date;
          $bill->client_id = $data[0]->client;
          $bill->total  = $data[0]->total;
          $bill->paid = $data[0]->paid;
          $bill->remain  = $data[0]->remain;
         

          $myarr = array();
          for ($i=1; $i < count($data); $i = $i + 5) 
          { 
            
            $myarr[count($myarr)] = array(
                                       "item"=>$data[$i] , 
                                       "store"=>$data[$i+1] , 
                                       "quantity"=>$data[$i+2] , 
                                       "price"=>$data[$i+3] , 
                                       "total"=>$data[$i+4]
                                     );
          }  

          if (count($myarr) == 0) {
            
            return "false";
          }
          
        
          
          for ($x=0; $x < count($myarr) ; $x++) 
          { 
              $store = Store::where('name' , $myarr[$x]['store'])->first();
              $item = Item::where('name', $myarr[$x]['item'])->first();
              
              $quantit =$item->store->where('name' , $myarr[$x]['store'])->first();

              if($myarr[$x]['quantity'] > $quantit->pivot->quantity || $myarr[$x]['quantity'] == 0)
              {
                return "no";
              }

              $quantit->pivot->quantity = $quantit->pivot->quantity - $myarr[$x]['quantity'];
              $quantit->pivot->update();

              $billd = new Billd;
              $billd->billhs_id= $data[0]->id;
              $billd->item_id = $item->id;
              $billd->store_id = $store->id;
              $billd->quantity = $myarr[$x]['quantity'];
              $billd->price = $myarr[$x]['price'];
              $billd->total = $myarr[$x]['total'];
              $billd->save();
          }
           
             $bill->save();     
        
    }


    public function update(Request $request)
    {
          $data = json_decode($_GET['emps']);
          
          $bill = Billh::find($data[0]->id);
          $bill->billdate = $data[0]->date;
          $bill->client_id = $data[0]->client;
          $bill->total  = $data[0]->total;
          $bill->paid = $data[0]->paid;
          $bill->remain  = $data[0]->remain;
         

          $myarr = array();
          for ($i=1; $i < count($data); $i = $i + 5) 
          { 
            
            $myarr[count($myarr)] = array(
                                       "item"=>$data[$i] , 
                                       "store"=>$data[$i+1] , 
                                       "quantity"=>$data[$i+2] , 
                                       "price"=>$data[$i+3] , 
                                       "total"=>$data[$i+4]
                                     );
          }  

          if (count($myarr) == 0) {
            
            return "false";
          }

          for ($x=0; $x < count($myarr) ; $x++) 
          { 
              $store = Store::where('name' , $myarr[$x]['store'])->first();
              $item = Item::where('name', $myarr[$x]['item'])->first();

              $itemqua = Billd::where('item_id' , $item->id)->where("store_id" , $store->id)->where('billhs_id',$data[0]->id)->first();
              $quantit =$item->store->where('name' , $myarr[$x]['store'])->first();
              if($itemqua)
              {
                
                
                $quantit->pivot->quantity= $quantit->pivot->quantity + $itemqua->quantity -$myarr[$x]['quantity'] ;
              }else
              {
                $quantit->pivot->quantity = $quantit->pivot->quantity - $myarr[$x]['quantity'];
              }
              
              
              $quantit->pivot->update();
          }
          
          
          
          foreach ($bill->biild as $billd) 
          {
            
            $billd->destroy($billd->id);
          }

         
         
          for ($x=0; $x < count($myarr) ; $x++) 
          { 
              $store = Store::where('name' , $myarr[$x]['store'])->first();
              $item = Item::where('name', $myarr[$x]['item'])->first();

  
              

              $billd = new Billd;
              $billd->billhs_id= $data[0]->id;
              $billd->item_id = $item->id;
              $billd->store_id = $store->id;
              $billd->quantity = $myarr[$x]['quantity'];
              $billd->price = $myarr[$x]['price'];
              $billd->total = $myarr[$x]['total'];
              $billd->save();
          }

          $bill->save(); 
               
          
    }


    public function destroy($id)
    {
      $bill = Billh::find($id);
       

       foreach ($bill->biild as $billd) {
          $billd->destroy($billd->id);
       }

      $bill->destroy($id);

       return redirect(route('index.head'))->with('msg','bill head deleted');
    }
}
