<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','update_at'];
    public function cat(){
        return $this->belongsTo(Cat::class);
    }
    public function exams(){
        return $this->hasMany(Exam::class);
    }
    public function name($lang= null){
        $lang=$lang ?? App::getLocale();
        return json_decode($this->name)->$lang;
    }
    public function getStudentcount(){
        $studentNum = 0 ;
       foreach($this->exams as $exam ){
        $studentNum+= $exam->user()->count(); //this mean enter exam module -> select user function ->count data tabel  
       }
       return $studentNum;
    }
}
