<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fetchControl extends Controller
{
    function index()
    {
        return DB::select("SELECT * FROM students");
    }
}
