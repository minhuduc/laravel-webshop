<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProducttypeRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttype = ProductType::paginate(5);
        $category = Category::paginate(115);
        return view('admin.pages.producttype.list',compact('producttype','category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::paginate(115);
        return view('admin.pages.producttype.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProducttypeRequest $request)
    {
        //
        ProductType::create([
            'idCategory' => $request->cate,
            'name' => $request->name,
            'slug' => utf8tourl($request->name),
            'status' => $request->status
        ]);
        return redirect()->route('producttype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producttype = ProductType::find($id);
        return response()->json($producttype,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        $category = Category::find($id);
        $category->update(
            ['name' => $request->name,
            'slug' => utf8tourl($request->slug),
            'status' => $request->status
            ]
        );
        return response()->json(['success' => 'Update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producttype = ProductType::find($id);
        $producttype->delete();
        return response()->json(['success' => 'Delete success']);
    }
}
