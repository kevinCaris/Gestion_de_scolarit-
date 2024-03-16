<?php

namespace App\Http\Controllers;

use App\Models\level;
use Illuminate\Http\Request;

class levelController extends Controller
{
     public function index(){
     return view('niveaux.list');
 }
 public function create(){
     return view('niveaux.create');
 }
  public function edit(level $level){
     
     
     return view('niveaux.edite',compact('level'));
 }
}
