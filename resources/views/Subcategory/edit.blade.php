@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Subcategory</h2>
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

    <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="name" value="{{ $subcategory->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug:</strong>
                    <input type="text" name="slug" value="{{ $subcategory->slug }}" class="form-control" placeholder="Enter slug">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="Enter Image"  onchange="previewFile(this)">
                <img id="previewImg1" src="{{ asset('assets/img/subcategory') }}/{{ $subcategory->image }}" alt="product image" width="130" style="margin-top: 20px;"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Cover Image:</strong>
                <input type="file" name="featured" class="form-control" placeholder="Enter Image"  onchange="previewFile(this)">
                <img id="previewImg2" src="{{ asset('assets/img/subcategory') }}/{{ $subcategory->featured }}" alt="product image" width="130" style="margin-top: 20px;"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    {{-- <inputtype="text"name="category_id"class="form-control"value="$subcategory->category_id}}" placeholder="Enter Category">--}}
                    <select class="form-control" name="category_id">
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $subcategory->category_id) ? 'selected' : '' }}>
                                {{ $category->name }}
                               </option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('category_id'))
                        <div class='text text-danger'>
                            {{ $errors->first('category_id') }}
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
