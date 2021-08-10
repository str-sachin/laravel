<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\User;
use Auth;

class show extends Controller
{
  
   public function shownotification(Request $request)
   { 
   	$id = $request->id;
   	// print_r($id);
   	 $_GET['id'] = $id;
      print_r($id);
    // $notifications = auth()->user()->notifications()->where('id', $id)->first();
                 
   	$notifications = Auth::user()->notifications->toArray();
  	$notifications = $notifications;
    return view('/user.shownotificationinuser',['notifications'=>$notifications]);
   }
}
