<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentControl extends Controller
{
    function show()
    {
        $output=Student::all();
        return view('display', ['senarai'=>$output]);
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
        return redirect('push');
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
        return view('updateData', ['disp'=>$data]);
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
