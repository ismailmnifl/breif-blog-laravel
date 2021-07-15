<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class HomeController extends Controller
{
    function index() {
        $posts=Post::orderBy('id','desc')->simplePaginate(2);
        return view('home',['posts'=>$posts]);
    }

    function detail(Request $request,$postId){
        // Update post count
    	$detail=Post::find($postId);
    	return view('detail',['detail'=>$detail]);
    }
   // Save Comment
    function save_comment(Request $request,$id){
        $request->validate([
            'comment'=>'required'
        ]);
        $data=new Comment;
        $data->user_id=$request->user()->id;
        $data->post_id=$id;
        $data->comment=$request->comment;
        $data->save();
        return redirect('detail/'.$id)->with('success','Comment has been submitted.');
    }
}