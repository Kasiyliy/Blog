<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CategoriesController extends Controller
{

    public function index(){
        $categories = Category::all();
        return response()->json( $categories );
    }

    public function show($id){
        $category = Category::find($id);
        if($category){
            return response()->json(['success' =>true], $category );
        }else{
            return response()->json(['success' =>false, 'message' =>'not found'] );
        }
    }

    public function delete($id){
        if(Auth::user()->admin){
            $category = Category::find($id);
            if($category){
                $category->delete();
                return response()->json(['success' =>true]);
            }else{
                return response()->json(['success' =>false] );
            }
        }else{
            return response()->json(['success' =>false] );
        }


    }
}
