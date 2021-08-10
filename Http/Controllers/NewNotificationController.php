<?php
namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Notifications\NewNotification;
use App\Http\Controllers\Schedule;
use Illuminate\Http\Request;
use Notification;
use App\User;

class NewNotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }
    
    public function notificationonly(Request $request)
    {
        $id = $request->id;
        $subject = $request->input('subject');
        $message = $request->input('message');
        $id = intval($id);
        $data= User::find($id);
        $newnotice = [
          'subject' => $subject,
          'message' => $message, 
        ];
        Notification::send($data, new NewNotification($newnotice));
        return view('sendnotification');
        // dd($data);

    }
}

