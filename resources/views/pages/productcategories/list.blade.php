@extends('layouts.dashboard')
@section('content2')
<a href="/productcategories/create"><button class="btn-info mb-2">Input</button></a>
<table width="600px" border="1" class="table table-primary table-condensed text-center">
    <thead>
      <tr>
        <th>#</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Description</th>
        <th scope="col">Menu</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $list)
            <tr class="text-start">
                <td class="table-active text-break" width="40px">{{$loop->iteration}}</td>
                <td class="table-danger" width="150px">{{$list->name}}</td>
                <td>
                    @if ($list->status == 'active')
                        <h5><span class="badge bg-success opacity-50">Active</span></h5>
                    @else
                        <h5><span class="badge bg-warning opacity-50">in Active</span></h5>
                    @endif
                </td>
                <td>{{ $list->description }}</td>
                <td>
                    <a href="{{route('productcategories.show',['productcategory' => $list->id]) }}" class="btn btn-outline-success">Product</a>
                    <a href="{{route('productcategories.edit', ['productcategory' => $list->id]) }}" class="btn btn-warning">Edit</a>
                    {{-- untuk hapus data di table --}}
                    <form action="{{route('productcategories.destroy',['productcategory' => $list->id])}}" class="d-inline" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
      <tr>
      </tr>
    </tbody>
  </table>
@endsection()
