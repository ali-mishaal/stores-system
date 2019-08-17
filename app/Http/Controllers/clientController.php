<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class clientController extends Controller
{
    public function index()
    {
       $clients = User::get();
       return view('client.index',compact('clients')); 
    }


    public function create()
    {

       return view('client.create');

    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=>'required|string|max:255',
       ]);

       $client = new User;

       $client->name = $request->input('name');
       $client->save();

       return redirect(route('index.client'))->with('msg','client created');

    }

    public function edit($id)
    {
        $client = User::find($id);
        return view('client.edit' , compact('client'));
    }

    public function update(Request $request , $id)
    {
       $client = User::find($id);
       $this->validate($request,[

            'name'=>'required|string|max:255',
       ]);


       $client->name = $request->input('name');
       $client->save();

       return redirect(route('index.client'))->with('msg','client edited');
    }

    public function destroy($id)
    {
       $client = User::find($id);
       
       $client->destroy($id);

        return redirect(route('index.client'))->with('msg','client deleted');

    }
}
