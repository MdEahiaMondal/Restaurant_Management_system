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

            if (!file_exists(public_path('uploads/items')))
            {
                mkdir(public_path('uploads/items'),0777,true);
            }

            $image->move(public_path('uploads/items'),$setImageName);

        }else{
            $setImageName = 'default.png';
        }



        $item = new Item();
        $this->ItemSave($item, $request, $setImageName);


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



    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('backend.pages.item.edit', compact('item','categories'));
    }



    public function update(Request $request, Item $item)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'category_id' => 'required|numeric',
            'description' => 'required',
            'price' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,bmp',
        ]);


        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $setImageName =$slug . '-' . $currentDate . '-' .uniqid() . '-' . $image->getClientOriginalExtension();

            if (file_exists(public_path('uploads/items/').$item->image))
            {
                unlink(public_path('uploads/items/').$item->image);
            }


            if (!file_exists(public_path('uploads/items')))
            {
                mkdir(public_path('uploads/items'),0777,true);
            }
            $image->move(public_path('uploads/items'),$setImageName);

        }else{
            $setImageName = $item->image;
        }


        $this->ItemSave($item, $request, $setImageName);

        return redirect()->route('items.index')->with('success', 'Item Updated Successfully done !');

    }


    protected function ItemSave($item, $request, $setImageName)
    {
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->image = $setImageName;
        $item->save();
    }



    public function destroy(Item $item)
    {
        if (file_exists(public_path('uploads/items/').$item->image))
        {
            unlink(public_path('uploads/items/').$item->image);
        }


        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item Deleted Successfully done !');


    }
}
