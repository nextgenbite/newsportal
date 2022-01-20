<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\setting;

class AdminController extends Controller
{
  
    public function index(){

        return view('backend.index');
    }
    public function settings(){
       
            $setting = setting::first();
          
                
        return view('backend.setting2', compact('setting'));
    }
    public function SettingStore(Request $request){

        $validatedData = $request->validate([
            'about' 	=> 'required|max:125',
            'social' 	=> 'required|max:100',

            'image' => ' mimes:jpeg,jpg,png | max:1000',
        ]);



        $data=array();
        $data['about']=$request->about;
    
        $data['social']=$request->social;



        //img upload................
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/logo/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            $data['created_at']= date('Y-m-d H:i:s');
            $data['updated_at']= date('Y-m-d H:i:s');
            DB::table('settings')->insert($data);
            Session::flash('message','Data Inserted Successfully Created');
            return Redirect()->back();
        }else{
            DB::table('settings')->insert($data);
            Session::flash('message','Data Inserted Successfully Created');
        }




    }











        // $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images'), $imageName);
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $name = time().$file->getClientOriginalName();
        //     $file->move('images', $name);; 
              
        // }
//         setting::create($request->all());   

//         Session::flash('message','Data Inserted Successfully Created');
//         return redirect()->back();
// }

    public function SettingUpdate(Request $request)
    {
       //
       $input = $request->all();

       if($file = $request->file('image')){
        $name = time() . $file->getClientOriginalName();
        $file->move( public_path() . '/images/', $name);  // absolute destination path
        $photo = setting::create(['image'=>$name]);
        $input['image'] = $photo->id;


       }

        setting::whereId(1)->first()->update($input);
    // Auth::user()->setting()->whereId($id)->first()->update($input);
    

    
      Session::flash('message','Data  Successfully Updated');

      return redirect()->back();
    }
}
