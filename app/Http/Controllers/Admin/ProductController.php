<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get(['id', 'name', 'image', 'price', 'qty', 'category_id', 'is_offer', 'new_price', 'status']);
        $categories = Category::get(['id', 'name']);
        return view('admin.product.index', compact('categories', 'products'));
    }

    public function store(ProductRequest $request)
    {
        try {
            if ($request->file('image')) {
                $image = $request->file('image');
                // uniqe id for each image
                $img_gen = hexdec(uniqid());
                // get extension
                $ext = strtolower($image->getClientOriginalExtension());
                $image_Name = $img_gen . '.' . $ext;
                // save location
                $loc = 'uploads/products/';
                $lastImage = $loc . $image_Name;
                $image->move($loc, $image_Name);
                $productCreate = Product::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'image' => $lastImage,
                    'qty' => $request->qty,
                    'is_offer' => $request->is_offer,
                    'new_price' => $request->new_price,
                    'status' => $request->status,
                    'category_id' => $request->category_id
                ]);
            }
            return redirect()->back()->with(['success' => 'Product added successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        $product = product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id){
        try {
           $id = $request->pro_id;
            if ($request->file('image')) {
                $old_img = $request->old_img;
                unlink($old_img);
                $image = $request->file('image');
                // uniqe id for each image
                $img_gen = hexdec(uniqid());
                // get extension
                $ext = strtolower($image->getClientOriginalExtension());
                $image_Name = $img_gen . '.' . $ext;
                // save location
                $loc = 'uploads/products/';
                $lastImage = $loc . $image_Name;
                $image->move($loc, $image_Name);
                Product::where('id', $id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'image' => $lastImage,
                    'qty' => $request->qty,
                    'is_offer' => $request->is_offer,
                    'new_price' => $request->new_price,
                    'status' => $request->status,
                    'category_id' => $request->category_id
                ]);
            }
            return redirect()->back()->with(['success' => 'Product updated successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }

    }

    public function destroy(Request $request){
        try{
            $product = Product::where('id',$request->product_id)->first();
            if($product){
                $product->delete();
                return redirect()->back()->with(['success' => 'Product deleted successfully']);
            }
        }catch (\Exception $exception){
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }

}
