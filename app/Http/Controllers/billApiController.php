<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billh;
use App\User;
use App\Store;
use App\Item;
use App\Billd;

class billApiController extends Controller
{

    public function index()
    {
       $bills = Billh::with('biild')->paginate(15);
       return response(['bills'=>$bills]);
    }


    public function show($id)
    {
       $bill = Billh::with('biild')->findOrFail($id);
       return response(['bill'=>$bill]);
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

          if (empty($myarr)) {
            
            return "false";
          }
          
          
          
          foreach ($bill->biild as $billd) 
          {
          $billd->destroy($billd->id);
          }
          
          for ($x=0; $x < count($myarr) ; $x++) 
          { 
              $billd = new Billd;
              $billd->billhs_id= $data[0]->id;
              $billd->item_id = $myarr[$x]['item'];
              $billd->store_id = $myarr[$x]['store'];
              $billd->quantity = $myarr[$x]['quantity'];
              $billd->price = $myarr[$x]['price'];
              $billd->total = $myarr[$x]['total'];
              $billd->save();
          }

          if( $bill->save() )
          {
            $bill = Billh::with('biild')->findOrFail($data[0]->id);
            return response(['bill'=>$bill]);
          }
        
    }

    public function destroy($id)
    {
       
       $bill = Billh::findOrFail($id);
       $bill->destroy($id);

       return response(['bill'=>$bill]);
    }
}
