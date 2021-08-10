<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;
use Notification;
use App\User;
use Auth;

class helper extends Controller
 { 

   public function __construct()
    {
     $this->middleware('auth');
    }
 
   public function index()
    {
     return view('welcome');
    }
    
   public function helper(Request $request)
    {
    
    $subject = $request->input('subject');
   	$message = $request->input('message');

    $data = Auth::User(
   	$newnotice = [
       'name' => $subject,
       'body' => $message,
        ]);
  

    Notification::send($data, new NewNotification($newnotice));
    
    dd('Notification has been sent!');
  
    return view('home');
    }
}
?>
