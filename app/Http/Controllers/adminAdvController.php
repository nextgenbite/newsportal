<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Advertisement;

class adminAdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adv = Advertisement::all();
        return view('backend.advertisement.index', compact('adv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        if($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $input['image'] = $name;
        }
        Advertisement::create($input);

        Session::flash('message','Data  Successfully Created');
        
      return redirect('admin/advertisement');
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
        //
      $adv =  Advertisement::findOrFail($id);
        return view('backend.advertisement.edit', compact('adv'));
        
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
        //
        $adv = Advertisement::findOrFail($id);

        $input = $request->all();

    if($file = $request->file('image')){


        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        $input['image'] = $name;


    }



    $adv->update($input);

  Session::flash('message','Data  Successfully Updated');
    return redirect('admin/advertisement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
