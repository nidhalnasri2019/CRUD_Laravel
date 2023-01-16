<?php

namespace App\Repositories\Services;

use App\Models\Post;
use App\Repositories\Interfaces\IPostRepository;


class PostRepository implements IPostRepository
{
    public function index()
    {
       // $posts= Post::all();
        $posts= Post::get();
    
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
 
    // validate
    //  $request->validate([
    //      'title'=>'required',
    //      'description'=>'required'
    //  ]);

    // create
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description  //$request->all()
        ]);
   

    // new post
    //    $post= new Post();
    //    $post->title=$request->title;
    //    $post->description=$request->description;
    //    $post->save();

    }

 
    public function edit($id)
    {
         //Post::findorfail($id); // work only with id
       $post=Post::where('id',$id)->first();
       return $post;
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    public function update($request,$id)
    {
        $post= Post::findorFail($id);
    //    $post->title= $request->title;
    //    $post->description = $request->description;
    //    $post->save();
        $post->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
       
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        //Post::findorFail($id)->delete();
        Post::destroy($id);
       
    }

    // show only deleted post
    
     public function show()
    {
        $posts =Post::onlyTrashed()->get();  
        return $posts;
    }

    // restore post

    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->restore();
        return $post;
    }

    // forcedelete post

    public function forcedelete($id){
        $post = Post::withTrashed()->where('id',$id)->forcedelete();
        return $post;
        }
}