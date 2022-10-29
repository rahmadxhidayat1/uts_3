@extends('layouts.dashboard')
@section('content2')
<h1>{{ $data->id ? 'Edit' : 'Create'}}</h1>
@if ($data->id)
    <form action="{{ route('product.update' , ['product' => $data->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @else
        <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama produk</label>
            <input type="text" class="form-control" name="title" value="{{$data->title}}" id="exampleInputEmail1" >
            @error('title') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmails" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleInputEmails" rows="1">{{ $data->description }}</textarea>
            @error('description') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select name="category_id" id="" class="form-select">
                @foreach ($productcategories as $productcategory)
                    <option value="{{ $productcategory->id }}">{{ $productcategory->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">Keadaan barang</label>
            <select class="form-select" name="status" id="exampleInputEmail2">
                <option value="active" {{$data->status== 'active' ? 'selected' : ''}}>Active</option>
                <option value="inactive" {{$data->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                <option value="draft" {{$data->status == 'draft' ? 'selected' : ''}}>Draft</option>
            </select>
            @error('status') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Weight (kg)</label>
            <input type="text" class="form-control" name="weight" value="{{$data->weight}}" id="exampleInputEmail1" >
            @error('weight') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{$data->price}}" id="exampleInputEmail1" >
            @error('price') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image') <div class="text-muted"><p class="text-white" style="text-decoration: underline">{{$message}}</p></div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="p-2 btn btn-primary">Submit</button>
            <button type="button" class="p-2 m-2 btn btn-danger"><a href="/productcategories" class="text-white" style="text-decoration: none">Back</a></button>
        </div>
  </form>
@endsection()
