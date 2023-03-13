<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    use CommonTrait;
    public function addFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'file' => 'sometimes',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try {
            DB::beginTransaction();
            
            $feedback = new Feedback;
            $feedback->user_id = Auth::id();
            $feedback->title = $request->title;
            $feedback->description = $request->description;

            if($request->file){
                $feedback->file = $this->addFile($request->file,'uploads/feedback/'.Auth::id().'/');
                if($feedback->file == false){
                    return $this->sendError('Invalid Poster', null);
                }
            }

            $feedback->save();
            
            $this->sendNotification(Auth::id(),Auth::id(),'notification', 'Hello '.Auth::user()->full_name.'! Your feedback is recorded we will get back to you as soon as possible.');

            DB::commit();
            return $this->sendSuccess('Feedback added Successfully', null);
        } catch (\Exception $exception) {
            DB::rollback();
            return $this->sendError($exception->getMessage(), null);
        }
        // dd($request);
    }
}
