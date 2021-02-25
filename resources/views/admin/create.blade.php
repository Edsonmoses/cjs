@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slug:</strong>
            <input type="text" name="slug" class="form-control" placeholder="Enter slug">
        </div>
    </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Enter Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            <input type="text" name="regular_price" class="form-control" placeholder="Enter Price">
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Image:</strong>
        <input type="file" name="image" class="form-control" placeholder="Enter Image" onchange="previewFile(this)">
        <img id="previewImg" src="{{ asset('assets/img/placeholder.jpg') }}" alt="product image" style="max-width: :130px; margin-top:20px;" width="130"/>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Add On:</strong>
                <input type="text" name="addItem" class="form-control" placeholder="Add On Item">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Add On Price:</strong>
                <input type="text" name="addPrice" class="form-control" placeholder="Add On Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            <select class="form-control" name="subcategory_id" required>
                <option value="">Select a Category</option>

                @foreach ($subcategories as $category)
                    <option value="{{ $category->id }}" {{ $category->id === old('subcategory_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection

