<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Project;
use App\Models\User;

class projectControl extends Controller
{
    function redirectFunct()
    {
        $data = Student::all();
        $data2 = User::all();
        $output = Project::paginate(2);
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            return view('coordinator/display', ['projects' => $output, 'students' => $data, 'users' => $data2]);
        } else {
            return view('supervisor/display', ['projects' => $output, 'students' => $data, 'users' => $data2]);
        }
    }
    function show()
    {

        $data = Student::all();
        $data2 = User::all();
        $output = Project::all();
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            return view('coordinator/display', ['projects' => $output, 'students' => $data, 'users' => $data2]);
        } else {
            return view('supervisor/display', ['projects' => $output, 'students' => $data, 'users' => $data2]);
        }
    }
    function addForm()
    {
        $data = Student::all();
        $data2 = User::all();
        return view('coordinator/addProj', ['students' => $data, 'users' => $data2]);
    }
    function addProj(Request $req)
    {
        $stud = new Project();
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
        return redirect('senaraiproj');
    }
    function deleteProj($id)
    {
        $data = Project::find($id);
        $data->delete();
        return redirect('senaraiproj');
    }
    function showProj($id)
    {

        $data = Project::find($id);
        $data2 = Student::all();
        $data3 = User::all();
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            return view('coordinator/updateProj', ['projects' => $data, 'students' => $data2, 'users' => $data3]);
        } else {
            return view('supervisor/updateProj', ['projects' => $data, 'students' => $data2]);
        }
    }
    function updateProject(Request $req)
    {
        $typeuser = Auth::user()->usertype;
        if ($typeuser == '1') {
            $stud = Project::find($req->id);
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
            return redirect('senaraiproj');
        } else {
            $stud = Project::find($req->id);
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
}
