<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Productcategories;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
        $data = Products::with(['productcategories']);
        $categories = Productcategories::get();

        if ($search) {
            $data->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('status','like', "%$search%");
            });
        }

        if($filter) {
            $data->where(function ($query) use ($filter){
                $query->where('category_id','=',$filter);
            });
        }

        $data = $data->paginate(2);
        // $data = Products::with(['productcategories'])->get();
        // $productcategories = Productcategories::get();
        return view('pages.products.list',[
            'data' => $data,
            'productcategories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Products();
        $productcategories = Productcategories::get();
        return view('pages.products.form',[
            'data' => $data,
            'productcategories' => $productcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductsRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        if ($image) {
            $data['image'] = $image->store('images/product', 'public');
        }
        $data['image'] = $request->file('image')->store('images/product','public');
        Products::create($data);
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $product)
    {
        $productcategories = Productcategories::get();
        return view('pages.products.form', [
            'data' => $product,
            'productcategories' => $productcategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductsRequest  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductsRequest $request, products $product)
    {
        $data = $request->all();
        $image = $request->file('image');
        // CEK APAKAH USER MENGUPLOAD FILE
        if ($image) {
            // cek apakah file lama ada didalam folder?
            $exists = File::exists(storage_path('app/public/').$product->image);
            if ($exists) {
                // delete file lama tersebut
                File::delete(storage_path('app/public/').$product->image);
            }
            // upload file baru
            $data['image'] = $image->store('images/product', 'public');
        }
        $product->update($data);
        return redirect()->route('product.index')->with('notif', 'berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $product)
    {
        $exists = File::exists(storage_path('app/public/').$product->image);
        if ($exists) {
            // delete file lama tersebut
            File::delete(storage_path('app/public/').$product->image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('notif', 'berhasil didelete');
    }
}
