<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

use Auth;

class AttendancesController extends Controller
{
    //
    public function getStudentAttendance()
    {
        # code...

        $user = Auth::guard('web')->user();
        // return $user->rollNumber;

        $studentAttendances = Attendance::where('rollNumber', $user->rollNumber)->get();
        // $studentAttendances = Attendance::all();

        // return $studentAttendances;
        return view('attendances.myAttendance', [
            'studentAttendances' => $studentAttendances,
        ]);
    }
}
