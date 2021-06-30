<?php

namespace App\Http\Controllers\Web;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['cats'] = Cat::select('id','name')->get();//$data is assoc array to get all data in array get() to get data form data base
        return view('web.home.index')->with($data);//move to page with array $data 
    }
}
