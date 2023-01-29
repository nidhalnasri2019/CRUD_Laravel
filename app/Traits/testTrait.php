<?php

namespace App\Traits;

trait testTrait
{
    public function getData($model){
        return $model::all();
    }
}