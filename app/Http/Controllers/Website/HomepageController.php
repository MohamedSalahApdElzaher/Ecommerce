<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomepageController extends Controller
{
    public function index()
    {
        $products = product::with(['category' => function($query){
            $query->select('id', 'name');
        }])->where('status', true)->get(['id', 'name', 'image', 'category_id', 'price']);
        return view('Website.homepage', compact('products'));
    }

    public function product_details($name){
        try{
            $product = Product::where('name',$name)->first();
            $related_product = Product::whereHas('category',function($q) use($product){
                $q->where('name',$product->category->name);
            })->whereNotIn('name',[$product->name])->get();
            return view('Website.products.details',compact('product','related_product'));
        }catch (\Exception $exception){
            return redirect()->back();
        }
    }

    public function contacts()
    {
        return view('Website.contact');
    }

    public function sendMessage(Request $request)
    {
        try
        {
            $data = [
                'name' => $request->name,
                'message' => $request->message
            ];
            Mail::send(['text'=>'mail'], $data, function($message) use ($request) {
                $message->to('website@gmail.com', 'ourWebSite')->subject
                ($request->subject);
                $message->from($request->email, $request->name);
            });
            return redirect()->back()->with('success',  'Email Sent. Thanks for contact.');
        }catch (\Exception $exception){
            return redirect()->back()->with('error',  $exception->getMessage());
        }
    }


}
