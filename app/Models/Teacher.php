<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email','subject'];

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_teacher', 'teacher_id', 'classroom_id');
    }
}

