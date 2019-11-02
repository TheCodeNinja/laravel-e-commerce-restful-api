<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api')->except('index', 'show');
    }

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
    public function store(ProductRequest $request)
    {
        // $request->all();
        
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();
        
        return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED); 
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
    public function update(ProductRequest $request, Product $product)
    {
        $this->checkProductUser($product);

        $request['detail'] = $request->description;
        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->checkProductUser($product);
        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT); // 204
    }

    public function checkProductUser($product) {
        if (Auth::id() !== $product->user_id) {
            throw new ProductNotBelongsToUser;
            // php artisan make:exception ProductNotBelongsToUser
        }
    }

}
