<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller

{
  public function display()
   
   {
   	$users = User::all();
    return view('admin.displayuser')->with('users',$users);
   
   }
}
