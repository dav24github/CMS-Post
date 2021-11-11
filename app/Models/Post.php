<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'post_image',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // //MUTATOR
    // public function setPostImageAttribute($value){
    //     $this->attributes['post_image'] = asset($value);
    // }

    //ACCESORY
    public function getPostImageAttribute($value)
    {
        return asset('/storage/' . $value);
    }
}