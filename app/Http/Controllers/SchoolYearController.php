<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function index(){
        return view('setting.index');
    }
    public function create(){
        return view('setting.create');
    }
}
