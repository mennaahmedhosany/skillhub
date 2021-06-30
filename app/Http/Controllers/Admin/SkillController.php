<?php
namespace App\Http\Controllers\Admin;
use App\Models\Skill;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Exception;
class SkillController extends Controller
{
  public function index()
  {
    $data['skills'] = Skill::paginate(5);
    $data['cats'] = Cat::select('id', 'name')->get();
    return view('admin.skill.index')->with($data);
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  public function store(Request $request)
  {  
    $request->validate([
    
      'name_en' => 'required|string|max:50',
      'name_ar' => 'required|string|max:50',
      'img'    => 'required|image|max:6048',
      'cat_id'    => 'required|exists:cats,id',
    ]);
    $path = Storage::putFile("skill", $request->file('img'));
    Skill::create([
      'name' => json_encode([
        'en' => $request->name_en,
        'ar' => $request->name_ar,
      ]),
      'img'  => $path,
      'cat_id' => $request->cat_id,
    ]);
    $request->session()->flash('msg', 'row added successfully');
    return back();
  }
    ////////////////////////////////////////////////////////////////////////////////////////

  public function update(Request $request)
  {
    
    $request->validate([
       'id'=>'required|exists:skills,id',
       'name_en'=>'required|string|max:50',
       'name_ar'=>'required|string|max:50',
       'img'=>'nullable|image|max:9000',
       'cat_id'=>'nullable|exists:cats,id',
    ]);
    //  dd($request->validate());
    $skill = Skill::findOrFail($request->id);
    $path = $skill->img;
    if ($request->hasFile('img')) {
      Storage::delete($path);
      $path = Storage::putFile('skill', $request->file('img'));
    }
    $skill->update([
      'name' => json_encode([
        'en' => $request->name_en,
        'ar' => $request->name_ar,
      ]),
      'img' => $path,
      'cat_id' => $request->cat_id,
    ]);
    $request->session()->flash('msg', 'row updated successfully');
    return back();
  }

  ////////////////////////////////////////////////////////////////////////////////////////

  public function toggle(Skill $skill)
  {
    $skill->update([
      'active' => !$skill->active //name col database key and the value 
    ]);
    return back();
  }
    ////////////////////////////////////////////////////////////////////////////////////////

  public function delete(Skill $skill, Request $request)
  {
    // dd($request->all());
    //try and catch ; مرات بنحتاج نخفي كاتيجوري لانو مخزنين فيها كورسات والعملية كاسكيدينج ما بدي تنحذف
    try {
      $skill->delete();
      $path = $skill->img;
      Storage::delete($path);
      $msg = 'row deleted successfully';
    } 
    catch (Exception $e) {
      $msg = 'can not delete row';
    }
    $request->session()->flash('msg', $msg);
    return back();
  }
}