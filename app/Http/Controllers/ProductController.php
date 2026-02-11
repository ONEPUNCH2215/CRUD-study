<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::query();

        $name = request('name');
        $category = request('category');

        if (!empty($name)) {
            $query->where('name', 'like', '%'.$name.'%');
        }

        if (!empty($category)) {
            $query->where('category', 'like', '%'.$category.'%');
        }

        $products = $query->get();
        return view('products.index', ['products' => $products]);
    }
    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $newProduct = Product::create($data);

        return redirect(route('product.index'));

    }
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product){
        $data = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated successfully!');
    }
    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfully!');
    }
}
