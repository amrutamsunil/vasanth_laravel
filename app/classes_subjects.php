<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes_subjects extends Model
{
    protected $table='classes_subjects';
    protected $fillable=[
        'class_id','subject_id'
    ];
}
