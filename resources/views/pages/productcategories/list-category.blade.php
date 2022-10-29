@extends('layouts.dashboard')
@section('content2')
    <h3>{{$productcategories->name}}</h3>
    <p>Barang ada {{$productcategories->products->count()}}</p>
    <table class="table table-borderless table-dark">
        <thead>
            <tr>
              <th class="table-active" scope="col">#</th>
              <th class="table-active" scope="col">Nama Produk</th>
            </tr>
          </thead>
        <tbody>
            @foreach ($productcategories->products as $product)
                <tr class="text-start">
                    <th class="table-warning text-break">{{$loop->iteration}}</th>
                    <td class="table-info">{{$product->title}}</td  >
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection()
