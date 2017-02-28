<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'course_id', 'status', 'code',
    ];


    public function course(){
    	return $this->belongsTo('App\Course');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
