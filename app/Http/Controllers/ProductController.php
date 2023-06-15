<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index()
    {
        $products = product::with('category')->get();
        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'description' =>'required|min:4',
            'price' => 'required|integer',
            'discount' => 'required|integer|digits_between:1,3',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'category.required' => 'Kolom kategori harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
            'name.string' => 'Kolom nama harus berupa teks.',
            'name.min' => 'Kolom nama minimal diisi 3 karakter.',
            'description.required' => 'Kolom deskripsi harus diisi.',
            'description.min' => 'Kolom deskripsi minimal diisi 4 karakter.',
            'price.required' => 'Kolom harga harus diisi.',
            'price.integer' => 'Kolom harga harus berupa angka.',
            'discount.required' => 'Kolom discount harus diisi.',
            'discount.integer' => 'Kolom discount harus berupa angka.',
            'discount.digits_between' => 'kolom discount maksimal 100%',
            'image.required' => 'Kolom gambar harus diisi.',
            'image.image' => 'Kolom gambar harus berupa file gambar.',
            'image.mimes' => 'Kolom gambar harus memiliki format file jpeg, png, atau jpg.',
            'image.max' => 'Ukuran file gambar tidak boleh melebihi 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // ubah nama file
        $imageName = time() . '.' . $request->image->extension();

        // simpan file ke folder public/product
        Storage::putFileAs('public/product', $request->image, $imageName);
        // variabel discount
        $discount = $request->discount;
        // konversi harga setelah discount
        if($discount == 0){
            $finalprice = $request->price;
        }else{
            $finalprice = $request->price - ($request->price * ($request->discount / 100));
        }
        $product = product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'sold_out'  => 0,
            'discount' => $discount,
            'final_price' => $finalprice,
            'image' => $imageName,
        ]);

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        // ambil data product berdasarkan id
        $product = product::where('id', $id)->with('category')->first();

        // ambil data brand dan category sebagai isian di pilihan (select)
        $categories = Category::all();

        // tampilkan view edit dan passing data product
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'description' =>'required|min:4',
            'price' => 'required|integer',
            'discount' => 'required|integer|digits_between:1,3',
        ], [
            'category.required' => 'Kolom kategori harus diisi.',
            'name.required' => 'Kolom nama harus diisi.',
            'name.string' => 'Kolom nama harus berupa teks.',
            'name.min' => 'Kolom nama minimal diisi 3 karakter.',
            'description.required' => 'Kolom deskripsi harus diisi.',
            'description.min' => 'Kolom deskripsi minimal diisi 4 karakter.',
            'price.required' => 'Kolom harga harus diisi.',
            'price.integer' => 'Kolom harga harus berupa angka.',
            'discount.required' => 'Kolom discount harus diisi.',
            'discount.integer' => 'Kolom discount harus berupa angka.',
            'discount.digits_between' => 'kolom discount maksimal 100%',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // cek jika user mengupload gambar di form
        if ($request->hasFile('image')) {
            // ambil nama file gambar lama dari database
            $old_image = product::find($id)->image;

            // hapus file gambar lama dari folder slider
            Storage::delete('public/product/' . $old_image);

            // ubah nama file
            $imageName = time() . '.' . $request->image->extension();

            // simpan file ke folder public/product
            Storage::putFileAs('public/product', $request->image, $imageName);
            // variabel discount
            $discount = $request->discount;
            // konversi harga setelah discount
            if($discount == 0){
            $finalprice = $request->price;
            }else{
            $finalprice = $request->price - ($request->price * ($request->discount / 100));
            }
            // update data product
            product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $discount,
                'final_price' => $finalprice,
                'image' => $imageName,
            ]);
        } else {
            // variabel discount
            $discount = $request->discount;
            // konversi harga setelah discount
            if($discount == 0){
            $finalprice = $request->price;
            }else{
            $finalprice = $request->price - ($request->price * ($request->discount / 100));
            }
            // update data product tanpa menyertakan file gambar
            product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $discount,
                'final_price' => $finalprice,
            ]);
        }

        // redirect ke halaman product.index
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        // ambil data product berdasarkan id
        $product = Product::find($id);

        // hapus data product
        $product->delete();

        // redirect ke halaman product.index
        return redirect()->route('product.index');
    }
}
