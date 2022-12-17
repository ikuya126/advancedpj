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


    public function timetable(Request $request)
    {


        $user = Auth::user();
        $data = Attendance::where('user_id',$user->id)->latest()->first();
        $today = Carbon::today()->format("Y-m-d");

        $restdates = Rest::where('attendances_id',$data->id)->whereDate('date', $today);


        foreach($restdates as $restdate)
        {
            $rests = $restdate->rest_time;
            $math = 0;

            foreach($rests as $rest)
            {
                
                $rest_start = $rest->rest_start;
                $rest_end = $rest->rest_end;

                $math = $math + strtotime($rest_end) -  strtotime($rest_start);

            }
        }

        $seconds = $math % 60;
        $subminutes = ($seconds -($seconds % 60)) / 60;
        $minutes = $subminutes % 60;
        $subhours = ($minutes -($minutes % 60)) / 60;
        $hours = $subhours % 60;

        $rests->rest_time = sprintf('%02d:%02d:%02d',$hours,$minutes,$seconds);

        $start= $data->work_start;
        $end = $data->work_end;
        $subworktime = (strtotime($end) - strtotime($start));

        $worktime = $subworktime - $math;

        $work_seconds = $worktime % 60;
        $work_subminutes = ($work_seconds -($work_seconds % 60)) / 60;
        $work_minutes = $work_subminutes % 60;
        $work_subhours = ($work_minutes -($work_minutes % 60)) / 60;
        $work_hours = $work_subhours % 60;

        $data->work_time = sprintf('%02d:%02d:%02d', $work_hours, $work_minutes, $work_seconds);


        $date = $request->input("date")?: Carbon::today()->format("Y-m-d");
        $attendances = Attendance::whereDate('date', $date)->paginate(5);


        return view('/date', ['date' => $date, 'attendances' => $attendances]);
        
    }
}
