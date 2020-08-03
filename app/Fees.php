<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $table='fees';
    protected $fillable=[
        'student_id','amount_paid','total_amount'
    ];
    public function student(){
        return $this->belongsTo('App\Student','student_id');
    }
}
