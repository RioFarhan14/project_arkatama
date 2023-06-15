<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        //sale items
        $sale_items = Product::where('discount', '!=', 0)
        ->with('category')
        ->get();
        // mengambil data category
        $categories = Category::all();
        $productsByCategory = [];
        foreach ($categories as $category) {
        $products = $category->products;
        $productsByCategory[$category->name] = $products;
    }
    
        // mengambil data slider
        $sliders = Slider::all();

        // return view('landing', compact('productsByCategory', 'categories', 'sliders', 'sale_items'));
        return view('landing', compact('sliders', 'categories','productsByCategory','sale_items'));

    }
}
