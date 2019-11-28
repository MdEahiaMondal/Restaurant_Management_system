<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{


    public function index()
    {
        $items = Item::latest()->get();
        return view('backend.pages.item.index', compact('items'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.item.create', compact('categories'));
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp',
        ]);


        $slug = Str::slug($request->name);
        $image = $request->file('image');

        if (isset($image))
        {
            
            $currentDate = Carbon::now()->toDateString();
            $setImageName =$slug . '-' . $currentDate . '-' .uniqid() . '-' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/items'))
            {
                mkdir('uploads/items',0777,true);
            }

            $image->move('uploads/items',$setImageName);

        }else{
            $setImageName = 'default.png';
        }



        $item = new Item();
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = $setImageName;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Item Create Successfully done !');



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
