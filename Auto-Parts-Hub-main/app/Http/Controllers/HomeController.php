<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::active()->get();
        $featuredProducts = Product::where('featured', 1)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
            
        return view('home.index', compact('sliders', 'featuredProducts'));
    }
}
