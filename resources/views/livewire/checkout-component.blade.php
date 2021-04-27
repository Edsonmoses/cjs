<div>
 <div class="container" style="padding:30px 0;">
    <form wire:submit.prevent="placeOrder">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="box-title">Billing Address</h3>
                </div>
            </div>
            <div class="card-body billing-address">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-12">
                                <input type="text"  wire:model="firstname" name="firstname" class="form-control input-md" value="" placeholder="First Name"/>
                                @error('firstname')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" name="lastname" class="form-control input-md" value="" placeholder="Last Name" wire:model="lastname"/>
                                @error('lastname')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email Address</label>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control input-md" placeholder="Email Address" wire:model="email"/>
                                @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile" class="col-md-4 control-label">Phone Number</label>
                            <div class="col-md-12">
                                <input type="number" name="mobile" class="form-control input-md" value="" placeholder="Phone Number" wire:model="mobile"/>
                                @error('mobile')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="add" class="col-md-4 control-label">Line1</label>
                            <div class="col-md-12">
                                <input type="text" name="add" class="form-control input-md" value="" placeholder="Home Number" wire:model="line1"/>
                                @error('line1')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="add" class="col-md-4 control-label">Line2</label>
                            <div class="col-md-12">
                                <input type="text" name="add" class="form-control input-md" value="" placeholder="Home Number" wire:model="line2"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Country</label>
                            <div class="col-md-12">
                                <input type="text" name="country" class="form-control input-md" value="" placeholder="Country" wire:model="country"/>
                                @error('country')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="zipcode" class="col-md-4 control-label">Postcode / ZIP</label>
                            <div class="col-md-12">
                                <input type="number" name="zipcode" class="form-control input-md" value="" placeholder="Postal code" wire:model="zipcode"/>
                                @error('zipcode')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="province" class="col-md-4 control-label">Province</label>
                            <div class="col-md-12">
                                <input type="text" name="province" class="form-control input-md" value="" placeholder="Province" wire:model="province"/>
                                @error('province')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">Town / City</label>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control input-md" value="" placeholder="City" wire:model="city"/>
                                @error('city')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group fill-wife">
                    <label class="container-inner">
                        <input type="checkbox" name="different-add" id="different-add" value="1" wire:model="ship_to_different"/>
                        <span class="checkmark"></span>
                        <span class="checkmark-dec">Ship to a different address?</span>
                    </label>
                </div>
            </div>
        </div>
        @if($ship_to_different)
            <div class="col-md-12">
                <div class="card-body shipping-address">
                    <h3 class="box-title">Shipping Address</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_firstname" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="s_firstname" class="form-control input-md" value="" placeholder="First Name" wire:model="s_firstname"/>
                                    @error('s_firstname')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_lastname" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="s_lastname" class="form-control input-md" value="" placeholder="Last Name" wire:model="s_lastname"/>
                                    @error('s_lastname')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_email" class="col-md-4 control-label">Email Address</label>
                                <div class="col-md-12">
                                    <input type="email" name="s_email" class="form-control input-md" placeholder="Email Address" wire:model="s_email"/>
                                    @error('s_email')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_mobile" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-12">
                                    <input type="number" name="s_mobile" class="form-control input-md" value="" placeholder="Phone Number" wire:model="s_mobile"/>
                                    @error('s_mobile')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add" class="col-md-4 control-label">Line1</label>
                                <div class="col-md-12">
                                    <input type="text" name="add" class="form-control input-md" value="" placeholder="Home Number" wire:model="s_line1"/>
                                    @error('s_line1')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="add" class="col-md-4 control-label">Line2</label>
                                <div class="col-md-12">
                                    <input type="text" name="add" class="form-control input-md" value="" placeholder="Home Number" wire:model="s_line2"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_country" class="col-md-4 control-label">Country</label>
                                <div class="col-md-12">
                                    <input type="text" name="s_country" class="form-control input-md" value="" placeholder="Country" wire:model="s_country"/>
                                    @error('s_country')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s_zipcode" class="col-md-4 control-label">Postcode / ZIP</label>
                                <div class="col-md-12">
                                    <input type="number" name="s_zipcode" class="form-control input-md" value="" placeholder="Postal code" wire:model="s_zipcode"/>
                                    @error('s_zipcode')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="province" class="col-md-4 control-label">Province</label>
                                <div class="col-md-12">
                                    <input type="text" name="s_province" class="form-control input-md" value="" placeholder="Province" wire:model="s_province"/>
                                    @error('s_province')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">Town / City</label>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control input-md" value="" placeholder="City" wire:model="s_city"/>
                                    @error('s_city')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="payment-method card-body">
        <h4 class="title-box">Payment Method</h4>
        @if($paymentmode == 'card')
        <div class="wrap-address-billing">
            @if(Session::has('stripe_error'))
                <div class="alert alert-danger" role="alert">{{ Session::get('stripe_error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <label for="card-no" class="col-md-4 control-label">Card Number:</label>
                    <input type="text" name="card-no" class="form-control input-md" value="" placeholder="Card Number" wire:model="card_no"/>
                    @error('card_no') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6">
                    <label for="exp-month" class="col-md-4 control-label">Expiry Month:</label>
                    <input type="text" name="exp-month" class="form-control input-md" value="" placeholder="MM" wire:model="exp_month"/>
                    @error('exp_month') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exp-year" class="col-md-4 control-label">Expiry Year:</label>
                    <input type="text" name="exp-year" class="form-control input-md" value="" placeholder="YYY" wire:model="exp_year"/>
                    @error('exp_year') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6">
                    <label for="cvc" class="col-md-4 control-label">CVC:</label>
                    <input type="password" name="cvc" class="form-control input-md" value="" placeholder="CVC" wire:model="cvc"/>
                    @error('cvc') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        @endif
        <div class="choose-payment-method">
            <table>
                <tr>
                    <td>
                        <label class="payment-method control-label">
                            <input name="payment-method" id="payment-method-cod" value="cod" type="radio" wire:model="paymentmode"/>
                            <span>Cash On Delivery</span><br/>
                            @if($paymentmode == 'cod')
                            <span>Order Now Pay on Delivery</span>
                            @endif
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="payment-method control-label">
                            <input name="payment-method" id="payment-method-card" value="card" type="radio" wire:model="paymentmode"/>
                            <span>Debit / Credit Card</span><br/>
                            @if($paymentmode == 'card')
                            <span>You can pay with your credit card</span>
                            @endif
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="payment-method control-label">
                            <input name="payment-method" id="payment-method-paypals" value="paypal" type="radio" wire:model="paymentmode"/>
                            <span>PayPal</span><br/>
                            @if($paymentmode == 'paypal')
                            <span>You can pay with your credit card if don't have a paypal account</span>
                            @endif
                        </label>
                    </td>
                </tr>

            </table>
            @error('paymentmode')<p class="text-danger">{{ $message }}</p>@enderror
        </div>
        @if(Session::has('checkout'))
            <p class="summary-info grand-total"><span>Grand Total</span><span class="grand-total-price">${{ Session::get('checkout')['total'] }}</span></p>
        @endif
        <button type="submit" class="btn btn-medium btn-green">Place order now</button>
    </div>
   </form>
  </div>
</div>

