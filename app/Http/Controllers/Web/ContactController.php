<?php

namespace App\Http\Controllers\web;

use App\Models\Message;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
public function forgetpassword(){
    return view('auth.forgot-password');
}
    public function index(){
        $data['sitt'] = Settings::select('email','phone')->first();
        return view("web.contact.index")->with($data);
    }
    //insert information contact in data base 
    public function send(Request $request ){
        $validator = Validator::make($request->all() , [
            'name' => 'required|string|max:255',
            'email'=> 'required|string|max:255',
            'subject'=>'required|string|max:255',
            'body'=>'required|string|max:255',
            // i used  $Validator to set validtion for all inputs  
        ]);
        if($validator->fails()){
            $error = $validator->errors();
            return redirect(url('contact'))->withErrors($error);//to show error in input error
        }
        Message::create([
            'name' => $request->name,
            'email'=> $request->email,
            'subject'=>$request->subject,
            'body'=> $request->body,//insert to data base 
        ]);
        $request->session()->flash('success','your msg send success');//'success' is name of session  
        return back(); //back funtion will move you to back page 

        }

    }


