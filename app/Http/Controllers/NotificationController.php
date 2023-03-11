<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    use CommonTrait;
    
    public function getNotifications(){
        try{
            $notifications = Notification::where('user_to',Auth::id())->with('user')->latest()->get();

            return $this->sendSuccess('All Notification',$notifications);
        }catch(Exception $e){
            return $this->sendError($e->getMessages(),null);
        }
    }
}
