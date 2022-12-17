<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class DateController extends Controller
{


    public function timetable()
    {

        $user = Auth::user();
        $data = Attendance::where('user_id',$user->id)->latest()->first();

        $worktime = Attendance::select(DB::raw('timediff(work_end,work_start) as worktime'))
        ->where('id', $data->id);

        Attendance::where('id', $data->id)->update(['work_time' => $worktime]);

        $rests = Rest::where('attendances_id',$date->user_id)->first();

        $sum = 0;

        foreach($rests as $rest)
        {
            $resttime =  Rest::select(DB::raw('timediff(rest_end,rest_start) as resttime'))
            ->where('attendances_id', $data->id)->value('restime');

            $sum = $sum + $resttime;

        }

        Attendance::where('id', $data->id)->update(['rest_time' => $sum]);

        $name = $user->name;
        $start = $data->work_start;
        $end = $data->work_end;
        $time = $data->work_time;
        $rest = $data->rest_time;

        $attendance= Attendance::paginate(5);

        return view('/timetable',['name'=> $name,'start' => $start ,
        'end' => $end, 'time' => $time, 'rest' =>$rest],compact('$attendance'));
        
    }
}
