<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::paginate(10);
        return view('product', [ 'products' => $products ]);
    }

    public function create() 
    {
        return view('product-create');
    }

    public function store(ProductRequest $request)
    {
        $imageName = time().'.'.$request->file('image')->extension();
        $request->image->move(public_path('images'), $imageName);

        $product = $request->only('name', 'price');
        $product['image'] = 'images/' . $imageName;

        Product::create($product);
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product-edit', [ 'product' => $product ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->only('name', 'price');
        if ($request->image) {
            // preparing image name
            $imageName = time().'.'.$request->file('image')->extension();
            // move image
            $request->image->move(public_path('images'), $imageName);
            // put image path to $data
            $data['image'] = 'images/' . $imageName;

            // delete file by path
            unlink(public_path() . '/' . $product->image);
        }

        $product->update($data);
        return redirect()->route('product.index');  
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-show', [ 'product' => $product ]);
    }

    public function destroy($id) 
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
