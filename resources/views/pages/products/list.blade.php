@extends('layouts.dashboard')
@section('content2')
<a href="{{ route('product.create') }}" class="btn btn-info mb-2">Tambah Data</a>
  <form action="{{ route("product.index") }}" method="GET">
    <div class="row g-3 align-items-center pb-2">
        <div class="col-auto">
          <input type="text" id="search" name="search" value="{{ request("search") }}" class="form-control" placeholder="search Here" aria-describedby="passwordHelpInline" autocomplete="off">
        </div>
        <div class="col-auto">
            <select name="filter" id="filter" class="form-select">
                <option selected value="">All</option>
                @foreach ($productcategories as $category)
                    <option value="{{ $category->id }}" {{ request('filter') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success">search</button>
          </div>
    </div>

    </form>
<table width="600px" border="1" class="table table-primary table-condensed text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Price</th>
        <th scope="col">Weight</th>
        <th scope="col">category</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $listed)
        <tr>

            <th scope="row">{{($data->currentPage()-1)* $data->perPage() + $loop->iteration}}</th>
            <td>{{ $listed->title }}</td>
            <td>{{ $listed->description }}</td>
            <td>
                @if ($listed->status == 'active')
                    <h5><span class="badge bg-success opacity-75">{{ $listed->status }}</span></h5>
                @elseif ($listed->status == 'draft')
                    <h5><span class="badge bg-warning opacity-50">{{ $listed->status }}</span></h5>
                @else
                    <h5><span class="badge bg-danger opacity-50">{{ $listed->status }}</span></h5>
                @endif
            </td>
            <td>Rp{{ $listed->price }}</td>
            <td>{{ $listed->weight }} kg</td>
            {{-- ditambahkan name karna untuk memanggil name dari table major yang sebabnya sudah ada belongsto --}}
            <td>{{ $listed->productcategories->name }}</td>
            <td><img src="/storage/{{ $listed->image }}" class="img-thumbnail" width="200px" height="200px"></td>
            <td>
                <a href="{{route('product.edit',['product'=>$listed->id]) }}" class="btn btn-warning">Edit</a>
                {{-- untuk hapus data di table --}}
                <form action="{{route('product.destroy',['product'=>$listed->id])}}" class="d-inline" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
        </tbody>
  </table>
  {{ $data->withQueryString()->links() }}
@endsection
