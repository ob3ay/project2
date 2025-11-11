<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('teacher.index');
    }
    public function about(){
        return view('teacher.about');
    }
    public function contact(){
        return view('teacher.contact');
    }
}
