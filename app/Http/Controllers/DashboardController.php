<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // mengambil data slider
        $sliders = Slider::all();
        // mengambil data category
        $categorys = Category::all();
        //sale items
        $sale_items = Product::where('discount', '!=', 0)->get();

        if (empty($request->all())) {
            $products = Product::with('category')->get();
        } else {
            $query = Product::query();
            
            // Filter berdasarkan nama produk
        // if ($request->has('sort')) {
        //     $sort = $request->input('sort');
        //     if ($sort === 'sold_out') {
        //         $query->orderBy('sold_out');
        //     } elseif ($sort === 'new') {
        //         $query->orderByDesc('created_at');
        //     }
        // }
            // Filter berdasarkan kategori
            $categoryIds = explode(',', $request->input('category'));
        
            if (!empty($categoryIds) && !in_array('all', $categoryIds)) {
                $query->whereIn('category_id', $categoryIds);
            }
        
            // Filter berdasarkan harga
            if ($request->has('price')) {
                $priceRange = $request->input('price');
        
                if ($priceRange === '0-10000') {
                    $query->whereBetween('price', [0, 10000]);
                } elseif ($priceRange === '10000-25000') {
                    $query->whereBetween('price', [10000, 25000]);
                } elseif ($priceRange === '25000-50000') {
                    $query->whereBetween('price', [25000, 50000]);
                } elseif ($priceRange === '50000-75000') {
                    $query->whereBetween('price', [50000, 75000]);
                } elseif ($priceRange === '75000-') {
                    $query->where('price', '>', 75000);
                }
            }
        
            // Eksekusi query dan ambil hasilnya
            $products = $query->with('category')->get();
        }
        
    $userId = auth()->user()->id;
    $cartId = Cart::where('user_id', $userId)->value('id');
    $cartitemsId = CartItem::where('cart_id', '=', $cartId)->count();
    //mengambil data user
    $users = User::count();
    //mengambil data product
    $product = Product::all();
    $totalproduct = $product->count();
    //mengambil data category
    $category = $categorys->count();
    
    if (Auth::user()->role->name == 'User') {
        return view('dashboard.user', ['products' => $products, 'sale_items' => $sale_items,
        'sliders' => $sliders, 'categorys' => $categorys, 'cartitemsId' => $cartitemsId]);
    } else {
        return view('dashboard.admin', compact('totalproduct','users','category'));
    }

}

    public function info(Request $request, $id){
        $userId = auth()->user()->id;
        $cartId = Cart::where('user_id', $userId)->value('id');
        $cartitemsId = Cartitem::where('cart_id', '=', $cartId)->count();
        $cartitems = Cartitem::where('cart_id', '=', $cartId)->where('product_id','=',$id)->value('quantity');
        $product = Product::where('id', $id)->with('category')->first();

        $related = Product::where('category_id', $product->category->id)->where('id', '!=', $product->id)->inRandomOrder()->limit(4)->get();

        if ($product) {
            return view('dashboard.show', compact('product', 'related','cartitemsId','cartitems'));
        } else {
            abort(404);
        }
    }
}