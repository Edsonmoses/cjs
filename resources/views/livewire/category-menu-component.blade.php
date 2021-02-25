<section class="bg-primary" id="page-card">
    <div class="container-fluid">
       <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                @section('meta_title'){{$category_name}}@stop
                <h2 class="text-blue mt-4" style="text-transform: capitalize;">{{$category_name}}</strong></h2>
                <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW. </p>
            </div>
        </div>
        <div class="row">
            @foreach($subcategory as $product)
            <div class="col-lg-3 col-sm-6 pt-3 submenu-box">
                <a class="portfolio-box" href="{{ route('product.subcategory',['subcategory_slug'=>$product->slug]) }}">
                    <img class="img-fluid" src="{{ asset('assets/img/subcategory') }}/{{ $product->image }}" alt="{{ $product->name }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-name text-center">{{$product->name}}</div>
                       {{-- <ahref="#"class="btnadd-to-cart"wire:click.prevent="store($product->id }},'{{ $product->name }}',{{ $product->regular_price}})">Add To Cart</a>--}}
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-lg-12 col-sm-12 pt-3 wrap-pagination-info">
                    {{ $subcategory->links( ) }}
            </div>
        </div>
    </div>
</section>
