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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
