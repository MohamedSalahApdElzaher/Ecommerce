<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\FavoritRequest;
use App\Models\Favorit;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    public function addProduct(FavoritRequest $request){
        try {
            $request->validated();
           $fav = Favorit::where(['user_id' => $request->user_id, 'product_id' => $request->product_id])->exists();
           if($fav){
            Favorit::where(['user_id' => $request->user_id, 'product_id' => $request->product_id])->first()->delete();
            return redirect()->back();
           }else{
            Favorit::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id
            ]);
            return redirect()->back();
           }
        } catch (\Exception $th) {
            return redirect()->back();
        }
    }

    public function getFavorits(){
        try{
            $favs = Favorit::where('user_id', auth('seller')->user()->id)->get();
            return view('Website.products.favories_products',compact('favs'));
        }catch (\Exception $exception){
            return redirect()->back();
        }
    }

}
