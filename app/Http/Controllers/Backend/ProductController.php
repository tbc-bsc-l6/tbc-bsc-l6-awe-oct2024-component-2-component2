<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{

    public function product()
    {


        $products = Product::with('category')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.products', compact('products'));

    }

    public function viewProduct()
    {
        $viewproducts = Product::take(10)->get(); 

        $categories = Category::all();

        return view('allproducts', compact('viewproducts', 'categories'));

    }

   









    public function addProducts()
    {
        $categories = Category::all();
        return view('admin.products.addproducts', compact('categories'));
    }

    public function storeProducts(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:products|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'item' => 'required|in:veg,non-veg',
        ]);


        

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = null;

        }



        Product::create([
            'name' => $request->name,
            'product_image' => $imagePath,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'item' => $request->item

        ]);


        $notification = [
            'message' => 'Product " ' . $request->name . ' " Created Successfully',
            'alert-type' => 'success',

        ];

        return redirect()->route('admin.products')->with($notification);







    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.editproduct', compact('product', 'categories'));

    }


    public function updateProducts(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20|unique:products,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'item' => 'required|in:veg,non-veg',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image') && $product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->item = $request->item;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->product_image = $imagePath;
        }

        $product->update();

        $notification = [
            'message' => 'Product " ' . $request->name . ' " Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.products')->with($notification);
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->id;

        $product = Product::findOrFail($id);

        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);

        }

        $product->delete();

        $notification = [
            'message' => 'Product " ' . $product->name . ' " Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);



    }






}
