<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','update_at'];
    public function skills(){
        return $this->hasMany(Skill::class);
    }
    public function name($lang= null){
        $lang=$lang ?? App::getLocale();
        return json_decode($this->name)->$lang;
    }
        // if(App::getLocate()=='en'){
        //     return json_decode($this->name)->en;
        // }
        // return json_decode($this->name)->ar;
        // this way get alote of time  i use praameter $leng to change lnguage 

    
}
