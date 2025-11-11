<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AppController extends Controller
{
    //
    public function index(){

        Cache::remember('setting',100,function(){
            return [
                'title'=>'laravel',
                'subtitle'=>'laravel subtitle',
                'description'=>'laravel description',
                'author'=>'laravel author',
            ];
        });

        return 'index';
    }
    public function about(){

        $setting=Cache::get('setting');
        dd($setting);
        return 'about';
    }
    public function contact(){
        return 'contact';
    }
    public function calc($x,$y){
        $sum=$x+$y;
        $diff=$x-$y;
        $prod=$x*$y;
        $div=$x/$y;

        return view('result',compact('x','y','sum','diff','prod','div'));
    }
    public function posts(){
        $posts=[
            [
                'id'=>1,
                'title'=>'post1',
                'content'=>'content1',
            ],
            [
                'id'=>2,
                'title'=>'post2',
                'content'=>'content2',
            ],
            [
                'id'=>3,
                'title'=>'post3',
                'content'=>'content3',
            ],
            [
                'id'=>4,
                'title'=>'post4',
                'content'=>'content4',
            ]
            ];

        return view('posts.index',compact('posts'));
    }
}
