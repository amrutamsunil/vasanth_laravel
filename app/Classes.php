<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table='classes';
    protected $fillable=[
        'name','dept_id'
    ];
    public function students(){
        return $this->hasMany('App\Students','class_id');
}
public function subjects(){
        return $this->belongsToMany('App\Subjects','classes_subjects','class_id','subject_id')->withPivot('id');
}
public function department(){
        return $this->belongsTo('App\Department','dept_id');
}
}
