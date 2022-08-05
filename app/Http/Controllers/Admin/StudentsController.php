<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Admin;

class StudentsController extends Controller
{
    //

    public function addStudent()
    {
        # code...
        try{
            // $data['permissions'] = Permission::where('guard_name', 'admin')->get();
            return view('admin.students.addStudent');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Error.Please Contact Support');
        }

    }

    public function saveStudent(Request $request)
    {
        # code...

        try{

            $student = new User;
            
            $student->name = $request->input('name');
            $student->username = $request->input('username');
            $student->rollNumber = $request->input('rollNumber');
            $student->cnic = $request->input('cnic');
            $student->session = $request->input('session');
            $student->dept = $request->input('dept');
            $student->section = $request->input('section');
            $student->email = $request->input('email');
            $student->password = Hash::make($request->input('password'));
            $student->status = 1;

            $student->save();

            return redirect()->back()->with('success', 'Student Added');
            
        }
        catch(\Exception $e){

            return redirect()->back()->with('error', 'Something went wrong. Please contact support');

        }

    }
}
