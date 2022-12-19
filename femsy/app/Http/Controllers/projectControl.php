<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Project;
use App\Models\User;
class projectControl extends Controller
{
    function show()
    {
        $data=Student::all();
        $output=Project::all();
        return view('coordinator/display', ['projects'=>$output, 'students'=>$data]);
    }
    function addForm()
    {
        $data=Student::all();
        $data2=User::all();
        return view('coordinator/addProj', ['students'=>$data, 'users'=>$data2]);
    }
    function addProj(Request $req)
    {
        $stud = new Project();
        $stud->id = $req->id;
        $stud->studid = $req->studid;
        $stud->title = $req->title;
        $stud->start_date = $req->start_date;
        $stud->end_date = $req->end_date;
        $stud->svid = $req->svid;
        $stud->exid1 = $req->exid1;
        $stud->exid2 = $req->exid2;
        $stud->duration = $req->duration;
        $stud->progress = $req->progress;
        $stud->status = $req->status;
        $stud->save();
        return redirect('senaraiproj');
    }
    function deleteStud($id)
    {
        $data=Project::find($id);
        $data->delete();
        return redirect('list');
    }
    function showStud($id)
    {
        $data=Project::find($id);
        return view('updateData', ['disp'=>$data]);
    }
    function update(Request $req)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_date_time = date('Y-m-d H:i:s');
        $data=Project::find($req->id);
        $data->name=$req->name;
        $data->address=$req->address;
        $data->last_updated = $current_date_time;
        $data->save();

        return redirect('list');
    }
}
