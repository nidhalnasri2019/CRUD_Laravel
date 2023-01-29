<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\SendMailJob;
use App\Jobs\ActiveUserJob;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        ActiveUserJob::dispatch();
        return "users updating...";
    }
    public function sendMail(){
        $data=['nidhalnasri2019@gmail.com','nidhalnasri2019@gmail.com','nidhalnasri2019@gmail.com',
        'nidhalnasri2019@gmail.com','nidhalnasri2019@gmail.com','nidhalnasri2019@gmail.com',
        'nidhalnasri2019@gmail.com','nidhalnasri2019@gmail.com','nidhalnasri2019@gmail.com',
      ];
     SendMailJob::dispatch($data);
     return 'data sending...';        
    }

  
}
