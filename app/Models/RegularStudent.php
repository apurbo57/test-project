<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularStudent extends Model
{
    use HasFactory;

    protected  $guarded = [];

    public function  course(){
        return $this->belongsTo(course::class,'course_id');
    }
    public  function  getShiftAttribute($value){
        $value  = (int) $value;
       match ($value){
           1 => $value = '1st Shift',
           2 => $value = '2nd Shift',
           3 => $value = '3rd Shift',
           4 => $value = '4th Shift',
           5 => $value = '5th Shift',
           7 => $value = '7th Shift',
       };

         return $value;
    }
}
