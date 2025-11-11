<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Mail\CountactMail;
use Illuminate\Http\Request;
use App\Jobs\NewOederMailJobs;
use App\Http\Requests\Form3Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;

class Formcontroller extends Controller
{
    //
    function form1()      {

        return view('form.form1');
    }


    function form1_data(Request $request) {
        $name=$request->input('name');
        return "Welcome $name";
    }

    function form2()      {

        return view('form.form2');
    }


    function form2_data(Request $request) {
        // $request->except('_token');
        // $request->only(['name','email']);
        // $request->all();
        // $request->post('name');
        // $request->query('age');

        $name=$request->name;
        $email=$request->email;
        return "Welcome $name <br> email $email";
    }

    function form3()      {

        return view('form.form3');
    }


    function form3_data(Request $request) {
        //request validation
        // $request->validate([
        //     'name'=>['required','min:3'],
        //     'email'=>['required','ends_with:@gimal.com','email'],
        //     'phone'=>['required','max:10'],
        //     'password'=>['required','min:8','confirmed'],
        // ]);
        $validator=Validator::make($request->all(),
        [
                'name'=>['required','min:3'],
                'email'=>['required','ends_with:@gimal.com','email'],
                'phone'=>['required','max:10'],
                'password'=>['required','min:8','confirmed'],
        ],
        [
            'email.required'=>'الحقل مطلوووب ي عرص'
        ],
        [
            'name'=>'namme'
        ]
        );
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return "Done";
    }
    function form4()      {

        return view('form.form4');
    }


    function form4_data(Request $request) {
        $request->validate([
            'image'=>'required'
        ]);

        if($request->hasFile('image')){
             $path=$request->file('image')->store('courses','custom');
            // $path=time().rand().$request->file('image')->getClientOriginalName();
            // $image=Image::read($request->file('image'));
            // $image->resize(300,200);
            // $image->save('uploades/'.$path);

        }
        return view('form.form4_show',compact('path'));
    }
    function contact()      {

        return view('form.contact');
    }


    function contact_data(Request $request) {

        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
            'cv'=>'required|mimes:png,jpg,jpeg,pdf',
        ]);
        $data=$request->except('_token','cv');

        if($request->hasFile('cv')){
            $path=time().rand() .'.' .$request->file('cv')->getClientOriginalExtension();
            $request->file('cv')->move('uploades/cv/',$path);
            $data['cv']=$path;
        }

        Mail::to('admin@gimal.com')->send(new CountactMail($data));

    }
    function order(){

        NewOederMailJobs::dispatch("adimn@gimal.com",'user@gimal.com','vendor@gimal.com');
    }

}
