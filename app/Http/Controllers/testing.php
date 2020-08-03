<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Results;
use Illuminate\Http\Request;

class testing extends Controller
{
    public function test(){
        $subjects=Classes::find(2)->subjects;

        foreach ($subjects as $index=>&$subject){
            $subject['result']=Results::with(['exam'])
                ->where('id','=',$subject->pivot->id)->get();
        }
        return response()->json($subjects);
    }
}
