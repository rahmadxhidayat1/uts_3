<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreproductcategoriesRequest;
use App\Http\Requests\UpdateproductcategoriesRequest;
use App\Models\Productcategories;
use App\Models\Products;

class ProductcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Productcategories::get();
        return view('pages.productcategories.list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     * major to procat
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procat =new Productcategories();
        return view('pages.productcategories.form', ['data' => $procat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductcategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductcategoriesRequest $request)
    {
        $data =$request->all();
        Productcategories::create($data);
        return redirect('productcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function show(productcategories $productcategory)
    {
        $productcategories = $productcategory->load(['products']);
        return view('pages.productcategories.list-category',compact('productcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(Productcategories $productcategory)
    {
        return view('pages.productcategories.form',[
            'data' => $productcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductcategoriesRequest  $request
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductcategoriesRequest $request, Productcategories $productcategory)
    {
        $data = $request->all();
        $productcategory ->update($data);
        return redirect()->route('productcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(productcategories $productcategory)
    {
        $productcategory->destroy($productcategory->id);
        return redirect()->route('productcategories.index')->with('notif', 'berhasil delete');
    }
}
