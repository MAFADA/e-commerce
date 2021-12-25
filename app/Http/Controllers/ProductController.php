<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('user.admin.indexProduct',['product'=> $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('user.admin.addproduct',['categories'=>$category]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        if ($request->file('photo')) {
            $image_name = $request->file('photo')->store('images','public');
        }

        $product->product_name = $request->product_name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->photo = $image_name;

        $category = new Category;        
        $category->id = $request->Category;

        $product->category()->associate($category);
        $product->save();

        return redirect()->route('products.index')->with('success','Add product success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        return view('user.admin.showProduct',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('user.admin.editproduct',['product'=> $product,'categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name=$request->product_name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        
        if ($product->photo && file_exists(storage_path('app/public/'.$product->photo))) {
            \Storage::delete('public/'.$product->photo);
        }
        $image_name = $request->file('photo')->store('images','public');
        $product->photo = $image_name;

        $category = new Category;
        $category->id = $request->Category;

        $product->category()->associate($category);
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->search;
        $product = Product::where('product_name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('user.admin.indexProduct', compact('product'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
