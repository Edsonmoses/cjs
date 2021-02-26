<section class="bg-primary" id="page-card">
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/menu">MENU</a></li>
                        @foreach($subcategories as $subcategory)

                            @if ($product->subcategory_id === 1 || $product->subcategory_id === 2 || $product->subcategory_id === 3 || $product->subcategory_id === 4 || $product->subcategory_id === 5 || $product->subcategory_id === 6 || $product->subcategory_id === 7 || $product->subcategory_id === 8 || $product->subcategory_id === 51)
                            @if ($loop->first)
                            <li class="breadcrumb-item"><a href="{{ asset('product-category/big-on-breakfast') }}">BIG ON BREAKFAST</a></li>
                            @endif
                            @elseif ($product->subcategory_id=== 19 || $product->subcategory_id === 20  || $product->subcategory_id === 21  || $product->subcategory_id === 22  || $product->subcategory_id === 23  || $product->subcategory_id === 24  || $product->subcategory_id === 25  || $product->subcategory_id === 26  || $product->subcategory_id === 27  || $product->subcategory_id === 28  || $product->subcategory_id === 29  || $product->subcategory_id === 30  || $product->subcategory_id === 31  || $product->subcategory_id === 32)
                                  @if ($loop->first)
                                    <li class="breadcrumb-item"><a href="{{ asset('product-category/generous-big-meals') }}">GENEROUS BIG MEALS</a></li>
                                    @endif
                            @elseif ($product->subcategory_id === 33 || $product->subcategory_id === 34 || $product->subcategory_id === 35 || $product->subcategory_id === 36 || $product->subcategory_id === 37 || $product->subcategory_id === 38 || $product->subcategory_id === 39 || $product->subcategory_id === 40 || $product->subcategory_id === 41 || $product->subcategory_id === 42 || $product->subcategory_id === 43 || $product->subcategory_id === 44 || $product->subcategory_id === 45 || $product->subcategory_id === 46 || $product->subcategory_id === 47 || $product->subcategory_id === 48 || $product->subcategory_id === 49 || $product->subcategory_id === 50)
                            @if ($loop->first)
                                    <li class="breadcrumb-item"><a href="{{ asset('product-category/perfected-drinks') }}">PERFECTED DRINKS</a></li>
                                @endif
                            @elseif ($product->subcategory_id === 9 || $product->subcategory_id === 10 || $product->subcategory_id === 11 || $product->subcategory_id === 12 || $product->subcategory_id === 13 || $product->subcategory_id === 14 || $product->subcategory_id === 15 || $product->subcategory_id === 16 || $product->subcategory_id === 17 || $product->subcategory_id === 18)
                            @if ($loop->first)
                                <li class="breadcrumb-item text-uppercase"><a href="{{ asset('product-category/decadent-desserts') }}">DECADENT DESSERTS</a></li>
                                @endif
                            @else
                            @if ($loop->first)
                                I don't have any category!
                                @endif
                            @endif
                            @endforeach
                        @foreach($subcategories as $subcategory)
                          @if ($subcategory->id === $product->subcategory_id)
                             <li class="breadcrumb-item text-uppercase"><a href="{{ asset('product-subcategory') }}/{{$subcategory->slug}}">{{$subcategory->name}}</a></li>
                          @endif
                        @endforeach
                        <li class="breadcrumb-item active text-uppercase" aria-current="page" style="">{{$product->name}}</li>
                        @section('meta_title'){{$product->name}}@stop
                      </ol>
                    </nav>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pt-3 submenu-boxs">
                    <a class="portfolio-box">
                        <img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $product->image }}" alt="" />
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6 p-3 submenu-box" style="margin-bottom: 150px !important;">
                   <h2 class="text-blue mt-0 text-uppercase">{{ $product->name }}</h2>
                   <p class="text-muted mb-4">{{ $product->description }}</p>
                   <h3 class="text-green-caption-m mt-0">{{-- $product->regular_price --}}<?php echo number_format((float)$product->regular_price, 0, ',', '');?></h3>
                   <p class="text-muted mb-4">{{ $product->stock_status }}</p>
                   <h4 class="text-blue mt-0 text-uppercase" style="font-weight: bold; font-size: 18px;">Additional Items</h4>
                   {{--<table class="table table-borderless">
                       <tr>
                           <td colspan="2">{{ $product->addItem }}</td>
                           {{-- <td>+$product->addPrice }}</td>
                       </tr>
                   </table>--}}
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
