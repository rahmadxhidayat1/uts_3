<?php

namespace App\Http\Controllers;

use App\Models\productcategories;
use App\Http\Requests\StoreproductcategoriesRequest;
use App\Http\Requests\UpdateproductcategoriesRequest;

class ProductcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreproductcategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductcategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function show(productcategories $productcategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(productcategories $productcategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductcategoriesRequest  $request
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductcategoriesRequest $request, productcategories $productcategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(productcategories $productcategories)
    {
        //
    }
}
