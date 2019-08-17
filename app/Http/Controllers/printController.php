<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billh;
use Storage;
use App\Item;
use App\Store;
use App\Image;
use App\Billd;
use App\User;

class printController extends Controller
{
    
    public function index($id)
    {
        $bill = Billh::find($id);
    	return view('print.index' , compact('bill'));
    }

    public function upload()
    {

    	return view('print.upload');
    }


    public function uploaded(Request $request)
    { 

    	$this->validate($request , [
              'image'     => 'required|image',
       ]);

    	if($request->hasFile('image'))
        {
        	$images = Image::get();
        	foreach ($images as $image) 
        	{   
        		Storage::delete('public/images/'.$image->image);
        		$image->destroy($image->id);
        	}
        	

            $file      = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $mimeType  = $file->getClientMimeType();
            $fileName  = $file->getClientOriginalName();
            $size      = $file->getClientSize();
            $image_name_will_store = time() . '.' . $extension;

            $path      = $file->storeAs('public/images' , $image_name_will_store);

        }
        
        $image = new Image;
        $image->image = $image_name_will_store;
        $image->save();

        return redirect(route('show.re'));
    }

    public function show()
    {

      $image = Image::first();
      	shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "storage\\images\\'.$image->image.'" out');

			$myfile = fopen("out.txt", "r") or die("Unable to open file!");
		    $read_bill = fread($myfile,filesize("out.txt"));
			fclose($myfile);
              
            $client_name = $this->str($read_bill , "client name:" , "bill detail:");
            $date_of_bill = $this->str($read_bill , "Bill:" , "total");
            $total = $this->str($read_bill , "total:" , "EGB");
            $total_tax = $this->str($read_bill , "total Tax:" , "EGB");
            $paid = $this->str($read_bill , "paid:" , "EGB");
            $remain = $this->str($read_bill , "remain:" , "EGB");
            $bills = Billh::count();
            $arr_head = array(
            	             "id"        => $bills+1,
                             "name"      => $client_name,
                             "date"      => $date_of_bill,
                             "total"     => $total,
                             "total_tax" => $total_tax,
                             "paid"      => $paid,
                             "remain"    => $remain,
                             );

            $item_detail = $this->str($read_bill , "bill detail:" , "invoice");
            $item_detail = str_replace("EGB", "", $item_detail);
          
            $arr = explode(',', trim($item_detail));
            array_pop($arr);

      return view('print.show' , compact('arr_head','arr' ,'image'));
    }

 


    public function str($read , $word_start , $word_end)
    {
       
		$str_pos_word = stripos($read,$word_start);
	    $str_len = strlen($word_start);
	    $str_start = $str_pos_word + $str_len;

        $srt_after_start = substr($read, $str_start);
        $length = stripos($srt_after_start,$word_end);
       
	    $str = rtrim(substr($srt_after_start, 0 , $length));
		
	    return $str;
    }


    public function create()
    {   
    	$data = json_decode($_GET['emps']);

    	$user = User::where('name', trim($data[0]->client))->first();

    	$bill = new Billh;
        $bill->id = $data[0]->id;
        $bill->billdate = $data[0]->date;
        $bill->client_id = $user->id;
        $bill->total  = $data[0]->total;
        $bill->paid = $data[0]->paid;
        $bill->remain  = $data[0]->remain;

        $myarr = array();
          for ($i=1; $i < count($data); $i = $i + 6) 
          { 
            
            $myarr[count($myarr)] = array(
                                       "item"=>$data[$i] , 
                                       "store"=>$data[$i+1] , 
                                       "quantity"=>$data[$i+2] , 
                                       "price"=>$data[$i+3] ,
                                       "tax"  =>$data[$i+4],
                                       "total"=>$data[$i+5]
                                     );
          }

          for ($x=0; $x < count($myarr) ; $x++) 
          { 
          	   
              $store = Store::where('name' , trim($myarr[$x]['store']))->first();
              $item = Item::where('name', trim($myarr[$x]['item']))->first();
              
              $quantit = $item->store->where('id' , $store->id)->first();
              
              if($myarr[$x]['quantity'] > $quantit->pivot->quantity)
              {
                return "no";
              }

              $quantit->pivot->quantity = $quantit->pivot->quantity - $myarr[$x]['quantity'];
              $quantit->pivot->update();

              $billd = new Billd;
              $billd->billhs_id= $data[0]->id;
              $billd->item_id = $item['id'];
              $billd->store_id = $store['id'];
              $billd->quantity = $myarr[$x]['quantity'];
              $billd->price = $myarr[$x]['price'];
              $billd->total = $myarr[$x]['total'];
              
              $billd->save();
          } 

    	$bill->save();

    }

}
