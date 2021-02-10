<section class="bg-primary" id="page-card">
    <div class="container-fluid">
       <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-blue mt-4">GENEROUS BIG MEALS</h2>
                <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW. </p>
            </div>
        </div>

        <div class="row">
            @if(Session::has('success_message'))
                <div class="col-lg-12 col-sm-12 pt-3 alert alert-success">
                    <strong>Success</strong>{{ Session::get('success_message') }}
                </div>
            @endif
            @if(Cart::count()> 0)
            @foreach(Cart::content() as $item)
            <div class="col-lg-2 col-sm-2 pt-3 submenu-box">
                <a class="portfolio-box" href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
                    <img class="img-fluid" src="{{ asset('assets/img') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}" />
                </a>
            </div>
            <div class="col-lg-3 col-sm-3 pt-3 submenu-box">
                <a class="portfolio-box" href="{{ route('product.details',['slug'=>$item->model->slug]) }}">
                    <div class="portfolio-box-caption">
                        <div class="project-name">{{$item->model->name}}</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-sm-2 pt-3 submenu-box">
                    <div class="portfolio-box-caption">
                        <p class="price">{{ $item->model->regular_price}}</p>
                    </div>
            </div>
            <div class="col-lg-3 col-sm-3 pt-3 submenu-box">
                    <div class="portfolio-box-caption">
                        <input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*">
                        <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">+</a>
                        <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">-</a>
                    </div>
            </div>
            <div class="col-lg-1 col-sm-1 pt-3 submenu-box">
                <div class="portfolio-box-caption">
                    <p class="price"><b class="index">{{ $item->subtotal }}</b></p>
                </div>
        </div>
            <div class="col-lg-1 col-sm-1 pt-3 submenu-box">
                    <div class="portfolio-box-caption">
                        <a class="btn btn-increase" href="#" wire:click.prevent="destroy('{{ $item->rowId }}')">x</a>
                    </div>
            </div>
            @endforeach
            @else
                <p class="text-blue-2 mb-4">No item in cart</p>
            @endif
            <div class="col-lg-12 col-sm-12 pt-3 summary">
                <div class="order-summary">
                    <h4 class="text-blue-2title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ Cart::subtotal() }}</b></p>
                    <p class="summary-info"><span class="title">Tax</span><b class="index">{{ Cart::tax() }}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info"><span class="title">Total</span><b class="index">{{ Cart::total() }}</b></p>
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="#">Update Shopping Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
