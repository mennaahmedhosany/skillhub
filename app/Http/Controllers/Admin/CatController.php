<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

////////////////////////////////////////////////////////////////////////////////////////

class CatController extends Controller
{
  public function index()
  {
    $data['cats'] = Cat::paginate(5);
    return view('admin.cat.index')->with($data);
  }

 ////////////////////////////////////////////////////////////////////////////////////////

  public function update(Request $request){
    // dd($request->all());
    $request->validate([
        'id'=>'required|exists:cats,id',
       'name_en'=> 'required|string|max:50',
       'name_ar'=>'required|string|max:50',
    ]);
    Cat::findOrFail($request->id)->update([
        'name'=>json_encode([
        'en' =>$request->name_en,
        'ar' =>$request->name_ar,
        ]),
    ]);
    $request->session()->flash('msg','row updated successfully');
    return back();

} 

  ////////////////////////////////////////////////////////////////////////////////////////

  
  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'name_en' => 'required|string|max:50',
      'name_ar' => 'required|string|max:50',
    ]); //insert to data base json en and ar
    Cat::create([
      'name' => json_encode([
        'en' => $request->name_en,
        'ar' => $request->name_ar
      ]),
    ]);
    return back();
    $request->session()->flash('msg', 'add successfuly');
  }
  ////////////////////////////////////////////////////////////////////////////////////////

  public function delete(Cat $cat,  Request $request)
  {
    $cat->delete();
    //$msg = $isdetected ? "row delete successfuly" : "can not delete " ; //if isdeteects = 1 row delet else can not delete 
    //after  create sesstion create  inc file to show alert and for delete to show msg create try and catch error
    try {
      $isdetected = $cat->delete();
      $msg = "row delete successfuly";
    } catch (Exception $e) {
      $msg = "can not delete";
    }
    $request->session()->flash('msg', $msg);
    return back();
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  public function toggle(Cat $cat)
  {
    $cat->update([
      'active' => !$cat->active //name col database key and the value 
    ]);
    return back();
  }
}
