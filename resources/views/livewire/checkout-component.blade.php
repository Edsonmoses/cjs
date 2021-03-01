<section class="bg-primary" id="page-card">
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-blue mt-4" style="text-transform: capitalize;"></h2>
                <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW. </p>
            </div>
        </div>
        <div class="row">
            @foreach($subcategories as $category)
            <div class="col-lg-3 col-sm-6 pt-3 submenu-box">
                <a class="portfolio-box" href="{{ route('product.details',['subcategory_slug'=>$category->slug]) }}">
                    <img class="img-fluid" src="{{ asset('assets/img') }}/{{ $category->image }}" alt="{{ $category->name }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-name">{{$category->name}}</div>
                        <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $category->id}},'{{ $category->name }}')">Add To Cart</a>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-lg-12 col-sm-12 pt-3 wrap-pagination-info">
                    {{-- - --}}
            </div>
        </div>
    </div>
</section>
