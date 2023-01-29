<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Traits\testTrait;
use Illuminate\Http\Request;

class testController extends Controller
{

   use testTrait;
   public function index(){
       $users= $this->getData(User::class);
       return $users;
   }
}
