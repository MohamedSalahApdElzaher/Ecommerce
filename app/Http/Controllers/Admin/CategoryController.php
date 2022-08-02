<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Prophecy\Exception\Exception;

class CategoryController extends Controller
{
    // view page
    public function Index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // save new category
    public function store(CategoryRequest $request)
    {
        try {
            $request->validated();
            Category::create([
                'name' =>  $request->name,
                'description' => $request->description,
                'parent' => $request->parent
            ]);
            return redirect()->back()->with(['success' => 'category inserted successfully']);
        } catch (Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }


    // edit view page
    public function edit($id)
    {
        $cat = Category::find($id);
        $categories = Category::all();
        return view('admin.category.edit', compact('cat', 'categories'));
    }

    // update category
    public function update(Request $request, $id)
    {
        try {
            Category::find($id)->update([
                'name' =>  $request->name,
                'description' => $request->desc,
                'parent' => $request->parent
            ]);
            return redirect()->route('admin.category')->with(['success' => 'category updated successfully']);
        } catch (Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }

    // delete category
    public function delete($id)
    {
        try {
            $cat = Category::find($id);
            $cat->delete();
            return redirect()->route('admin.category')->with(['success' => 'category deleted successfully']);
        } catch (Exception $ex) {
            return redirect()->back()->with(['error' => $ex->getMessage()]);
        }
    }
}
