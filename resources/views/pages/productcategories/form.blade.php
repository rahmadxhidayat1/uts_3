@extends('layouts.dashboard')
@section('content2')
<h1>create</h1>
@if ($data->id)
    <form action="{{ route('productcategories.update' , ['productcategory'=>$data->id])}}" method="POST">
    @method('PUT')
    @else
        <form action="{{ route('productcategories.store')}}" method="POST">
    @endif
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama produk</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}" id="exampleInputEmail1" >
            @error('name') <div class="text-muted">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail2" class="form-label">Keadaan barang</label>
            <select class="form-control" name="status" id="exampleInputEmail2">
                <option value="Active" {{$data->status== 'active' ? 'selected' : ''}}>Active</option>
                <option value="Inactive" {{$data->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
            </select>
            @error('status') <div class="text-muted">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail3" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="description" value="{{$data->description}}" id="exampleInputEmail3" >
            @error('description') <div class="text-muted">{{$message}}</div>
            @enderror
            <button type="submit" class="p-2 btn btn-primary">Submit</button>
            <button type="button" class="p-2 m-2 btn btn-danger"><a href="/productcategories" class="text-white" style="text-decoration: none">Back</a></button>
        </div>
  </form>
@endsection()
