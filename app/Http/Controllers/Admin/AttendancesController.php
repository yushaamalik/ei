<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Models\User;
use App\Models\Attendance;

use Auth;

class AttendancesController extends Controller
{
    //
    public $timeout = 0;

    public function __construct()
    {
        ini_set('max_execution_time', '300');
    }

    public function runFaceRecognition()
    {
        # code...
        // echo "Python Script will run here.";
        // exit();
            $process = new Process(['python', 'C:\laragon\www\ei\app\pi-face-recognition\face_attendance_auto.py']);
            $process->setTimeout(24000);
            $process->run();
            
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $data = $process->getOutput();

            // echo $data . " - And now the Python Controller is called.";



            return redirect()->route('admin.dashboard')->with('success', 'Attendance marked.');
    }

    public function getStudentAttendance()
    {
        # code...

        // $user = Auth::guard('web')->user();
        // return $user->rollNumber;

        $studentAttendances = Attendance::with('student')->orderBy('id', 'desc')->get();
        // return $studentAttendances;
        // $studentAttendances = Attendance::all();

        // return $studentAttendances;
        return view('admin.attendances.attendance', [
            'studentAttendances' => $studentAttendances,
        ]);
    }


}
