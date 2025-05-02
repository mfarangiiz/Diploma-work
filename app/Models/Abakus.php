<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abakus extends Model
{
    /** @use HasFactory<\Database\Factories\AbakusFactory> */
    use HasFactory;

    protected $fillable = ['title', 'video', 'age', 'description', 'status'];


    public function comments()
{
    return $this->hasMany(Comment::class, foreignKey: 'course_id');
}


}
