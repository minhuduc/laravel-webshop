<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('status',1)->paginate(5);
        $producttype = ProductType::where('status',1)->get();
        $category = Category::where('status',1)->get();
        return view('admin.pages.product.list',compact('product','producttype','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::where('status',1)->get();
        $producttype = ProductType::where('status',1)->get();
        return view('admin.pages.product.add',compact('category','producttype'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Product::create([
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'promotional' => $request->promotional,
            'idCategory' => $request->cate,
            'idProductType' => $request->producttype,
            'status' => $request->status
        ]);
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         //
         $product = Product::find($id);
         return response()->json($product,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|min:2|max:255'
            ],
            [
                'required' => 'Name is required',
                'min' => 'Must from 2 to 255 characters',
                'max' => 'Must from 2 to 255 characters'
            ]
        );
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()],200);
        }

        $product = Product::find($id);
        $product->update(
            ['name' => $request->name,
            'slug' => utf8tourl($request->slug),
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'promotional' => $request->promotional,
            'idCategory' => $request->category,
            'idProductType' => $request->producttype,
            'status' => $request->status
            ]
        );
        return response()->json(['success' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['success' => 'Delete success']);
    }
}
