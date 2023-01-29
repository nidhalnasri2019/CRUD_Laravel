<?php

use Illuminate\Support\Facades\Auth;
if(! function_exists('UserName')){
    function UserName(){
        return Auth::user()->name;
    }
}
if(! function_exists('UserId')){
    function UserId(){
        return Auth::user()->id;
    }
}