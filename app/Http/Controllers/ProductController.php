<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(15));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return $product;

        // {
        //     "id": 4,
        //     "name": "tempore",
        //     "detail": "Laborum voluptatibus aperiam cupiditate facilis placeat rerum. Reprehenderit eum cupiditate est molestias dolorem ut.",
        //     "price": 208,
        //     "stock": 4,
        //     "discount": 20,
        //     "created_at": "2019-11-01 09:21:02",
        //     "updated_at": "2019-11-01 09:21:02"
        // }

        return new ProductResource($product);

        // {
        //     "data": {
        //         "name": "tempore",
        //         "description": "Laborum voluptatibus aperiam cupiditate facilis placeat rerum. Reprehenderit eum cupiditate est molestias dolorem ut.",
        //         "price": 208,
        //         "stock": 4,
        //         "discount": 20
        //     }
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
