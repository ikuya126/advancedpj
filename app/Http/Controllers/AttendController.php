<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendController extends Controller
{
    public function index()
    {
        $user = User::all();
        $start = 0;
        $end = 0;
        $rest_start = 0;
        $rest_end = 0;

        return view('attendance', ['user' => $user,'start' => $start,'end' => $end,
        'rest_start' => $rest_start,'rest_end' => $rest_end]);
    }

    public function start()
    {
        $user = Auth::user();

        $newDay = Carbon::today();

        Attendance::create([
            'user_id' => $user->id,
            'work_start' => Carbon::now(),
            'date' => new Carbon('today')
        ]);

        $attendances = Attendance::where('user_id',$user->id)->whereDate('date', $newDay)->first();

        $start = $attendances->work_start;

        return redirect()->back()->with('successMessage', '出勤開始')->with('start',$start);
    }
        
    public function end()
    {
        $user = Auth::user();
        $attend = Attendance::where('user_id', $user->id)->latest()->first();
        $newDay = Carbon::today();

        $attend->update([
            'work_end' => Carbon::now()
        ]);

        $attendances = Attendance::whereDate('date', $newDay)->where('user_id',$user->id)->first();

        $work_end = $attendances->work_end;

        return redirect('/date')->with('work_end',$work_end);
    }

    

    
}
