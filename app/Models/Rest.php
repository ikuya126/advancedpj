<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = ['attendances_id', 'rest_start', 'rest_end','date'];

    public function attendance()
    {
        $this->belongsTo(Attendance::class);
    }
}
