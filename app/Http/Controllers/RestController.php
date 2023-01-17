<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RestController extends Controller
{
    public function start()
    {
        $user = Auth::user();

        $now = new Carbon();
        $today = $now->toDateString();
        $newDay = Carbon::today();

        $attend = Attendance::where('user_id', $user->id)->where('date', $today)->first();
        $id = $attend->user_id;


        Rest::create([
            'attendances_id' => $attend->user_id,
            'rest_start' => Carbon::now(),
            'date' => new Carbon('today')
            ]);

    
        $rest_start = 2;
        $start = 55;
        $end = 0;
        $rest_end = 0;

       return view('attendance',['start'=> $start,'end' => $end,'rest_end' => $rest_end,'rest_start' => $rest_start]);
    }

    public function end()
    {
        $user = Auth::user();

        $now = new Carbon();
        $today = $now->toDateString();

        $attend = Attendance::where('user_id', $user->id)->where('date', $today)->first();

        $rest = Rest::where('attendances_id', $user->id)->whereNull('rest_end')->latest();
        
        $rest->update(['rest_end' => Carbon::now()]);

        $rest_end = 3;
        $rest_start = 44;
        $start = 55;
        $end = 0;

       return view('attendance',['start'=> $start,'end' => $end,'rest_end' => $rest_end,'rest_start' => $rest_start]);
    }
}
