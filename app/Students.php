<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Students extends Authenticatable
{
    use Notifiable;
    protected $guard='student';
    protected $table='students';
    protected $fillable=[
        'roll_no','email','father_name','address','phone_no',
        'image','class_id'
    ];

    public function class(){
        return $this->belongsTo('App\Classes','class_id');
    }
    public function enrolled(){
        return $this->belongsToMany('App\Courses','courses_enrolled','student_id','course_id')
            ->withPivot('status','id');
    }
    public function results(){
        return $this->hasMany('App\Results','student_id');
    }
    public function fees(){
        return $this->hasOne('App\Fees','student_id');
    }

}
