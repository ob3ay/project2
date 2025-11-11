<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OBOperationController extends Controller
{
    //
    public function view(){
        $courses=DB::table('courses')->latest('id')->simplepaginate(10);
        return view('db.courses',compact('courses'));
    }

}
