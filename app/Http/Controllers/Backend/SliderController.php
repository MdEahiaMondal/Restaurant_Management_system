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



    public function edit(Slider $slider)
    {
       return view('backend.pages.slider.edit', compact('slider'));
    }




    public function update(Request $request, Slider $slider)
    {
        $this->validate($request,[
            'title' => 'required|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,bmp,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);


        if ($image)
        {

            // now delete the old image if we have (start)
            if (file_exists('uploads/sliders/'.$slider->image))
            {
                unlink('uploads/sliders/'.$slider->image);
            }
            // now delete the old image if we have (end)


            $currentDate = Carbon::now()->toDateString();
            $setImageName = $slug . '-' .$currentDate . '-' .uniqid() . '.' . $image->getClientOriginalExtension();


            if (!file_exists('uploads/sliders'))
            {
                mkdir('uploads/sliders', 0777,true);
            }

            $image->move('uploads/sliders',$setImageName);

        }else {
            // set old image if not choose
            $setImageName = $slider->image;
        }


        $update = $slider; // only this id
        $update->title = $request->title;
        $update->sub_title = $slug;
        $update->image = $setImageName;
        $update->save();

        return redirect()->route('sliders.index')->with('success', 'Slider Updated Successfully Done!');


    }



    public function destroy($id)
    {

    }
}
