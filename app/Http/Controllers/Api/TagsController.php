<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return response()->json( $tags );
    }

    public function show($id){
        $tag = Tag::find($id);
        if($tag){
            return response()->json(['success' =>true], $tag );
        }else{
            return response()->json(['success' =>false, 'message' =>'not found'] );
        }
    }

    public function delete($id){
        if(Auth::user()->admin){
            $tag = Tag::find($id);
            if($tag){
                $tag->delete();
                return response()->json(['success' =>true]);
            }else{
                return response()->json(['success' =>false] );
            }
        }else{
            return response()->json(['success' =>false] );
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['success'=>!$validator->errors()], 401);
        }

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return response()->json(['success' =>true]);
    }
}
