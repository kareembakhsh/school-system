<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Student extends Model
{
    protected $fillable = ['name', 'age'];

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
