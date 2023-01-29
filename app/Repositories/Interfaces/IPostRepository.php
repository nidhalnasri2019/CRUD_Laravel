<?php
namespace App\Repositories\Interfaces;

 use Illuminate\Http\Request;


interface IPostRepository
{
    public function index(); // Return all posts
    public function create();
    public function store($request);
    public function show(); // show post only trashed
    public function edit($id);
    public function update($request,$id);
    public function destroy($id);
    public function restore($id);
    public function forcedelete($id);
    public function showNotification($id);
    public function markAsRead ();
  

}
