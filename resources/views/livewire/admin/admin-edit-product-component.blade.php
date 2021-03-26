<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Product
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-success float-right">All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug"/>
                                    @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-6" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Add On</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="addItem">
                                        <option value="0">Off</option>
                                        <option value="1">On</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price"/>
                                    @error('regular_price')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="SKU" class="form-control input-md"/>
                                    @error('sku')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-6">
                                    <select class="form-control">
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured</label>
                                <div class="col-md-6">
                                    <select class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Thurmbnail</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control input-file" wire:model="newthurmbnail"/>
                                    @if($newthurmbnail)
                                        <img src="{{ $newthurmbnail->temporaryUrl() }}" width="120"/>
                                    @else
                                        <img src="{{ asset('assets/img/products') }}/{{ $thurmbnail }}" width="120"/>
                                    @endif
                                    @error('newthurmbnail')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control input-file" wire:model="newimage"/>
                                    @if($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                                    @else
                                        <img src="{{ asset('assets/img/products') }}/{{ $image }}" width="120"/>
                                    @endif
                                    @error('newimage')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="subcategory_id">
                                        <option value="">Select Category</option>
                                        @foreach($subcategories as $category)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
       $(function(){
           tinymce.init({
               selector:'#description',
               setup:function(editor){
                   editor.on('Change',function(e){
                       tinyMCE.triggerSave();
                       var d_data = $('#description').val();
                       @this.set('description',d_data);
                   });
               }
           });
        });
    </script>
@endpush
