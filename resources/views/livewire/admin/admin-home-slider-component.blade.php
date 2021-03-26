<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addhomeslider') }}" class="btn btn-success float-right">Add New Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                           <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                       @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <td>Title</td>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td><img src="{{ asset('assets/img/sliders') }}/{{ $slider->image }}" width="120"/></td>
                                        <td>{{ $slider->link }}</td>
                                        <td>{{ $slider->status == 1 ? 'Active':'Inactive' }}</td>
                                        <td>{{ $slider->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.edithomeslider',['slide_id'=>$slider->id]) }}"><i class="fa fa-edit fa-1x text-info"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this home slider') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{ $slider->id }})" style="margin-left: 10px;"><i class="fa fa-times fa-1x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
