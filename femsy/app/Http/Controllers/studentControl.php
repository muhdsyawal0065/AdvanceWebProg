<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Project;
use App\Models\User;
class studentControl extends Controller
{
    function show()
    {
        $output = Student::all();
        $data2 = User::all();
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            return view('coordinator/displayStudent', ['senarai'=>$output, 'users' => $data2]);
        } else {
            return view('supervisor/displayStudent', ['senarai'=>$output, 'users' => $data2]);
        }
    }
    function addData(Request $req)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_date_time = date('Y-m-d H:i:s');
        $stud = new Student();
        $stud->id = $req->id;
        $stud->name = $req->name;
        $stud->address = $req->address;
        $stud->last_updated = $current_date_time;
        $stud->save();
        return redirect('senaraiproj');
    }
    function deleteStud($id)
    {
        $data=Student::find($id);
        $data->delete();
        return redirect('list');
    }
    function showStud($id)
    {
        $data=Student::find($id);
        return view('coordinator/updateStud', ['disp'=>$data]);
    }
    function update(Request $req)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_date_time = date('Y-m-d H:i:s');
        $data=Student::find($req->id);
        $data->name=$req->name;
        $data->address=$req->address;
        $data->last_updated = $current_date_time;
        $data->save();

        return redirect('list');
    }
}
