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
        $output = Student::paginate(2);
        $data = Student::all();
        $data2 = User::all();
        $data3 = Project::all();
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            return view('coordinator/displayStudent', ['senarai'=>$output, 'users' => $data2, 'projects' => $data3]);
        } else {
            return view('supervisor/displayStudent', ['senarai'=>$data, 'users' => $data2, 'projects' => $data3]);
        }
    }
    function showsv()
    {
        $data2 = User::paginate(2);
        $data3 = Project::all();
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            return view('coordinator/displaySV', ['users' => $data2, 'projects' => $data3]);
        } else {
            return view('supervisor/displaySV', ['users' => $data2, 'projects' => $data3]);
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
        return redirect('list');
    }
    function deleteStud($id)
    {
        $data=Student::find($id);
        $data->delete();
        return redirect('list');
    }
    function showStud($id)
    {
        $data = Student::find($id);
        $data2 = User::all();
        $data3 = Project::all();
        return view('coordinator/updateStud', ['students'=>$data, 'users' => $data2, 'projects' => $data3]);
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
