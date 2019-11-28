<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function index()
    {
        $sliders = Slider::all();
        $items = Item::all();
        $categories = Category::all();
        return view('welcome', compact('sliders','items', 'categories'));
    }
}
