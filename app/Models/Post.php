<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $fillable =['title', 'description'];
    // protected $guarded=['description'];
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // accessor $ mutator function 
    protected function Title():Attribute
    {
        return Attribute::make(
            get: fn ($value)=>ucfirst($value),  // accessor
            set: fn ($value)=>ucfirst($value), // mutator
            // get: fn ($value)=>strtoupper($value),
        );
    }
    protected function Description():Attribute
    {
        return Attribute::make(
            get: fn ($value)=>strtolower($value),  // accessor
            set: fn ($value)=>strtolower($value), // mutator
            // get: fn ($value)=>strtoupper($value),
        );
    }
}
