<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editProfile($id){
        $user = User::find($id);
        return view('Website.users.profile', compact('user'));
    }

    public function update(UserRequest $request){
        try {
            $request->validated();
            User::findOrFail($request->id)->update([
                'name' => strip_tags($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return back()->with('success', 'Profile updated successfully');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
