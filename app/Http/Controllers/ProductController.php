<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('products.product')->with('products', $products);
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detail', @compact('product'));
    }

    public function create(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'flavor' => 'required',
        'brand' => 'required',
        'price' => 'required|numeric',
        'dimension' => 'required|numeric',
        'udpack' => 'required|integer',
        'weight' => 'required|numeric',
        'stock' => 'required|integer',
        'iva' => 'required|numeric'
    ]);

    $newProduct = new Product;
    $newProduct->name = $request->name;
    $newProduct->description = $request->description;
    $newProduct->flavor = $request->flavor;
    $newProduct->brand = $request->brand;
    $newProduct->price = $request->price;
    $newProduct->dimension = $request->dimension;
    $newProduct->udpack = $request->udpack;
    $newProduct->weight = $request->weight;
    $newProduct->stock = $request->stock;
    $newProduct->iva = $request->iva;

    $newProduct->save();

    return redirect()->route('products.index')->with('mensaje', 'Product added successfully');
}

    
    public function newProduct()
    {
        return view('products.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'flavor' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'dimension' => 'required|numeric',
            'udpack' => 'required|integer',
            'weight' => 'required|numeric',
            'stock' => 'required|integer',
            'iva' => 'required|numeric',
        ]);

        $productUpdate = Product::findOrFail($id);
        $productUpdate->name = $request->name;
        $productUpdate->description = $request->description;
        $productUpdate->flavor = $request->flavor;
        $productUpdate->brand = $request->brand;
        $productUpdate->price = $request->price;
        $productUpdate->dimension = $request->dimension;
        $productUpdate->udpack = $request->udpack;
        $productUpdate->weight = $request->weight;
        $productUpdate->stock = $request->stock;
        $productUpdate->iva = $request->iva;
        $productUpdate->save();

        return back()->with('mensaje', 'Product updated');
    }


    public function delete($id)
    {
        $productDelete = Product::findOrFail($id);
        $productDelete->delete();
        return back()->with('mensaje', 'Product removed');
    }
}
