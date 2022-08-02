<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get(['id', 'name', 'email', 'password']);
        return view('admin.users.index', compact('users'));
    }

    public function store(UsersRequest $request)
    {
        try {
                $request->validated();
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);  
            return redirect()->back()->with(['success' => 'User added successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function update(Request $request){
        try{
            $user = User::where('id',$request->user_id)->first();
            if($user){
                $user->name = $request->name;
                $user->email = $request->email;       
                // update password
                if($request->password == null){
                    $user->password = $request->old_password;
                }else{
                    $user->password = bcrypt($request->password);
                }

                $user->save();
                return redirect()->back()->with(['success' => 'User updated successfully']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function destroy(Request $request){
        try{
            $user = User::where('id',$request->user_id)->first();
            if($user){
                $user->delete();
                return redirect()->back()->with(['success' => 'User deleted successfully']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }
}
