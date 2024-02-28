<?php

namespace App\Domains\Logic\Http\Controllers\Backend\Company\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Product\Product;
use App\Models\Company\Product\ProductCategories;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    //*************VIEW*************** */

    public function getProductView(Request $request)
    {
        $productView = Product::all();
        return view('backend.layouts.company.product.productView',compact('productView'));

    }

    //******************************************* */
    public function getProduct(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'all'); 
        $publicImg = 'img/product/';
    
        $query = Product::query();
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }
    
        if ($sort != 'all') {
            $query->where('category_id', $sort);
        }


        $products = $query->with('category')->paginate(10);
        $categories = ProductCategories::all();
    
        foreach ($products as $productData) {
            $imagePathPublic = public_path("img/product/" . basename($productData['image']));
            $imagePathStorage = storage_path("app/public/product/" . basename($productData['image']));
            if (file_exists($imagePathPublic)) {
                $productData['image'] = asset("img/product/" . basename($productData['image']));
            } elseif (file_exists($imagePathStorage)) {
                $productData['image'] = asset("storage/product/" . basename($productData['image']));
            } else {
                $productData['image'] = asset("img/product/calendar.png");
            }
        }
    
        return view('backend.layouts.company.product.product', compact('products', 'categories', 'sort'));
    }

    

    public function storeProduct(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_link' => 'required|max:255',
            'category_id' => 'required|exists:product_categories,id',
        ]);
    
        $product = new Product;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/product');
            $product->image = str_replace('public/', '', $imagePath);
        }
    
        $product->title = $request->input('title');
        $product->button_link = $request->input('button_link');
        $product->category_id = $request->input('category_id');
        $product->save();
    
        return redirect()->route('admin.product')->with('success', 'Product created successfully');
    }
    

    public function show(Request $request)
    {
        //
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'title' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'button_link' => 'max:255',
            'category_id' => 'exists:product_categories,id',

        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.product')->with('error', 'Product not found');
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $imagePath;
        }

        $product->title = $request->input('title');
        $product->button_link = $request->input('button_link');
        $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product updated successfully');
    }

    public function destroyProduct($id)
{
    
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Product deleted successfully');
}

//**************************************************** */

public function getCategories(Request $request)
{
    $search = $request->input('search');
    $sort = $request->input('sort');
    $publicImg = 'img/product/';

    $query = ProductCategories::query();
    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    switch ($sort) {
        case 'ascending':
            $query->orderBy('name');
            break;
        case 'descending':
            $query->orderByDesc('name');
            break;
        case 'newest':
            $query->latest();
            break;
        case 'oldest':
            $query->oldest();
            break;
        default:
            $query->orderBy('name');
            break;
    }

    $categories = $query->paginate(10);
    return view('backend.layouts.company.product.productCategory', compact('categories', 'sort'));
}



public function storeCategories(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
    ]);

    $categories = new ProductCategories;

    $categories->name = $request->input('name');
    $categories->save();

    return redirect()->route('admin.productCategory')->with('success', 'Product created successfully');
}


public function updateCategories(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',

    ]);

    $categories = ProductCategories::find($id);

    $categories->name = $request->input('name');
    $categories->save();

    return redirect()->route('admin.productCategory')->with('success', 'Product updated successfully');
}

public function destroyCategories($id)
{

    $categories = ProductCategories::find($id);
    $categories->delete();

    return redirect()->route('admin.productCategory')->with('success', 'Product deleted successfully');
}
}
