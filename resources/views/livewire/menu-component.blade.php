<section class="bg-primary" id="page-card">
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <h2 class="text-blue mt-0">Welcome To CJ’s!!</h2>
            <p class="text-blue-2 mb-4">Welcome to Cafe Java's delicious universe. Everything from our Big on Breakfast, Perfected Drinks, Decadent to your Generous Big Meals Right here at your fingertips. ORDER NOW.</p>
        </div>
    </div>
    <div class="row">

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
