<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
class CoursesJsController extends Controller
{
    //
    function index(Request $request) {
        $courses=Course::orderBy('id',$request->order??'DESC')->when($request->search,function (Builder $builder) use($request) {
            $builder->where('title','like','%'.$request->search.'%');
            

        })
        ->paginate($request->count??10);
        if($request->wantsJson()){
            $data=view('courses._table-form',compact('courses'))->render();
            return response()->json([
                'msg'=>'All Coures.',
                'data'=>$data
            ]);

        }
        $coures=new Course();
        return view('courses.index-js',compact('courses','coures'));

    }
}
