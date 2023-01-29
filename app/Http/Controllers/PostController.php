<?php

namespace App\Http\Controllers;


use App\Common\Utility;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\IPostRepository;

class PostController extends Controller
{
   
    public function __construct(IPostRepository $repository)
    {
        $this->repository = $repository;
  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // show all posts

   public function index(){
    $posts = $this->repository->index();
       return view('posts.index' , compact('posts'));
   }
    // create view post

   public function create(){
       $create= $this->repository->create();
       return $create;
   }
   // store post in database

   public function store(StorePostRequest $request){
       $post= $this->repository->store($request);
      return  redirect()->route('dashboard');
   }

  // show data of post to edit

  public function edit($id){
      $post= $this->repository->edit($id);
      return view('posts.edit' ,compact('post'));
  }
 

    // update post

   public function update(Request $request,$id)
   {
     $this->repository->update($request, $id);
      return redirect()->route('posts.index') ;
   } 

   // delete post

   public function destroy($id)
   {
    $this->repository->destroy($id);   
    return redirect()->route('posts.index');
   }
   // show only deleted post

   public function show()
   {
     $posts=$this->repository->show();  
    return view("posts.softdelete",compact('posts'));
   }
    // restore post
   
    public function restore($id)
    {   
        $post=$this->repository->restore($id);
        return redirect()->back();
    }

    // forcedelete post

     public function forcedelete($id)
     {
       $post= $this->repository->forcedelete($id);
       return redirect()->back();
     }
     
      // show notification

     public function showNotification($id)
     {
         $notif=$this->repository->showNotification($id);
         return $notif;
     }

     // mark as read all notifications

     public function markAsRead(){
         $notifs= $this->repository->markAsRead();
         return $notifs;
     }
    // public function showpost(){
       
    //         // $comment= Comment::find(4);
    //         // // foreach($post->comments as $comment){
    //         // //     echo $comment->body;
    //         // // };
    //         // return $comment->post;
         
    // }    
}

