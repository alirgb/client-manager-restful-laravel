<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::orderby('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'mobile' => 'required',
            'image' => 'required|image'
        ]);
        
        $data = $request->all();
        
        $data['image'] = $request->image->store('');
        
        return Client::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return Client::find($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
          
        $request->validate([
            'image' => 'image'
        ]);          
            
        if($request->hasFile('image')) {
            Storage::delete($client->image);
            $client->image = $request->image->store('');
        }
            

        $client->fill($request->only([
            'name',
            'address',
            'tel',
            'mobile'
        ]));
         
        $client->save();

        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Storage::delete($client->image);
        $client->delete();
        return response ([
            'message' => 'Client successfully deleted'
        ], 200);
    }

    /**
     * Search for the specified client by name.
     *
     * @param  String  $name
     * @return \Illuminate\Http\Response
     */
    public function search(String $name)
    {
        $client = Client::where('name', 'like', '%'.$name.'%' )->get();
        return $client;
    }
}
