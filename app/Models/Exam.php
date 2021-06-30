<?php
namespace App\Models;
use App\Models\Skill;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','update_at'];
    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function user(){// i used withpivot() when table relation is many to many table exam_user is like that i do like this in user module exam function 
        return $this->belongsToMany(User::class)->withPivot('scoure','time_min','status')->withTimestamps();
    }
    public function desc($lang= null){
        $lang=$lang ?? App::getLocale();
        $lang=App::getLocale();
        return json_decode($this->desc)->$lang;
    }
    public function name($lang= null){
        $lang=$lang ?? App::getLocale();
        return json_decode($this->name)->$lang;
    }
}
