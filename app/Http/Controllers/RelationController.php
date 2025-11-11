<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelationController extends Controller
{
    //
    function customers()
    {

        //using transaction
        // try{
        //     DB::beginTransaction();
        //     $user=User::create([
        //         'name'=>'obay',
        //         'email'=>'gzb@gimal.com',
        //         'password'=>bcrypt('password')
        //     ]);
        //     $user->profile()->create([
        //         'fb'=>'##',
        //         'x'=>'##',
        //         'ln'=>'$$',
        //         'ig'=>'##'
        //     ]);

        //     DB::commit();
        // }catch(Exception $e){
        //     DB::rollBack();
        //     throw new Exception($e->getMessage());
        // }

        $customers = User::with('profile')->get();
        return view('relation.customers', compact('customers'));
    }
    function posts()
    {

        $posts = Post::withCount('comments')->latest()->get();
        return view('relation.posts', compact('posts'));
    }
    function post(Post $post)
    {
        $post->load('comments.user');
        $post->loadCount('comments');
        return view('relation.post', compact('post'));
    }
    function comment(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required'
        ]);
        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => 1
        ]);
        flash('Comment added successfully');
        return back();
    }
    function create()
    {
        $tags = Tag::select('id', 'name')->get();
        return view('relation.create', compact('tags'));
    }
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'gallery' => 'required',
        ]);
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        //add tags to post
        $post->tags()->attach($request->tags); //attach is used to add many to many relationship
        //add image to post
        $path = $request->file('image')->store('uploades', 'custom');
        $post->images()->create([
            'path' => $path
        ]);
        //add gallery to post
        foreach ($request->gallery as $image) {
            $path = $image->store('uploades', 'custom');
            $post->images()->create([
                'path' => $path,
                'type' => 'gallery'
            ]);
        }
        flash('Post created successfully');
        return redirect()->route('posts');
    }
    function add_tag(Request $request)
    {
        $tag = Tag::create([
            'name' => $request->name
        ]);
        return response()->json([
            'status' => 'true',
            'tag' => $tag
        ]);
    }
}
