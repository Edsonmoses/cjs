@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" placeholder="Enter slug">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="regular_price" class="form-control" value="{{ $product->regular_price }}" placeholder="Enter Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Thurmbnail:</strong>
                 <input type="file" name="thurmbnail" class="form-control" placeholder="Enter Thurmbnail"value="{{ $product->thurmbnail }}" onchange="previewFile(this)">
                <img id="previewImg" src="{{ asset('assets/img/products') }}/{{ $product->thurmbnail }}" alt="product image" width="130" style="margin-top: 20px;"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Image:</strong>
                 <input type="file" name="image" class="form-control" placeholder="Enter Image" value="{{ $product->image }}" onchange="previewFile(this)">
                <img id="previewImg" src="{{ asset('assets/img/products') }}/{{ $product->image }}" alt="product image" width="130" style="margin-top: 20px;"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Add On:</strong>
                    <textarea class="form-control" style="height:150px" name="addItem" placeholder="Add On Item">{{ $product->addItem}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select class="form-control" name="subcategory_id">
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('subcategory_id', $product->subcategory_id) ? 'selected' : '' }}>
                             {{ $category->name }}
                            </option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('category_id'))
                        <div class='text text-danger'>
                            {{ $errors->first('subcategory_id') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
