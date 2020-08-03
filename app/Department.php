<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    protected $fillable=[
        'name','short_name','fees'
    ];
    public function classes(){
        return $this->hasMany('App\Classes','dept_id');
    }
}
