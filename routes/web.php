<?php
use App\Http\Controllers\Admin\AdminController as AdminHomeController;
use App\Http\Controllers\Admin\CatController as AdminCatController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ExamController as AdminExamController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\CatController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\web\ExamControlller;
use App\Http\Controllers\web\LangControlller;
use App\Http\Controllers\web\SkillController;
use App\Http\Controllers\web\ContactController;
/////////////////////////////////////////////////////////////////// Namespaces
Route::middleware('Lang')->group(function () {
    
Route::get("/",[HomeController::class,"index"]);Route::get("/",[HomeController::class,"index"]);
Route::get("/categoies/show/{id}",[CatController::class,"show"]);
Route::get("/skill/show/{id}",[SkillController::class,"show"]);
Route::get('/exam/show/{id}',[ExamControlller::class,"show"]);
Route::get("/exam/questions/{id}",[ExamControlller::class,"questions"])->middleware(['auth','verified','student']);
Route::get("/lang/set/{lang}",[LangControlller::class,"set"]);//to choice language
Route::get("/contact",[ContactController::class,"index"]);//if not verifiy email ill show msg ->middleware('verified')
Route::get("/forgetpassword",[ContactController::class,"forgetpassword"]);
Route::post("/conntat/massage/send",[ContactController::class,"send"]);
});///////////////////////////////////////////////////////////////////translate 
Route::post('/exam/start/{id}',[ExamControlller::class,"start"])->middleware(['auth','verified','student']);
Route::post('/exam/submit/{id}',[ExamControlller::class,"submit"])->middleware(['auth','verified','student']);
Route::get("/lang/set/{lang}",[LangControlller::class,"set"]);//to choice language
/////////////////////////////////////////////////////////////////////admin Route 
Route::prefix('dashbord')->middleware('auth','verified','can-enter-dashbord')->group(function(){
    Route::get('/',[AdminHomeController::class,"index"]);
    Route::get('/categury',[AdminCatController::class,"index"]); 
    Route::post('/categury/store',[AdminCatController::class,"store"]);
    Route::post('/categury/update',[AdminCatController::class,"update"]);
    Route::get('/categury/delete/{cat}',[AdminCatController::class,"delete"]);
    Route::get('/categury/toggle/{cat}',[AdminCatController::class,"toggle"]);
    //skills
    Route::get('/skill',[AdminSkillController::class,"index"]); 
    Route::post('/skill/store',[AdminSkillController::class,"store"]);
    Route::post('/skill/update',[AdminSkillController::class,"update"]);
    Route::get('/skill/delete/{skill}',[AdminSkillController::class,"delete"]);
    Route::get('/skill/toggle/{skill}',[AdminSkillController::class,"toggle"]);
    //exam
    Route::get('/exam',[AdminExamController::class,"index"]); 
    Route::get('/exam/create',[AdminExamController::class,"create"]); 
    Route::get('/exam/create-question/{exam}',[AdminExamController::class,"createQuestion"]); 
    Route::post('/exam/store-question/{exam}',[AdminExamController::class,"storeQuerstion"]); 
    Route::get('/exam/show/{exam}',[AdminExamController::class,"show"]); 
    Route::get('/exam/show/{exam}/questions',[AdminExamController::class,"showQuestions"]); 
    Route::get('/exam/edit/{exam}',[AdminExamController::class,"edit"]); 
    Route::post('/exam/store',[AdminExamController::class,"store"]);
    Route::post('/exam/update',[AdminExamController::class,"update"]);
    Route::get('/exam/delete/{exam}',[AdminExamController::class,"delete"]);
    Route::get('/exam/toggle/{exam}',[AdminExamController::class,"toggle"]);
});