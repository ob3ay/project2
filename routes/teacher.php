<?php

use App\Http\Controllers\Teacher\MainController;
use Illuminate\Support\Facades\Route;


// Route::get('/teacher',function(){
//     return "teacher";
// });
Route::prefix('teachers')->name('teachers.')->controller(MainController::class)  ->group(function(){
    Route::get('/',action: 'index')->name('index');
    Route::get('/about',action: 'about')->name('about');
    Route::get('/contact',action: 'contact')->name('contact');


});
