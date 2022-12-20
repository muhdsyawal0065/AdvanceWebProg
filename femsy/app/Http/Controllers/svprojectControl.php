<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Project;
use App\Models\User;
class svprojectControl extends Controller
{
    function show()
    {
        $data=Student::all();
        $output=Project::all();
        return view('supervisor/display', ['projects'=>$output, 'students'=>$data]);
    }
    function showProj($id)
    {
        $data=Project::find($id);
        $data2=Student::all();
        $data3=User::all();
        return view('supervisor/updateProj', ['projects'=>$data, 'students'=>$data2, 'users'=>$data3]);
    }
    function updateProject(Request $req)
    {
        $stud=Project::find($req->id);
        $stud->id = $req->id;
        $stud->studid = $req->studid;
        $stud->title = $req->title;
        $stud->category = $req->category;
        $stud->start_date = $req->start_date;
        $stud->end_date = $req->end_date;
        $stud->svid = $req->svid;
        $stud->exid1 = $req->exid1;
        $stud->exid2 = $req->exid2;
        $stud->duration = $req->duration;
        $stud->progress = $req->progress;
        $stud->status = $req->status;
        $stud->save();
        return redirect('senaraiprojsv');
    }
}
