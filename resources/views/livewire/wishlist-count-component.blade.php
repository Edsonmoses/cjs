
<li class="nav-item cart-info  flex-middle">
    <a class="nav-link js-scroll-trigger" href="{{ route('product.wishlist') }}">
        @if(Cart::instance('wishlist')->count() > 0)
            <i class="fa fa-heart" aria-hidden="true" style="font-size: 32px;"></i>
            <span class="cart-total-no" id="cart_items">{{ Cart::instance('wishlist')->count() }}</span>
        @endif
    </a>
</li>

