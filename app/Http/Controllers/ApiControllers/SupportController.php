<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    use CommonTrait;
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => "required",
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }
        try{
            DB::beginTransaction();
            
            $support = new Support;
            $support->user_id = Auth::id();
            $support->title = $request->title;
            $support->description = $request->description;
            $support->save();

            DB::commit();
            return $this->sendSuccess('Support added', $support);
            
        } catch (\Exception$e) {
            DB::rollback();
            return $this->sendError($e->getMessage(), null);
        }
    }
}
