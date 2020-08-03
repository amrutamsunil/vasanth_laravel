<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses_Enrolled extends Model
{
    protected $table='courses_enrolled';
    protected $fillable=[
        'student_id','course_id', 'status'
    ];
}
