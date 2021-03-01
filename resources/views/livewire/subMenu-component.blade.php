<section class="bg-primary" id="page-card">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-blue mt-4" style="text-transform: capitalize;">{{ $category_name }}</h2>
                <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW. </p>
                <select name="orderby" class="use-chosen" wire:model="sorting">
                    <option value="default" selected="selected">Default sorting</option>
                    <option value="date">Sort by namess</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
                <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                    <option value="12" selected="selected">12 per page</option>
                    <option value="16">16 per page</option>
                    <option value="18">18 per page</option>
                    <option value="21">21 per page</option>
                    <option value="24">24 per page</option>
                    <option value="30">30 per page</option>
                    <option value="32">32 per page</option>
                </select>
                <ul>
                    @foreach($categories as $category)
                      <li> <a href="{{ route('product.categorymenu',['category_slug'=>$category->slug]) }}" class="cate-link">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-sm-6 pt-3 submenu-box">
                <a class="portfolio-box" href="{{ route('product.details',['slug'=>$product->slug]) }}">
                    <img class="img-fluid" src="{{ asset('assets/img') }}/{{ $product->image }}" alt="{{ $product->name }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-name">{{$product->name}}</div>
                        <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->regular_price}})">Add To Cart</a>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-lg-12 col-sm-12 pt-3 wrap-pagination-info">
                    {{ $products->links( ) }}
            </div>
        </div>
    </div>
</section>
