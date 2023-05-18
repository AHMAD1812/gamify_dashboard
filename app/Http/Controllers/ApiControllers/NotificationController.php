<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function deleteNotification(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => "required|exists:notifications,id",
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try{
            DB::beginTransaction();
            $notification = Notification::find($request->id);
            $notification->delete();

            $notifications = Notification::where('user_to',Auth::id())->with('user')->latest()->get();
            DB::commit();
            return $this->sendSuccess('Notification Delete', $notifications);
            
        } catch (\Exception$e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }
}