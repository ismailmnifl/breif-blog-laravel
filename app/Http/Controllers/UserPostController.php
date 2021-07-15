<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('userpost.index',['data' => auth()->user()->userPosts]);
            //dd(auth()->user()->id);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::all();
        return view('userpost.add',['cats'=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

        // Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/thumb');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage='na';
        }

        // Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }

        $post=new Post;
        $post->user_id=auth()->user()->id;
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();
        return redirect()->route('userDash.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=Category::all();
        $data=Post::find($id);
        return view('userpost.update',['cats'=>$cats,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'detail'=>'required',
        ]);

        // Post Thumbnail
        if($request->hasFile('post_thumb')){
            $image1=$request->file('post_thumb');
            $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
            $dest1=public_path('/imgs/thumb');
            $image1->move($dest1,$reThumbImage);
        }else{
            $reThumbImage=$request->post_thumb;
        }

        // Post Full Image
        if($request->hasFile('post_image')){
            $image2=$request->file('post_image');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/imgs/full');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage=$request->post_image;
        }

        $post=Post::find($id);
        $post->cat_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$reThumbImage;
        $post->full_img=$reFullImage;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();

        return redirect('admin/post/'.$id.'/edit')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return back();
    }
}
