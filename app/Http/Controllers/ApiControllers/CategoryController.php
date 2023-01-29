<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use CommonTrait;

    public function getAllCategories()
    {
        $categories = Category::all();
        return $this->sendSuccess('all categories', $categories);
    }

    public function getUserCategories()
    {
        $categories = UserCategory::where('user_id',Auth::id())->first();
        return $this->sendSuccess('all user categories', $categories);
    }

    public function addCategories(Request $request){
        $validator = Validator::make($request->all(), [
            'categories' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try{
            DB::beginTransaction();
            
            foreach($request->categories as $category_id){
                $category=new UserCategory;
                $category->user_id=Auth::id();
                $category->category_id=$category_id;
                $category->save();
            }

            DB::commit();

            return $this->sendSuccess('Category added Successfully', null);
        }catch (\Exception$exception) {
            DB::rollback();
            return $this->sendError($exception->getMessage(), null);
        }
        
    }

    public function updateCategories(Request $request){
        $validator = Validator::make($request->all(), [
            'categories' => 'required|array',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->messages()->first(), null);
        }

        try{
            DB::beginTransaction();
            
            UserCategory::where('user_id',Auth::id())->delete();

            foreach($request->categories as $category_id){
                $category=new UserCategory;
                $category->user_id = Auth::id();
                $category->category_id = $category_id;
                $category->save();
            }

            DB::commit();

            return $this->sendSuccess('Category Updated Successfully', null);
        }catch (\Exception$exception) {
            DB::rollback();
            return $this->sendError($exception->getMessage(), null);
        }
    }
}
