<section class="bg-primary" id="page-card">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">MENU</a></li>
                        <li class="breadcrumb-item"><a href="#">GENEROUS BIG MEALS</a></li>
                        <li class="breadcrumb-item"><a href="#">BITS</a></li>
                        <li class="breadcrumb-item active" aria-current="page">SAMOSAS</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pt-3 submenu-boxs">
                    <a class="portfolio-box" href="category.html">
                        <img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $product->image }}" alt="" />
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 p-3 submenu-box">
                   <h2 class="text-blue mt-0 text-uppercase">{{ $product->name }}</h2>
                   <p class="text-muted mb-4">{{ $product->description }}</p>
                   <h3 class="text-green-caption mt-0">{{ $product->regular_price }}</h3>
                   <p class="text-muted mb-4">{{ $product->stock_status }}</p>
                </div>
            </div>
            <!--popular_products-->
            {{--<div class="row">

                @foreach($popular_products as $p_product)
            <div class="col-lg-3 col-sm-6 pt-3 submenu-box">
                <a class="portfolio-box" href="{{ route('product.details',['slug'=>$p_product->slug]) }}">
                    <img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $p_product->image }}" alt="{{ $p_product->name }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-name">{{$p_product->name}}</div>
                        <h3 class="text-green-caption mt-0">{{ $p_product->regular_price }}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>--}}
        <!--related_products-->
        {{--<div class="row">

        @foreach($related_products as $r_product)
        <div class="col-lg-3 col-sm-6 pt-3 submenu-box">
            <a class="portfolio-box" href="{{ route('product.details',['slug'=>$r_product->slug]) }}">
                <img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $r_product->image }}" alt="{{ $r_product->name }}" />
                <div class="portfolio-box-caption">
                    <div class="project-name">{{$r_product->name}}</div>
                    <h3 class="text-green-caption mt-0">{{ $r_product->regular_price }}</h3>
                </div>
            </a>
        </div>
        @endforeach
        </div>--}}
    </div>
    </section>
