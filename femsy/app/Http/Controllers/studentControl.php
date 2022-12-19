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
}
