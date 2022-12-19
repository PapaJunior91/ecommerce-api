<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $products = Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_image' => 'required|max:255',
            'product_cost' => 'required|max:255',
            'product_price' => 'required|max:11',
            'created_by' => 'required',
        ]);
        
        $product_info = $request->all();
        
        if($request->hasFile('product_image')){
            $product_info['product_image'] =  $request->file('product_image')->store('storage/images/products');
        } 

        Product::create($product_info);

        return response()->json([
            'status' => true,
            'message' => 'Product Added Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $request->validate([
            'first_name' => 'max:255',
            'last_name' => 'max:255',
            'email' => 'max:255',
            'phone_number' => 'max:11',
            'role' => '',
            'password' => '',
        ]);

        User::where('id','=',$id)->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'User Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function productTemplate()
    {
        return Storage::download('images/products/products-template.xlsx');
    }
}
