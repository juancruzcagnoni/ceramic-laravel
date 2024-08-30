<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user && $user->role == 'client' || $user === null) {
            return redirect('/shop');
        }

        $categories = Category::all();
        $products = Product::all();

        $currentRoute = $request->route()->getName();

        if ($currentRoute === 'admin.index') {
            return view('admin', ['categories' => $categories, 'products' => $products]);
        } elseif ($currentRoute === 'products.index') {
            return view('products', ['categories' => $categories, 'products' => $products]);
        } else {
            return abort(404);
        }
    }

    public function create()
    {
        $categories = Category::all();

        return view('products', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|min:2|max:100',
            'description' => 'required|min:10|max:100',
            'price'       => 'required|numeric|min:0',
            'text'        => 'required|min:20|max:1000',
            'image'       => 'required|image',
            'category_id' => 'required|exists:categories,id',
            'material'    => 'required|string|max:255',
            'made_by'     => 'required|string|max:255',
            'dimensions'  => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public', $imageName);

        $imageUrl = 'storage/' . $imageName;

        $data = $request->all();

        $product = new Product([
            'name'       => $data['name'],
            'desc'       => $data['description'],
            'price'      => $data['price'],
            'text'       => $data['text'],
            'image'      => $imageUrl,
            'ip_address' => request()->ip(),
        ]);

        $product->category()->associate($data['category_id']);
        $product->save();

        $productDetail = new ProductDetail([
            'material'    => $data['material'],
            'made_by'     => $data['made_by'],
            'dimensions'  => $data['dimensions'],
        ]);

        $product->details()->save($productDetail);

        return redirect('/admin');
    }

    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            'name'        => 'required|min:2|max:100',
            'description' => 'required|min:10|max:100',
            'price'       => 'required|numeric|min:0',
            'text'        => 'required|min:20|max:1000',
            'image'       => 'image',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public', $imageName);
            $imageUrl = asset('storage/' . $imageName);
            $data['image'] = $imageUrl;
        }

        $product->update($data);

        return redirect('/products')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully');
    }

    public function list(Request $request)
    {
        $user = $request->user();

        if ($user && $user->role == 'client' || $user === null) {
            return redirect('/shop');
        }

        return view('products', [
            'products' => Product::all()
        ]);
    }
}
