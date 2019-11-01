<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
        
        // OUTPUT:
        // {
        //     "data": [
        //         {
        //             "customer": "Derick Reynolds",
        //             "body": "Corporis voluptas minus est quos unde. Dolore quia consequatur provident nemo aut exercitationem et et. Eos id et culpa temporibus minima ut repellendus. Occaecati repellendus recusandae est quibusdam.",
        //             "star": 0
        //         },
        //         {
        //             "customer": "Elyse Weimann",
        //             "body": "Vero ut at et ab earum dolor sapiente sed. Aut repudiandae blanditiis aperiam harum. Est explicabo enim neque ipsa eum.",
        //             "star": 5
        //         }
        //     ]
        // }
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
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
