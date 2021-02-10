@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Subcategory</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('subcategory.index') }}"> Back</a>
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

<form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
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
        <strong>Image:</strong>
        <input type="file" name="image" class="form-control" placeholder="Enter Image"  onchange="previewFile(this)">
        <img id="previewImg" src="{{ asset('assets/img/placeholder.jpg') }}" alt="product image" style="max-width: :130px; margin-top:20px;" width="130"/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Cover Image:</strong>
        <input type="file" name="featured" class="form-control" placeholder="Enter Cover Image" onchange="previewFile(this)">
        <img id="previewImgs" src="{{ asset('assets/img/placeholder.jpg') }}" alt="product image" style="max-width: :130px; margin-top:20px;" width="130"/>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
           <!-- <input type="text" name="category_id" class="form-control" placeholder="Enter Category">-->
               <select class="form-control" name="category_id" required>
                <option value="">Select a Category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
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
