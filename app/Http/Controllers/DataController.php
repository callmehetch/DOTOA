<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
  {
        $data = Data::all();

        return view('data.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
       return view('data.create');
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
        'first_name'=>'required',
        'last_name'=>'required',
        'email_address'=>'required',
        'profile_picture'=>'required',
        'marks'=> 'required|integer'
      ]);
      $data = new Data([
        'first_name' => $request->get('first_name'),
        'last_name'=> $request->get('last_name'),
        'email_address'=> $request->get('email_address'),
        'profile_picture'=> $request->get('profile_picture'),
        'marks'=> $request->get('marks')
      ]);
      $data->save();
      return redirect('/data')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
      {
        $data = Data::find($id);

        return view('data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email_address'=>'required',
        'profile_picture'=>'required',
        'marks'=> 'required|integer'
      ]);

      $data = Data::find($id);
      $data->first_name = $request->get('first_name');
      $data->last_name = $request->get('last_name');
      $data->email_address = $request->get('email_address');
      $data->profile_picture = $request->get('profile_picture');
      $data->marks = $request->get('marks');
      $data->save();

      return redirect('/data')->with('success', 'Data has been updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = Data::find($id);
     $data->delete();

     return redirect('/data')->with('success', 'Data has been deleted Successfully');    }
}
