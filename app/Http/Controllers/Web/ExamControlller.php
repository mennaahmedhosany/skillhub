<?php

namespace App\Http\Controllers\web;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExamControlller extends Controller
{
       public function show($id){
           $data['exam'] = Exam::FindorFail($id);
           return view ('web.exam.show')->with($data);
       }
       public function start($examid){//i crate withpivote() becouse its a table many to many 
          $user=Auth::user();// to get all user info 
          $user->exam()->attach($examid);//attach for exam function in user module (many to many)
          return redirect(url("/exam/questions/$examid"));//move to  exam page after save user data in exam_user table 
       }
       public function questions($id){
        $data['exam'] = Exam::FindorFail($id);
        return view('web/exam/questions')->with($data);
    }
    public function submit($examid , Request $request){
        $request->validate([
          'answer' =>'required|array',
          'answer.*'=>'required|in:1,2,3,4',
        ]);
        $points=0;
        $exam = Exam::findorFail($examid);
        $totalQuestion = $exam->questions->count();
        foreach($exam->questions as $question){//to compare between correct answer and user anser is correct 
            if(isset($request->answer[$question->id])){
                $userAns=$request->answer[$question->id];
                $rightAns=$question->right_ans;
                if($userAns == $rightAns){
                    $points +=1;
                }
            }
        }
        $score = ($points/$totalQuestion)*100;//scoure
        $user = Auth::user();//geet all user info 
        $pivotRow=$user->exam()->where('exam_id' , $examid)->first();
        $startTime=$pivotRow->pivot->created_at;//i used pivot in table and relation many to many 
        $submitTime=Carbon::now();//get this time 
        $timeMins=$submitTime->diffInMinutes($startTime);//real time - exam tme 
        $user->exam()->updateExistingPivot($examid,[//insert to data base
            'scoure' =>$score,
            'time_min'=>$timeMins,
        ]);
        return redirect(url("/exam/show/$examid"));

    }
    
}
