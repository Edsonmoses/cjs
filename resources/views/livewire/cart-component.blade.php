<section class="bg-primary" id="page-card">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-lg-12 mb-6">
                <h2 class="text-blue mt-4">MY CART</h2>
            </div>
        </div>
        @if(Cart::instance('cart')->count() > 0)
        <div class="row">
            @if(Session::has('success_message'))
                <div class="col-lg-12 col-sm-12 alert alert-success">
                    <strong>Success</strong>{{ Session::get('success_message') }}
                </div>
            @endif
            <div class="col-lg-12 col-sm-12">
                <table class="table table-borderless">
            @if(Cart::instance('cart')->count()> 0)
            @foreach(Cart::instance('cart')->content() as $item)

                   <tr class="cart-item-row">
                       <td class="tdimg">
                           <a class="" href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
                            <figure class="product-det-thumb mt-5">
                               <img class="center-box" src="{{ asset('assets/img/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}" width="300" />
                            </figure>
                            </a>
                        </td>
                        <td>
                            <div class="order-row mt-5">
                                <label>ITEM :</label>
                                <strong>{{$item->model->name}}</strong>
                            </div>
                            <div style="clear: both"></div>
                            <div class="order-control d-flex">
                                <div class="order-total-count">
                                    <div class="product-code" id="itemCost">{{ $item->model->regular_price}}</div>
                                    <div class="d-flex flex-align-end flex-space-between">
                                        <a href="{{ route('product.details',['slug'=>$item->model->slug]) }}" class="view-det">VIEW DETAILS</a>
                                        <div class="d-flex">
                                            <div class="value-button decrease val" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</div>
                                            <input type="number" name="quantity" disabled="" class="number" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*">
                                            <div class="value-button increase val"  wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="remove-btn-wrap">
                                    <button wire:click.prevent="destroy('{{ $item->rowId }}')" type="button" class="btn btn-pink">REMOVE</button>
                                </div>
                            </div>
                        </td>
                       </tr>
            @endforeach
            @else
                <p class="text-blue-2 mb-4">No item in cart</p>
            @endif
                </table>
            </div>
        </div>
        <div class="cart-price-wrapper d-flex flex-end pb-10 mb-30">
            <div class="s8">
            <div class="table-responsive">
                <table class="table">
                    <tbody class="fs-18">

                        @if(Session::has('coupon'))
                        <tr>
                            <td>Discount ({{ Session::get('coupon') ['code']}}) <a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></td>
                            <td id="promo_amount"><strong>{{ number_format($discount) }}</strong></td>
                        </tr>
                        <tr>
                            <td>VAT ({{ config('cart.tax') }}%)</td>
                            <td id="vat_amount"><strong>{{ number_format($taxAfterDiscount)}}</strong></td>
                        </tr>
                        <tr>
                            <td>SUB TOTAL WITH DISCOUNT : </td>
                            <td id="subTotal"><strong>{{ number_format($subtotalAfterDiscount) }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong class="text-light-blue">TOTAL : </strong></td>
                            <td id="totalPrice"><strong class="text-light-blue">{{ number_format($totalAfterDiscount) }}</strong></td>
                        </tr>

                        @else
                        <tr>
                            <td>SUB TOTAL : </td>
                            <td id="subTotal"><strong>{{ Cart::subtotal() }}</strong></td>
                        </tr>
        <!--              <tr>
                            <td>DELIVERY FEE : </td>
                            <td><strong>0</strong></td>
                        </tr>-->
                    </tr>
                    <tr>
                        <td>VAT 16% : </td>
                        <td id="vat_amount"><strong>{{ Cart::tax() }}</strong></td>
                    </tr>
                    <tr>
                        <td><strong class="text-light-blue">TOTAL : </strong></td>
                        <td id="totalPrice"><strong class="text-light-blue">{{ Cart::total() }}</strong></td>
                    </tr>
                    @endif
                    <tr>
                        @if(!Session::has('coupon'))
                            <td class="coupon-wrapper">
                                <label class="container-inner">
                                    <input type="checkbox" name="have-code" id="have-code" value="1" wire:model="haveCouponCode">
                                    <span class="have-coupon">I have a coupon code</span>
                                    <span class="checkmark"></span>
                                </label>
                                @if($haveCouponCode == 1)
                                <div class="coupon-item">
                                    <form wire:submit.prevent="applyCouponCode">
                                        <h4 class="title-box">Coupon Code</h4>
                                        @if(Session::has('coupon_message'))
                                            <div class="alert alert-danger" role="danger">{{ Session::get('coupon_message') }}</div>
                                        @endif
                                        <div class="col-lg-12">
                                            <label>Enter your coupon code:</label>
                                            <input type="text" class="form-control" name="coupon-code" wire:model="couponCode"/><br/>
                                            <button type="submit" class="btn btn-small btn-green">Apply</button>
                                        </div>

                                    </form>
                                </div>
                                @endif
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
              </div>
              <div class="btn-inline mt-20" style="font-size:18px;">
                * Delivery charges will be applicable based on your chosen address
            </div>
            </div>
        </div>
        <div class="cart-price-wrapper border-bot-none d-flex flex-end  mb-20">
            <div class="s8 col">
                <div class="btn-inline">
                  <a href="/menu" class="btn btn-blue mb-20">ADD MORE ITEMS</a>
                  <a href="#" class="btn btn-green mb-20" wire:click.prevent="checkout">SIGNIN &amp; CHECKOUT</a>
                  <a href="#" class="btn btn-pink mb-20"  wire:click.prevent="destroyAll()">CLEAR SHOPPING CART</a>
                </div>
            </div>
        </div>
        @else
          <div class="text-center" style="padding: 30px 0;">
              <h1>Your cart is empty!</h1>
              <p>Add items to it now</p>
              <a href="/menu" class="btn btn-blue mb-20">Add Now</a>
          </div>
        @endif
    </div>
</section>
