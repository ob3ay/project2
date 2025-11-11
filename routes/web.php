<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesJsController;
use App\Http\Controllers\Formcontroller;
use App\Http\Controllers\OBOperationController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\Site1\MainControler;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

        // Route::get('/',function(){
        //     return "obay";
        // });
        // Route::get('/news/{id}/name/{name?}',function($id,$name=''){
        //             return "News No# $id Name $name";
        // })->whereNumber('id')->name('news');
        // Route::get('/genaret',function(){
        //     $id=10;
        //     $name="oaby";
        //     return route('news',[$id,$name]);
        // });
        // Route::prefix('admin')->name('admin.')->group(function(){
        //         Route::get('/',function(){
        //             return "Admin";
        //         })->name('dashbord');
        //         Route::get('/tags',function(){
        //             return "Admin tags";
        //         })->name('tags');
        //         Route::get('/posts',function(){
        //             return "Admin posts";
        //         })->name('posts');
        // });
        Route::controller(AppController::class)->group(function(){
            Route::get('/','index')->name('home');
            Route::get('/about','about')->name('about');
            Route::get('/contact','contacT')->name('contact');
            Route::get('/posts','posts')->name('posts');
        });
        Route::get('/calc/{x}/{y}',[AppController::class,'calc']);



        Route::prefix('site1')->name('site1.')->controller(MainControler::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/about','about')->name('about');
            Route::get('/contact','contact')->name('contact');
            Route::get('/posts','posts')->name('posts');
        });
        Route::prefix('forms')->name('forms.')->controller(Formcontroller::class)->group(function(){
            Route::get('form1','form1')->name('form1');
            Route::post('form1','form1_data');
            Route::get('form2','form2')->name('form2');
            Route::post('form2','form2_data');
            Route::get('form3','form3')->name('form3');
            Route::post('form3','form3_data');
            Route::get('form4','form4')->name('form4');
            Route::post('form4','form4_data');
            Route::get('contact','contact')->name( 'contact');
            Route::post('contact','contact_data');
            Route::get('order','order')->name( 'order');

        });
        Route::get('/admin',function(){
            return "admin dashbord";
        })->middleware('chec_type:admin');

        Route::get('/soon',function() {
            return "Coming Sooon";
        });
        Route::view('asset','asset');
        Route::get('/helpers',function(){
            return Custom::show();
        });
        // Route::get('/courses',[OBOperationController::class,'view']);
        Route::prefix('courses')->name('courses.')->controller(CourseController::class)->group(function () {
            Route::get('index','index')->name('index');
            Route::get('create','create')->name('create');
            Route::post('courses','store')->name('store');
            Route::delete('{id}','destroy')->name('destroy');
            Route::get('{id}/edite','edite')->name('edite');
            Route::match(['put','patch'],'{id}','update')->name('update');
            Route::get('trashed','trashed')->name('trashed');
            Route::get('{id}/restore','restore')->name('restore');
            Route::delete('{id}/forcedelete','forcedelete')->name('forcedelete');



        });

        Route::prefix('courses-js')->name('courses.')->controller(CoursesJsController::class)->group(function () {
            Route::get('index','index')->name('indexjs');
            // Route::get('create','create')->name('create');
            // Route::post('courses','store')->name('store');
            // Route::delete('{id}','destroy')->name('destroy');
            // Route::get('{id}/edite','edite')->name('edite');
            // Route::match(['put','patch'],'{id}','update')->name('update');
            // Route::get('trashed','trashed')->name('trashed');
            // Route::get('{id}/restore','restore')->name('restore');
            // Route::delete('{id}/forcedelete','forcedelete')->name('forcedelete');
            });

            Route::get('test',[TestController::class,'test'])->name('tset');
            Route::get('customers',[RelationController::class,'customers'])->name('customers');
            Route::get('post/create',[RelationController::class,'create'])->name('post.create');
            Route::post('post/',[RelationController::class,'store'])->name('post.store');
            Route::get('posts',[RelationController::class,'posts'])->name('posts');
            Route::get('posts/{post}',[RelationController::class,'post'])->name('post');
            Route::post('posts/{post}/comment',[RelationController::class,'comment'])->name('comment.store');
            Route::post('api/v1/add-tag',[RelationController::class,'add_tag']);


