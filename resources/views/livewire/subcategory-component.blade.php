<header class="catmasthead" style="padding-top: 10rem; padding-bottom: calc(10rem - 4.5rem); background: url('{{ asset('assets/img/subcategory') }}/{{ $subcategory_featured }}');  background-position: center; background-repeat: no-repeat; background-attachment: scroll; background-size: cover;">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg- align-self-end">
                <h1 class="text-uppercase text-blue font-weight-bold">{{$subcategory_name}}</h1>
            </div>
            <div class="col-lg-7 align-self-baseline">
            </div>
        </div>
    </div>
</header>
<section class="bg-primary" id="page-card">
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/menu">MENU</a></li>
                        <li class="breadcrumb-item">  <div id="WikiTitle"></div></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$subcategory_name}}</li>
                        @section('meta_title'){{$subcategory_name}}@stop
                      </ol>
                    </nav>
                </div>
            </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-sm-6 pt-3 submenu-box subcat">
                <a class="portfolio-box" href="{{ route('product.details',['slug'=>$product->slug]) }}">
                    <img class="img-fluid" src="{{ asset('assets/img/products') }}/{{ $product->thurmbnail }}" alt="{{ $product->name }}" />
                    <div class="portfolio-box-caption">
                        <div class="project-name text-uppercase" style="border: chartreuse 2px sold">{{$product->name}}</div>
                        <h3 class="text-green-caption">{{-- $product->regular_price --}} <?php echo number_format((float)$product->regular_price, 0, ',', '');?></h3>
                        {{--<a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $product->id}},'{{ $product->name }}',{{ $product->regular_price}})">Add To Cart</a>  --}}
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-lg-12 col-sm-12 pt-3 wrap-pagination-info">

            </div>
        </div>
    </div>
</section>
