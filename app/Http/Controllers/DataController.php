<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\CommonTrait;

class DataController extends Controller
{
    use CommonTrait;

    public function getCategories()
    {
        try{
            $categories= Category::all();
            return $this->sendSuccess('All categories',$categories);
        }catch(Exception $e){
            return $this->sendError($e->getMessages(),null);
        }
    }
}
