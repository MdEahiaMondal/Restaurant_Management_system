<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{


    public function index()
    {
        $sliders = Slider::latest()->get();
       return view('backend.pages.slider.index', compact('sliders'));
    }



    public function create()
    {
        return view('backend.pages.slider.create');
    }



    public function store(Request $request)
    {

        $this->validate($request,[
           'title' => 'required|max:100',
           'image' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if ($image)
        {
            $currentDate = Carbon::now()->toDateString();
            $setImageName = $slug . '-' .$currentDate . '-' .uniqid() . '.' . $image->getClientOriginalExtension();

            if (!file_exists('uploads/sliders'))
            {
                mkdir('uploads/sliders', 0777,true);
            }

            $image->move('uploads/sliders',$setImageName);
        }else {
             $setImageName = 'default.png';

        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $slug;
        $slider->image = $setImageName;
        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider Creste Successfully Done!');

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
