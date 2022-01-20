<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Setting;

class adminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = setting::all();
          
                
        return view('backend.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //
          $input = $request->all();


      
  
  
          if($file = $request->file('image')){
  
  
              $name = time() . $file->getClientOriginalName();
  
  
              $file->move('images', $name);
  
              $photo = Setting::create(['image'=>$name]);
  
  
              $input['image'] = $photo->id;
  
  
          }
  
  
  
  
          posts::create($input);
  
  
  
  
          return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

          if($file = $request->file('image')){
  
  
              $name = time() . $file->getClientOriginalName();
  
  
              $file->move('images', $name);
  
             
  
  
              $input['image'] = $name;
  
  
          }
  
  
  
  
          Setting::create($input);
  
  
  
          Session::flash('message','Data  Successfully Created');
          return redirect()->back();
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
        $setting = setting::findOrFail($id);
        
        return view('backend/setting/edit', compact('setting'));
        
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
        $validatedData = $request->validate([
            'about' 	=> 'required|max:500',
            'social' 	=> 'required|max:100',
            'photo_id'     => ' mimes:jpeg,jpg,png | max:2000',
        ]);

        $user = Setting::findOrFail($id);

            $input = $request->all();

        if($file = $request->file('image')){


            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $input['image'] = $name;


        }



        $user->update($input);
    
      Session::flash('message','Data  Successfully Updated');

     return redirect()->back();
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
