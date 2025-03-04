<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    
    public function home(): View
    {
        $product = Product::latest()->paginate(5);
        return view('home', compact('products'));
    }

    public function create(): View
    {
        return view('create', compact('create'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // validate the request
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'product_name' => 'required|min:10',
            'category' => 'required|min:10',
            'brand' => 'required|min:10',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        // upload image
        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        $image->move(public_path('images'), $image_name);

        // store the product
        Product::create([
            'image' => $image_name,
            'product_name' => $request->product_name,
            'category' => $request->category,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        
        // mengembalikan data ke halaman home
        return redirect()->route('home')->with('success', 'Product created successfully.');

    }

        public function show(string $id): View
        {
            $product = Product::findOrFail($id);
            return view('show', compact('product'));
        }

        public function edit(string $id): View
        {
            $product = Product::findOrFail($id);
            return view('edit', compact('product'));
        }

        public function update(Request $request, $id): RedirectResponse
        {
            // validate the request
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048',
                'product_name' => 'required|min:10',
                'category' => 'required|min:10',
                'brand' => 'required|min:10',
                'description' => 'required|min:10',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
            ]);

            // find the product
            $product = Product::findOrFail($id);


            // check if there is an image
            if ($request->hasFile('image')) {
                // upload the image
                $image = $request->file('image');
                $image->move(public_path('images'), $image->hashName());

                // delete the old image
                unlink(public_path('images/' . $product->image));

                // update the product
                $product->update([
                    'image' => $image->hashName(),
                    'product_name' => $request->product_name,
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'description' => $request->description,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                ]);
            } else {
                // update product without image
                $product->update([
                    'product_name' => $request->product_name,
                    'category' => $request->category,
                    'brand' => $request->brand,
                    'description' => $request->description,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                ]);
            }
            // mengembalikan data ke halaman home
            return redirect()->route('home')->with('success', 'Product updated successfully.');
        }

        public function destroy(string $id): RedirectResponse
        {
            // find the product
            $product = Product::findOrFail($id);

            // delete the image
            unlink(public_path('images/' . $product->image));

            // delete the product
            $product->delete();

            // mengembalikan data ke halaman home
            return redirect()->route('home')->with('success', 'Product deleted successfully.');
        }
}
