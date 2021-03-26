<li class="nav-item cart-info  flex-middle">
    <a class="nav-link js-scroll-trigger" href="{{ route('product.cart') }}">
    <i class="fa fa-shopping-basket" aria-hidden="true" style="font-size: 32px;"></i>
     @if(Cart::instance('cart')->count() > 0)
      <span class="cart-total-no" id="cart_items">{{ Cart::instance('cart')->count() }}</span>
      @endif
    </a>
</li>
