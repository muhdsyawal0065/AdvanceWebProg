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
    function deleteProj($id)
    {
        $data=Project::find($id);
        $data->delete();
        return redirect('senaraiproj');
    }
    function showProj($id)
    {
        $data=Project::find($id);
        $data2=Student::all();
        $data3=User::all();
        return view('coordinator/updateProj', ['projects'=>$data, 'students'=>$data2, 'users'=>$data3]);
    }
    function updateProj(Request $req)
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
}
