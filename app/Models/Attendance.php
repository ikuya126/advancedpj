<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'work_start', 'work_end', 'date','work_time','rest_time'];

    public function getName()
    {
      
    }

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    public function rest()
    {
        return $this->hasMany('App\Models\Rest');
    }

}



