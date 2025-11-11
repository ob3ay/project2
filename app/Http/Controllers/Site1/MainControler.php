<?php

namespace App\Http\Controllers\Site1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainControler extends Controller
{
    //
        public function index() {
            return view('site1.index');
        }
        public function about() {
            return view('site1.about');
        }
        public function contact() {
            return view('site1.contact');
        }
        public function posts() {
            return view('site1.posts');
        }

}
