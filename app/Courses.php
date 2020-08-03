<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table='courses';
    protected $fillable=[
        'name','fees','duration_months'
    ];
    public function students(){
        return $this->belongsToMany('App\Students','courses_enrolled','course_id','student_id')
            ->withPivot('status','id');
    }

}
