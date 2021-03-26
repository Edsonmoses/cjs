<section class="bg-primary" id="page-card">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="text-blue mt-0">Welcome To CJ’s!!</h2>
            <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW.</p>
        </div>
    </div>
    <div class="row">
  {{--<div class="widget mercado-widget filter-widget price-filter">
        <h2 class="widget-title">Price<span class="text-info">Ksh{{ $min_price }} - Ksh{{ $max_price }}</span></h2>
        <div class="widget-content" style="=padding:10px 5px 40px 5px;">
          <div id="slider" wire:ignore></div>
        </div>
    </div>--}}
        @foreach($categories as $category)
        <div class="col-lg-6 col-sm-6 pt-3 menu-box">
            <a class="portfolio-box" href="{{ route('product.categorymenu',['category_slug'=>$category->slug]) }}">
                <img class="img-fluid" src="{{ asset('assets/img/category')}}/{{ $category->image }}" alt="" />
                <div class="portfolio-box-caption">
                    <div class="project-name">{{ $category->name }}</div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
</section>
@push('scripts')
    <script>
        var slider = document.gatElementById('slider');
        noUiSlider.create(slider,{
            start : [1,1000],
            connect : true,
            range : {
                'min' : 1,
                'max' : 1000
            },
            pips : {
                mode : 'steps',
                stepped:true,
                density:4,
            }
        });
        slider.noUiSlider.on('update',function(value){
            @this.set('min_price',value[0]);
            @this.set('max_price',value[1]);
        });
    </script>
@endpush
