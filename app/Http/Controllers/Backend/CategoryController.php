<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();
       return view('backend.pages.category.index', compact('categories'));
    }



    public function create()
    {
        return view('backend.pages.category.create');
    }


    public function store(Request $request)
    {
       $this->validate($request, [
           'name' => 'required|unique:categories,name',
       ]);

       $request['slug'] = Str::slug($request->name);

       Category::create($request->all());

       return redirect()->route('categories.index')->with('success', 'Category Create Successfully Done !');

    }



    public function show($id)
    {
        //
    }



    public function edit(Category $category)
    {
        return view('backend.pages.category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);

        $request['slug'] = Str::slug($request->name);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully Done !');

    }



    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully Done !');

    }
}
