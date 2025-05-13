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
        $featuredProducts = Product::where('is_featured', true)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();
            
        $popularProducts = Product::where('status', 'active')
            ->orderBy('views', 'desc')
            ->take(4)
            ->get();
            
        return view('index', compact('sliders', 'featuredProducts', 'popularProducts'));
    }
}
