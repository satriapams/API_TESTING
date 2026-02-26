<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ✅ GET ALL
    public function index()
    {
        return response()->json(Product::latest()->get());
    }

    // ✅ CREATE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'is_active' => 'boolean',
            'release_date' => 'nullable|date',
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Produk berhasil dibuat',
            'data' => $product
        ]);
    }

    // ✅ SHOW DETAIL
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer',
            'is_active' => 'boolean',
            'release_date' => 'nullable|date',
        ]);

        $product->update($request->all());

        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $product
        ]);
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}