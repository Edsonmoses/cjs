<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('meta_title', 'CJs - Menu')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />

       <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        @livewireStyles
    </head>
    <body id="page-top">
    <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container">
                <a class="main-logo" href="/"> <img class="img-fluid" src="{{ asset('assets/img/cjs-sage-logo.svg') }}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                     <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a  href="/" class="nav-link js-scroll-trigger {{ request()->is('/') ? 'active' : '' }}">HOME</a></li>
                        <li class="nav-item"><a  href="/menu" class="nav-link js-scroll-trigger {{ request()->is('menu') ? 'active' : '' }}">MENU</a></li>
                        <li class="nav-item"><a  href="/featuredProduct" class="nav-link js-scroll-trigger {{ request()->is('featuredProduct') ? 'active' : '' }}">FEATURED PRODUCTS</a></li>
                        {{-- <liclass="nav-item"><ahref="/deal"class="nav-linkjs-scroll-triggerrequest()->is('deal')?'active':''}}">DEALS</a></li>--}}
						@if(Route::has('login'))
                            @auth
                                @if(Auth::user()->utype === 'ADM')
                                    <li class="nav-item dropdown"><a href="#" class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-circle" aria-hidden="true"></i>({{ Auth::user()->name }})</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="#" class="nav-link js-scroll-trigger">My Account ({{ Auth::user()->name }})</a></li>
                                            <li class="nav-item">
                                                <a title="Dashboard" href="{{route('admin.dashboard')}}" class="nav-link js-scroll-trigger">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a title="Categories" href="{{route('admin.categories')}}" class="nav-link js-scroll-trigger">Categories</a>
                                            </li>
                                            <li class="nav-item">
                                                <a title="Products" href="{{route('admin.products')}}" class="nav-link js-scroll-trigger">All Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a title="Manage Home Slider" href="{{route('admin.homeslider')}}" class="nav-link js-scroll-trigger">Manage Home Slider</a>
                                            </li>
                                            <li class="nav-item">
                                                <a title="Manage Home Categories" href="{{route('admin.homecategories')}}" class="nav-link js-scroll-trigger">Manage Home Categories</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link js-scroll-trigger">Login</a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else
                                <li class="nav-item dropdown"><a href="#" class="nav-link js-scroll-trigger dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user-circle" aria-hidden="true"></i>({{ Auth::user()->name }})</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="nav-link js-scroll-trigger">My Account ({{ Auth::user()->name }})</a></li>
                                        <li class="nav-item">
                                            <a href="{{route('user.dashboard')}}" class="nav-link js-scroll-trigger">Dashboard</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link js-scroll-trigger">Login</a>
                                        </li>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                @endif
                                @else
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
                                @endif
                        @endif
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">
                            <i class="fa fa-shopping-basket" aria-hidden="true" style="font-size: 32px;"></i>@if(Cart::count() > 0) <span class="index">{{ Cart::count() }} items in </span>@endif Cart</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- main-->
       {{$slot}}
    <!-- top-footer-->
    <section id="contact">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="mt-3 social-footer">
                        <a href="https://www.facebook.com/CJs254/"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/cjs254/?hl=en"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/cjs_254/status/1160817144558444544"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
                    </div>
                </div><!--social icon-->
                <div class="col-lg-12 col-md-12">
                <div class="mt-6 email-list">
                    <p class="text-muted mb-0">Join our email list</p>
                        <div class="content">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                        <form method="post" action="{{url('newsletter')}}">
                            @csrf
                            <div class="input-group">
                                <input type="text"  name="email" class="form-control" placeholder="Enter your email">
                                <span class="input-group-btn">
                                <input class="btn sub" type="submit" value="Subscribe"><!--<br class="unb">-->
                                <input class="btn unsub" type="submit" value="Unsubscribe">
                                </span>
                            </div>
                        </form>
                        </div>
                    <p class="text-muted mb-0">By clicking "SUBSCRIBE" I agree to receive news, promotions, information, and offers from CJ's.</p>
                    <p style="height:30px;"></p>
                </div>
            </div><!--email list-->
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5" id="contact-us">
        <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="mt-5 contact-footer">
                    <h3 class="h4 mb-2">CONTACT US</h3>
                    <ul>
                    <li><a href="mailto:info@cjs.co.ke?subject = Feedback&body = Message">info@cjs.co.ke</a></li>
                    <li class="coth2"><a href="#">Koinange Street</a></li>
                    <li><a href="tel:+254792000090">+254 792 000 090</a></li>
                    <li><a href="tel:+254795000090">+254 795 000 090</a></li>
                    <li class="coth2"><a href="#">Village Market</a></li>
                    <li><a href="tel:+254796000090">+254 796 000 090</a></li>
                    <li><a href="tel:+254 799000090">+254 799 000 090</a></li>
                    <li class="coth2"><a href="#">The Waterfront Mall, Karen</a></li>
                    <li><a href="tel:+254701000090">+254 701 000 090</a></li>
                    <li><a href="tel:+254702000090">+254 702 000 090</a></li>
                    </ul>
                </div>
            </div><!--CONTACT US-->
            <div class="col-lg-3 col-md-6">
            <div class="mt-5 location-footer">
                <h3 class="h4 mb-2">LOCATIONS</h3>
                <ul>
                  <li class="loch1"><a href="#">Nairobi</a></li>
                  <li><a href="#">Koinange Street</a></li>
                  <li><a href="#">Village Market</a></li>
                  <li><a href="#">The Waterfront Mall, Karen</a></li>
                </ul>
            </div>
        </div><!--LOCATIONS-->
            <div class="col-lg-3 col-md-6">
                <div class="mt-5 menu-footer">
                    <h3 class="h4 mb-2">OUR MENU</h3>
                    <ul>
                    <li><a href="{{ asset('product-category/big-on-breakfast') }}">BREAKFAST</a></li>
                    <li><a href="{{ asset('product-category/generous-big-meals') }}">MAINS</a></li>
                    <li><a href="{{ asset('product-category/perfected-drinks') }}">DRINKS</a></li>
                    <li><a href="{{ asset('product-category/decadent-desserts') }}">DESSERTS</a></li>
                    </ul>
                </div>
            </div><!--OUR MENU-->
            <div class="col-lg-3 col-md-6">
                <div class="mt-5 tripadvisor-footer">
                    <!--<div id="TA_selfserveprop558" class="TA_selfserveprop" style="background:#a8b49e !important">
                        <ul id="YXrvZ6nXFiM" class="TA_links BR2vVE6h" style="background:#a8b49e !important">
                            <li id="btoVpSBLpqC" class="NaatAn" style="background:#a8b49e !important"><a style="background:#a8b49e !important" href="https://www.tripadvisor.com/" target="_blank" rel="noopener"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor" /></a></li>
                        </ul>
                        </div>-->
                   <script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=558&amp;locationId=14008730&amp;lang=en_US&amp;rating=true&amp;nreviews=0&amp;writereviewlink=false&amp;popIdx=true&amp;iswide=false&amp;border=false&amp;display_version=2"></script>
                  </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="text-blue mt-5">We're commited to great food, great coffee, great service, an experience that will make your time with us fabulous. All visuals are serving suggestions only. Prices are quoted in Kenyan Shillings and inclusive of VAT.</p>
            </div>
            <div class="col-lg-12 col-md-12 footr-privacy">
                <ul>
                    <li><a href="/privacy" class="fl">Privacy Policy</a></li>
                    <li><a href="/terms">Terms of Use</a></li>
                    <li><a href="/career">Careers</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#feedbackModal">Feedback</a></li>

                </ul>
         </div>
        <div class="col-lg-12 col-md-12"><div class="small text-blue">&copy; 2021 Cafe Javas. All Rights Reserved</div></div>
        </div>
    </div>
    </footer>
    <!-- About Modal popup -->
    <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content about">
          <div class="modal-header">
            <h2 class="modal-title text-green" id="exampleModalLabel">ABOUT US</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body popup-max-hgt">
           <h4 class="text-h4 mb-10 mt-0">OUR BRANCHES</h4>
            <p class="text-blue-2">Welcome to CJ’s, a fully fledged restaurant specializing in delivering a relaxed and memorable dining experience. We’re currently in 12 locations; 3 in Nairobi, 8 in Kampala and 1 in Entebbe.</p>

            <p class="text-blue-2">Each location features a unique ambience with tasteful décor, specially designed for your comfort. To make you feel more at home, we’ve carefully selected a unique theme for each location.</p>

            <p class="text-blue-2">We have over 300 carefully selected, mouthwatering menu items. Whatever your taste, it’s well catered for. We value you. That’s why you’ll always be served with excellence by each member of our highly skilled team members.</p>

            <p class="text-blue-2">Eager to serve you, our experienced wait staff greet you at the door and lead you to the table of your choice in the well thought out seating arrangement. The rich aroma of freshly ground coffee is the handiwork of our skilled baristas, adept in latte art. This ensures you get a freshly prepared cup of coffee as the beans are roasted on site. To ensure you always enjoy a special dining experience, we constantly improve our signature world-class innovations.</p>

            <p class="text-blue-2">We’re growing and may soon open a location closer to you. We look forward to serving you,</p>

            <p class="text-blue-2">You’re more than welcome to Find us here.</p>

            <p class="text-blue-2"><em>CJ’s is part of Mandela Group of companies, the parent company to Cafe Javas, City Tyres, City Oil, City Lubes, City World, Savers, and Mandela Auto Spares.</em></p>
          </div>
        </div>
      </div>
    </div>
    <!-- feedback Modal popup -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content about">
          <div class="modal-header">
            <h2 class="modal-title text-green" id="exampleModalLabel">WE APPRECIATE YOUR FEEDBACK</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body popup-max-hgt">
            <p class="text-blue-2">We'd love to hear your feedback; good or bad. If we didn't make you feel special, we'd like to make it up to you. Please let us know what happened during your visit and we'll get in touch with you soon.</p>

            <p class="text-blue-2"><small>The information you provide us will be treated in the strictest confidence and may be used for improving our service delivery purposes. A copy of the completed form will be automatically sent to the email address supplied.</small></p>
            <form>
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Here">
              </div>
              <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Feedback Here"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @livewireScripts

    @stack('scripts');
    <script>
        window.on('productAdded',()=>{
            $('#addProductModal').model('hide');
        })

    </script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            //using jquery
            var href = jQuery(location).attr('href');
            var title = document.title;
            if (title === 'BREAKFAST COMBOS' || title === 'FRUITFUL MORNINGS' || title === 'DESIGNER OMELETTES'  || title === 'AMAZING MUFFINS'  || title === 'EXTRAS'  || title === 'PASTRIES'  || title === 'FLUFFY PANCAKES'  || title === 'WONDERFUL WAFFLES'  || title === 'KIDDIE BREAKFAST'){
                jQuery('#WikiTitle').html('<li class="breadcrumb-item"><a href="{{ asset("product-category/big-on-breakfast") }}">BIG ON BREAKFAST</a></li>');
            }else if (title === 'STARTERS AND APPETIZERS'  || title === 'BITS & BITES'  || title === 'SOULFUL SOUPS'  || title === 'SALADS'  || title === 'SANDWICHES'  || title === 'BURGERS'  || title === 'CHICKEN'  || title === 'FISH'  || title === 'BEEF'  || title === 'CURRIES'  || title === 'PASTA'  || title === 'PIZZA'  || title === 'MEX-FIX'  || title === 'KIDDIE MEALS'){
                jQuery('#WikiTitle').html('<li class="breadcrumb-item"><a href="{{ asset("product-category/generous-big-meals") }}">GENEROUS BIG MEALS</a></li>');
            }
            else if (title === 'COFFEE' || title === 'CAPPUCCINO'  || title === 'LATTE'  || title === 'ICED LATTE'  || title === 'MOCHA'  || title === 'ICED MOCHA'  || title === 'TEA'  || title === 'CHOCOLATE'  || title === 'DAWA TEAS'  || title === 'FAMOUS COLADAS'  || title === 'HANDCRAFTED LEMONADES'  || title === 'REFRESHING ICED TEAS'  || title === 'NOJITOS'  || title === 'SPECIALTY JUICES'  || title === 'FRUIT BOOSTERS'  || title === 'REAL-FRUIT SMOOTHIES'  || title === 'GOURMET MILKSHAKES'  || title === 'KIDDIE DRINKS'){
                jQuery('#WikiTitle').html('<li class="breadcrumb-item"><a href="{{ asset("product-category/perfected-drinks") }}">PERFECTED DRINKS');
            }
            else if (title === 'CAKE SLICES' || title === 'PREMIUM ICE CREAM' || title === 'A LA MODE' || title === 'SUNDAES' || title === 'FRUITFUL DELIGHT' || title === 'PASTRIES' || title === 'SPECIALTY CAKES' || title === 'CHEESE CAKES' || title === 'DATE TRUFFLES'){
                jQuery('#WikiTitle').html('<li class="breadcrumb-item"><a href="{{ asset("product-category/decadent-desserts") }}">DECADENT DESSERTS</a></li>');
            }


            //using plain javascript

        });
        </script>
</body>
</html>
