<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProfilesController extends Controller
{
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'=> 'required|email',
            'instagram' => 'required|url',
            'youtube' => 'required|url',
        ]);
        if ($validator->fails()) {
            return response()->json(['success'=>!$validator->errors()], 401);
        }

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;

            $avatar_new_name = time() . $avatar->getClientOriginalName();

            $avatar->move('uploads/avatars/', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;

            $user->profile->save();
        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->profile->instagram = $request->instagram;

        $user->profile->youtube = $request->youtube;

        $user->profile->about = $request->about;

        $user->save();

        $user->profile->save();

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        return response()->json(['success' =>false]);

    }
}
