<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil user ID dari authenticated user
        $userId = auth()->user()->id;

        $cartId = Cart::where('user_id', $userId)->value('id');
        $cartitemsId = CartItem::where('cart_id', '=', $cartId)->count();

        //ambil cartitems dari user ini
        $products = CartItem::where('cart_id', '=', $cartId)->with('product')->get();
        $subtotal = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('cart_items.cart_id', $cartId)
            ->sum(DB::raw('products.final_price * cart_items.quantity'));
        $total = $subtotal + 20000;
        return view('transaction.checkout', compact('cartitemsId', 'products', 'subtotal','total'));
    }

    
    public function checkout($total)
    {
        
        // Validasi request

        // Ambil user ID dari authenticated user
        $userId = auth()->user()->id;

        // Ambil keranjang belanja pengguna
        $cart = Cart::where('user_id', $userId)->first();

        // Buat pesanan baru
        $order = Order::create([
            'user_id' => $userId,
            'total_price' => $total, // Gantikan dengan metode untuk menghitung total harga
            'status' => 'pending', // Atur status pesanan sesuai kebutuhan
        ]);

        // Ambil item dari keranjang belanja dan tambahkan ke pesanan
        $cartItems = Cartitem::where('cart_id', $cart->id)->get();
        foreach ($cartItems as $cartItem) {
            $order->orderItems()->create([
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ]);
        }

        // Kosongkan keranjang belanja
        $cartItems->each->delete();

        // Berikan respons atau lakukan redirect sesuai kebutuhan Anda
        return redirect()->route('status',$order->id);
    }
    public function status($orderId){
        // Ambil data pesanan berdasarkan ID
    $order = Order::findOrFail($orderId);

    // Ambil item pesanan berdasarkan pesanan yang terkait
    $orderItems = $order->orderItems;
        return view('transaction.status',compact('order', 'orderItems'));
    }
}
