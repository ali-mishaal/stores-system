<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billh;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class reportController extends Controller
{
    
    public function index()
    {   

    	
    	if (!isset($_GET['emps'])) 
    	{
    	   return view('reports.index');
    	}
        
    	$data = json_decode($_GET['emps']);

    	$bills = Billh::whereBetween('billdate', [$data[0]->from, $data[0]->to])->get();
        
        
        if (count($bills) == 0) {
        	return "false";
        }
        
        $total_profit = $item_sell = $item_quantity = 0;

        $extr = "";
    	foreach ($bills as $bill) 
    	{
         $profit =$loss = 0;
    	   $extr .= "<tr>";
    	   $extr .="<td>".$bill->id."</td>";
    	   $extr .="<td>".$bill->billdate."</td>";
    	   $extr .="<td>".$bill->user->name."</td>";
    	   $extr .="<td>";
    	   $extr .="<button type='button' class='btn btn-primary' data-toggle='modal'
    	            data-target='#exampleModal". $bill->id ."'>bill details</button>";
    	   $extr .="<div class='modal fade' id='exampleModal".$bill->id."' tabindex='-1' 
    	           role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                           <div class='modal-content'>
                               <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLabel'>
                                       quantity
                                  </h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                       <span aria-hidden='true'>&times;</span>
                                  </button>
                               </div>
                               <div class='modal-body'>
                                    <table class='table tab2' style='margin-bottom: 0;'>
                                    <thead>
						                <tr>
						                  <th>item name</th>
						                  <th>store name</th>
						                  <th>item quantity</th>
                              <th>tax</th>
						                  <th>item buy</th>
						                  <th>item sell</th>
						                  <th>total buy</th>
						                  <th>total sell</th>
						                </tr>
						              </thead><tbody>";
                                        $total_buy = $bill_total_sell=0 ;
                                        if ($bill->biild) 
                                        {
                                          foreach($bill->biild as $details)
				                          {
                                           $total_buy += $details->quantity * $details->item->buy;
				                           $extr .="<tr>
				                                       <td>".$details->item->name ."</td>
				                                       <td>".$details->store->name ."</td>
				                                       <td>".$details->quantity ."</td>";
                                                   $item_quantity = $details->quantity;
                                                   if($details->item->tax == 1)
                                                   {
                                                    $tax = "5%";
                                                   }else
                                                   {
                                                    $tax = 0;
                                                   }

                                              $extr .="<td>".$tax ."</td>
				                                       <td>".$details->item->buy ."</td>
				                                       <td>".$details->item->sell ."</td>";

                                               $item_sell = $details->item->sell ;

				                                       $extr .= "<td>".$details->quantity * $details->item->buy."</td>
				                                       <td>".$details->total ."</td>
				                                   </tr>";

                                           if($tax != 0 )
                                             {
                                               $bill_total_sell += $details->total - (($item_sell*5/100)*$item_quantity);
                                                  

                                             }elseif($tax == 0)
                                             {
                                             
                                                 $bill_total_sell += $details->total;
                                                
                                             }


				                           }
                                        }
				                        

				                      $extr .="</tbody></table>
                               </div>
                               <div class='modal-footer'></div>
                          </div>
                      </div>
                   </div>";
    	   $extr .="</td>";

         $extr .="<td>".$bill->paid."</td>";
         $extr .="<td>".$bill->remain."</td>";
    	   $extr .="<td>".$total_buy."</td>";
    	   $extr .="<td>".$bill->total."</td>";

    	   
        if($bill->total > $total_buy)
        {
          $profit = $bill_total_sell - $total_buy;

        }elseif ($bill->total < $total_buy) {

          $loss = $total_buy - $bill_total_sell;
        }
         
         $bill_tax =  $bill->total - ($total_buy + $profit);
    	   $extr .="<td>".$profit."</td>";
    	   $extr .="<td>".$loss."</td>";
         $extr .="<td>". $bill_tax ."</td>";
    	   $extr .="</tr>";

    	   $total_profit += $profit; 
    	}

    	$myarr = array(
                 "table" => $extr,
                 "profit" => $total_profit,
    	);

    	return $myarr;
    	
    }
}
