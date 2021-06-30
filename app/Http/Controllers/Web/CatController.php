<?php

namespace App\Http\Controllers\web;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
   public function show($id){
       //chack if have id or no if have get id and name else no 
       $data['cat'] = Cat::FindOrFail($id);//$data['cat'] to move tabel cata DB on show page
       $data['allCats'] = Cat::select('id','name')->get();//crate array with get id and name
       $data['skills'] = $data['cat']->skills()->paginate(6);
       return view('web.cat.show')->with($data);//with finction to pass cat table to next page 
   }
}
