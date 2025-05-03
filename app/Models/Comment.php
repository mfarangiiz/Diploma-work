<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = ['user_id','taxt','course_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function abakus(){
        return $this->belongsTo(Abakus::class ,'course_id');
    }
}
