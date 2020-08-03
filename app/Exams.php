<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table='exams';
    protected $fillable=[
        'name','max_score'
    ];
    public function results(){
        return $this->hasMany('App\Results','exam_id');
    }
}
