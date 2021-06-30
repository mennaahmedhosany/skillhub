<?php
namespace App\Http\Controllers\Admin;
use Exception;
use App\Models\Exam;
use App\Models\Skill;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class ExamController extends Controller
{
  public function index()
  {
    $data['exams'] = Exam::select('id', 'name', 'skill_id', 'img', 'question_no', 'active')->orderby('id', 'desc')->paginate(10);
    // $data['cats'] = Cat::select('id', 'name')->get();
    return view('admin.exam.index')->with($data);
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  public function show(Exam $exam)
  {
    $data['exam'] = $exam;
    return view('admin.exam.show')->with($data);
  }
////////////////////////////////////////////////////////////////////////////////////////

public function  showQuestions(Exam $exam ){
  $data['exam']=$exam;
 
  return view('admin.exam.show-question')->with($data);
}
///////////////////////////////////////////////////////////////////////////////////////

  public function create(){
$data['skills'] = Skill::select('id','name')->get();
return view('admin.exam.create')->with($data);
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////

  public function store(Request $request)
  {  
        //  dd($request->all());
    $request->validate([
      'name_en' => 'required|string|max:50',
      'name_ar' => 'required|string|max:50',
      'desc_en' => 'required|string|max:600000000',
      'desc_ar' => 'required|string|max:600000000',
      'img'    => 'required|image|max:6048',
      'skill_id'    => 'required|exists:skills,id',
      'question_no'    => 'required|integer',
      'duration_mins'    => 'required|integer|min:1',
      'difficulty'    => 'required|integer|min:1|max:5',
    ]);
    $path = Storage::putFile("exams", $request->file('img'));
   $exam =  Exam::create([
      'name' => json_encode([
        'en' => $request->name_en,
        'ar' => $request->name_ar,
      ]),
      'desc' => json_encode([
        'en' => $request->desc,
        'ar' => $request->desc_ar,
      ]),
      'img'  => $path,
      'skill_id' => $request->skill_id,
     'question_no'=>$request->question_no,
      'duration_mins'=>$request->duration_mins,
      'difficulty'=>$request->difficulty,
      'active'=>0 ,
    ]);
    // dd($exam->id);
    $request->session()->flash('prev', "exam/$exam->id");
    return redirect(url("dashbord/exam/create-question/$exam->id"));
  }
    ////////////////////////////////////////////////////////////////////////////////////////

  public  function createQuestion(Exam $exam){
    if(session('prev') !=="exam/$exam->id"){
      return redirect('dashbord/exam');
    }
    $data['exam_id'] = $exam->id;
    $data['question_no'] = $exam->question_no;
    return view('admin.exam.create-question')->with($data);
  }
    ////////////////////////////////////////////////////////////////////////////////////////

  public  function storeQuerstion(Exam $exam , Request $request)
  {
    for($i=0 ; $i <= $exam->question_no;$i++){
      Question::create([
  'exam_id'=>$exam->id,
  'title'=>$request->title[$i],
  'option_1'=>$request->option_1[$i],
  'option_2'=>$request->option_2[$i],
  'option_3'=>$request->option_3[$i],
  'option_4'=>$request->option_4[$i],
  'right_ans'=>$request->right_ans[$i],
      ]);
      $exam->update([
        'active' => 1,
      ]);
      return redirect(url('dashbord/exam'));
    }
  }////////////////////////////////////////////////////////////////////////////////////////

    public function delete(Exam $exam, Request $request)
    {
      // dd($exam->id);
      //try and catch ; مرات بنحتاج نخفي كاتيجوري لانو مخزنين فيها كورسات والعملية كاسكيدينج ما بدي تنحذف
      try {
        $exam->delete();
        $path = $exam->img;
        Storage::delete($path);
        $msg = 'row deleted successfully';
      } catch (Exception $e) {
        $msg = 'can not delete row';
      }
      $request->session()->flash('msg', $msg);
      return back();
    }
////////////////////////////////////////////////////////////////////////////////////////
// public function edit(Request $request)
//   {
//       // dd($request->all());
//     $request->validate([
//        'id'=>'required|exists:questions,id',
//       //  'name_en'=>'required|string|max:50',
//       //  'name_ar'=>'required|string|max:50',
//       //  'img'=>'nullable|image|max:9000',
//        'exam_id'=>'nullable|exists:exams,id',
//     ]);
//     //  dd($request->validate());
//     $exam = Exam::findOrFail($request->id);
//     $path = $exam->img;
//     if ($request->hasFile('img')) {
//       Storage::delete($path);
//       $path = Storage::putFile('exam', $request->file('img'));
//     }
//     for($i=0 ; $i <= $exam->question_no;$i++){
//       Question::update([
//       // 'name' => json_encode([
//       //   'en' => $request->name_en,
//       //   'ar' => $request->name_ar,
//       // ]),

//       'img' => $path,
//       'cat_id' => $request->cat_id,
//     ]);
//     $request->session()->flash('msg', 'row updated successfully');
//     return back();
//   }
// }
    public function toggle(Exam $exam)
    {
      $exam->update([
        'active' => !$exam->active //name col database key and the value 
      ]);
      return back();
    }
  }