@extends('layouts.layout')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CJ's - Product Dashboard</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
                <a class="btn btn-success" href="{{ route('subcategory.create') }}"> Create New Subcategory</a>
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td><img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $value->image }}" alt="" style="width:100px; height:100px; object-fit:cover;" /></td>
            <td>
                <form action="{{ route('products.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
