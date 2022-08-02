<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\SellerRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SellerController extends Controller
{

    public function editProfile($id){
        $user = Seller::find($id);
        return view('seller.profile', compact('user'));
    }

    public function update(SellerRequest $request){
        try {
            $request->validated();
            Seller::findOrFail($request->id)->update([
                'name' => strip_tags($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return back()->with('success', 'Profile updated successfully');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function SellerIndex(){
        return view('seller.seller_login');
    } // END METHOD

    public function SellerDashboard(){
        return view('seller.index');
    }// END METHOD

    public function SellerLogin(LoginRequest $request){
        $data = $request->validated();
        if(Auth::guard('seller')->attempt($data)){
            return redirect()->route('home_page')->with('success', 'Welcome back '.$data['email']);
        }else{
            return back()->with('error', 'Something went wrong');
        }

    } // end mehtod


    public function SellerLogout(){
         Auth::guard('seller')->logout();
        return redirect()->route('seller_login_from')->with('success', 'Logout Successfully');
    } // end mehtod


    public function SellerRegister(){
        return view('seller.seller_register');
    }// end mehtod


    public function SellerRegisterCreate(SellerRequest $request){
        $data = $request->validated();
        Seller::create($data);
        return redirect()->route('seller_login_from')->with('success', 'Account Created Successfully');
    } // end mehtod

}
