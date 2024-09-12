<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'subjects',
        'fees',
        'timetable'
    ];

    protected $casts = [
        'timetable' => 'array', // Automatically cast JSON string to array
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}