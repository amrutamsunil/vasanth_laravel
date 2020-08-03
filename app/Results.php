<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table='results';
    protected $fillable=[
        'class_subject_id','exam_id','student_id','mark'
    ];
    public function student(){
        return $this->belongsTo('App\Student','student_id');
    }
    public function exam(){
        return $this->belongsTo('App\Exams','exam_id');
    }
}
