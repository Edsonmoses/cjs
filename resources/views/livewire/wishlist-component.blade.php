<section class="bg-primary" id="page-card">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/menu">MENU</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAVOURITE</li>
                      </ol>
                    </nav>
                </div>
            </div>
        <div class="row">
            @if(Cart::instance('wishlist')->content()->count() > 0)
            @foreach(Cart::instance('wishlist')->content() as $item)
            <div class="col-lg-3 col-sm-6 pt-3 submenu-box subcat">
                <a class="portfolio-box" href="{{ route('product.details',['slug'=>$item->model->slug]) }}" title="{{ $item->model->name }}">
                    <img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $item->model->thurmbnail }}" alt="{{ $item->model->name }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-name text-uppercase">{{$item->model->name}}</div>
                        <h3 class="text-green-caption">{{-- $item->model->regular_price --}} <?php echo number_format((float)$item->model->regular_price, 0, ',', '');?> </h3>
                        <a href="#" class="btn add-to-cart btn-green" wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowId}}')">MOVE TO CART</a>
                        <a href="#" style="margin-top:10px;" class="btn add-to-favourite btn-blue" wire:click.prevent="removeFromWishlist({{$item->model->id }})">ADD TO FAVOURITE</a>
                    </div>
                </a>
            </div>
            @endforeach
            @else
                <h4>No item in Favourite</h4>
            @endif
        </div>
    </div>
</section>
