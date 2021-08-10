<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkSingleNotification extends Controller
{
   public function ReadNotification($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
           return redirect()->back();
        }
    }
}
