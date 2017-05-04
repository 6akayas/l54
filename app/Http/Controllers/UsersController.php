<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Intervention\Image\ImageServiceProvider;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function update_avatar(Request $request)
    {
        // Handle the user upload of avatar
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('users.show', ['user' => $user]);
    }


    public function destroy($id)
    {
        //
    }
}
