<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{

    

    public function time()
    {
        $user = Auth::user();
        $today = Carbon::today();
        $attendances = Attendance::whereDate('date', $today)->where('user_id',$user->id)->first();
        $restTotal = Rest::whereDate('date', $today)->where('attendances_id',$attendances->id);


        $math = 0;

        foreach($restTotal as $restTotal)
        {

        $start = $restTotal->rest_start;
        $end = $restTotal->rest_end;

        $math = $math + (strtotime($end) -  strtotime($start));

        }

        $seconds = $math % 60;
        $subminutes = ($seconds -($seconds % 60)) / 60;
        $minutes = $subminutes % 60;
        $subhours = ($minutes -($minutes % 60)) / 60;
        $hours = $subhours % 60;

        $restTime = sprintf('%02d:%02d:%02d',$hours,$minutes,$seconds);

        $attendances->update(['rest_time' => $restTime]);
        

        $work_start= $attendances->work_start;
        $work_end = $attendances->work_end;
        $subworktime = (strtotime($work_end) - strtotime($work_start));

        $worktime = $subworktime - $math;

        $work_seconds = $worktime % 60;
        $work_subminutes = ($work_seconds -($work_seconds % 60)) / 60;
        $work_minutes = $work_subminutes % 60;
        $work_subhours = ($work_minutes -($work_minutes % 60)) / 60;
        $work_hours = $work_subhours % 60;

        $work_time = sprintf('%02d:%02d:%02d', $work_hours, $work_minutes, $work_seconds);

        $attendances->update(['work_time' => $work_time]);

        return redirect('attendance')->with('successMessage', '退勤完了、お疲れさまでした');

    }

    public function timetable(){

        $today = Carbon::today()->format("Y-m-d");
        $attendances = Attendance::whereDate('date', $today)->paginate(5);


        return view('timetable',['today' => $today, 'attendances' => $attendances]);

    }

}
