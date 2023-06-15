<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cartitem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validasi request

        // Ambil user ID dari authenticated user
        $userId = auth()->user()->id;

        // Cek apakah keranjang belanja sudah ada untuk pengguna tersebut
        $cart = Cart::where('user_id', $userId)->first();

        if (!$cart) {
            // Jika keranjang belanja belum ada, buat baru
            $cart = Cart::create([
                'user_id' => $userId,
            ]);
        }
        // Tambahkan item ke keranjang belanja
        $cartItem = CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('dashboard');
        // Berikan respons atau lakukan redirect sesuai kebutuhan Anda
    }

    public function destroy($id)
    {
        // ambil data cartitems berdasarkan id
        $cartitems = Cartitem::find($id);

        // hapus data cartitems
        $cartitems->delete();

        // redirect ke halaman checkout
        return redirect()->route('checkout');
    }
}
