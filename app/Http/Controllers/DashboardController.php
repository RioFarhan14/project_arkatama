<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderitem;
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
            
            //Filter berdasarkan nama produk
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            if ($sort === 'sold_out') {
                $query->orderBy('sold_out');
            } elseif ($sort === 'new') {
                $query->orderByDesc('created_at');
            }
        }
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
    //mengambil data pesanan
    $orders = Order::where('status', 'pending')->get();

    // Menghitung jumlah quantity dari OrderItem hanya untuk pesanan dengan status "selesai"
    $sold_out = OrderItem::whereHas('order', function ($query) {
        $query->where('status', 'selesai');
    })->sum('quantity');
    
    if (Auth::user()->role->name == 'User') {
        return view('dashboard.user', ['products' => $products, 'sale_items' => $sale_items,
        'sliders' => $sliders, 'categorys' => $categorys, 'cartitemsId' => $cartitemsId]);
    } else {
        return view('dashboard.admin', compact('totalproduct','users','category','orders','sold_out'));
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

    public function order($id){
        $orderitems = Orderitem::where('order_id',$id)->get();
        return view('dashboard.order', compact('orderitems'));
    }

    public function confirm($id){
        Order::where('id',$id)->update([
            'status' => 'selesai'
        ]);
        $orderItems = OrderItem::where('order_id', $id)->get();

        // Mengambil daftar product_id yang unik dari orderItems
        $products = $orderItems->pluck('product_id')->unique();

        // Mengupdate atribut sold_out pada setiap produk yang terkait dengan pesanan
        foreach ($products as $productid) {

            // Mengambil objek Product berdasarkan product_id
            $product = Product::find($productid);
            $orderItem = $orderItems->firstWhere('product_id', $productid);
            $quantity = $orderItem->quantity;

            // Memeriksa apakah sold_out awalnya null atau bukan
            if ($product->sold_out === null) {

                // Jika sold_out null, set nilai sold_out dengan quantity
                $product->sold_out = $quantity;
            } else {

                // Jika sold_out tidak null, tambahkan quantity ke sold_out saat ini
                $product->sold_out += $quantity;
            }
            
            // Menyimpan perubahan pada model Product
            $product->save();
        }
        return redirect()->route('dashboard');
    } 

    public function history(){
        $orders = Order::where('status','selesai')->get();
        return view('dashboard.historyadmin',compact('orders'));
    }
}