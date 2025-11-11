<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    //
    function index(Request $request) {

        $courses=Course::orderBy('id',$request->order??'DESC')->when($request->search,function (Builder $builder) use($request) {
            $builder->where('title','like','%'.$request->search.'%');

        })
        ->paginate($request->count??10);
        return view('courses.index',compact('courses'));
    }
    function create() {
        $coures= new Course();
        return view('courses.create',compact('coures'));
    }
    function store(CourseRequest $request) {

        // //uplod file
        $path=$request->file('image')->store('courses','custom');
        // //using object
        // $coures= new Course();
        // $coures->title=$request->title;
        // $coures->slug=Str::slug($request->title);
        // $coures->image=$path;
        // $coures->price=$request->price;
        // $coures->category=$request->category;
        // $coures->description=$request->description;
        // $coures->save();

        //using  static method
        Course::create([
            'title'=>$request->title,
            'image'=>$path,
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description
        ]);
        if($request->wantsJson()){
            $courses=Course::orderBy('id','DESC')->paginate(10);
            $data=view('courses._table-form',compact('courses'))->render();
            return response()->json([
                'msg'=>'Add Coures successfully.',
                'data'=>$data
            ]);
        }
        flash()->success('Add Coures successfully.');
        return redirect()->route('courses.index');
    }
    function destroy(Request $request, $id) {
        $coures=Course::findOrFail($id);
        // File::delete(public_path($coures->image));
        $coures->delete();
        if($request->wantsJson()){
            $courses=Course::orderBy('id','DESC')->paginate(10);
            $data=view('courses._table-form',compact('courses'))->render();
            return response()->json([
                'msg'=>'Add Coures successfully.',
                'data'=>$data
            ]);
        }

    flash()->error('Courses Deleted Sucsses');
        return redirect()->route('courses.index');

    }
    function edite(Request $request, $id) {
        $coures=Course::findOrFail($id);
        if($request->wantsJson()){
            return response()->json([
                'msg'=>'Coures object',
                'data'=>$coures
            ]);
        }
        return view('courses.edite',compact('coures'));

    }
    function update(CourseRequest $request,$id)  {
        $coures=Course::findOrFail($id);
        if($request->hasFile('image')){
            File::delete(public_path($coures->image));
            $path=$request->file('image')->store('courses','custom');

        }
        $coures->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'image'=>$path??$coures->image,
            'price'=>$request->price,
            'category'=>$request->category,
            'description'=>$request->description
        ]);
        if($request->wantsJson()){
            $courses=Course::orderBy('id','DESC')->paginate(10);
            $data=view('courses._table-form',compact('courses'))->render();
            return response()->json([
                'msg'=>'Updated Coures successfully.',
                'data'=>$data
            ]);
        }

        flash()->info('Courses Updated Sucsses');
        return redirect()->route('courses.index',['page'=>$request->page])   ;

    }
    function trashed() {
        $courses=Course::onlyTrashed()->paginate(10);
        return view('courses.trashed',compact('courses'));

    }
    function restore($id) {
        $coures=Course::onlyTrashed()->findOrFail($id);
        // $coures->update(['deleted_at'=>null]);
        $coures->restore();
        flash()->info('Courses Restore Sucsses');
        return redirect()->route('courses.index')   ;
    }
    function forcedelete($id) {
        $coures=Course::onlyTrashed()->findOrFail($id);
        $coures->forceDelete();

        flash()->error('Courses Deleted Sucsses');
        return redirect()->route('courses.trashed');
    }
}
