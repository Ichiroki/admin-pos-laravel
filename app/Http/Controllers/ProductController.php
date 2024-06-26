<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->except('image'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $randomCode = Str::random(10);
            $imageName = "NLE-" . $randomCode . "-" . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $product->update(['image' => $imageName]);
        }
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->except('image'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newImageName = $image->getClientOriginalName();
            if ($product->image != $newImageName) {
                $randomCode = Str::random(10);
                $imageName = "NLE-" . $randomCode . "-" . $newImageName;
                // Hapus gambar lama jika ada
                if (file_exists(public_path('images/' . $product->getOriginal('image')))) {
                    unlink(public_path('images/' . $product->getOriginal('image')));
                    $image->move(public_path('images'), $imageName);
                    $product->update(['image' => $imageName]);
                }
            }
        }
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
