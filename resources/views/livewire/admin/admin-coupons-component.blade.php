<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                All Coupons
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcoupon') }}" class="btn btn-success float-right">Add New</a>
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
                                    <th>Coupon Code</th>
                                    <th>Coupon Type</th>
                                    <th>Coupon Value</th>
                                    <th>Cart Value</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        @if($coupon->type == 'fixed')
                                            <td>$ {{ $coupon->value }}</td>
                                        @else
                                             <td>{{ $coupon->value }} %</td>
                                        @endif
                                        <td>{{ $coupon->cart_value }}</td>
                                        <td>{{ $coupon->expiry_date }}</td>
                                        <td>
                                            <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id]) }}"><i class="fa fa-edit fa-1x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this coupon') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-1x text-danger"></i></a>
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
