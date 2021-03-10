
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($sliders as $slide)
            <header class="masthead carousel-item {{ $loop->first ? ' active' : '' }}" style="padding-top: 10rem; padding-bottom: calc(10rem - 4.5rem); background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%), url('{{ asset('assets/img/sliders') }}/{{ $slide->image }}');  background-position: top center; background-repeat: no-repeat; background-attachment: scroll; background-size: cover;">

            </header>
        @endforeach
          <div class="main-sidebar hidden-xs">
            <div class="container-fluid h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 col-md-8 align-self-baseline d-none d-sm-block">
                        <!--<p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>-->
                    </div>
                    <div class="col-lg-4 col-md-6 align-self-end">
                        <nav id="sidebar-h">
                            <div class="pt-5">
                                <a href="#" class="img logo" style="background-image: url(./assets/img/logo-white.png);"></a>
                                <ul class="list-unstyled components mb-5">
                                  <li class="active">
                                    <a href="/menu"><img src="{{ asset('assets/img/menuIcons/menu.png')}}" alt="Second slide">Menu</a>
                                  </li>
                                  <li>
                                      <a href="#contact-us"><img src="{{ asset('assets/img/menuIcons/locations.png')}}" alt="Second slide">Locations</a>
                                  </li>
                                  <li>
                                      <a href="/career"><img src="{{ asset('assets/img/menuIcons/blog.png')}}" alt="Second slide">Careers</a>
                                  </li>
                                  <li>
                                      <a href="#" data-toggle="modal" data-target="#feedbackModal"><img src="{{ asset('assets/img/menuIcons/menu.png')}}" alt="Second slide">Feedback</a>
                                  </li>
                                  <li>
                                      <a href="#" data-toggle="modal" data-target="#aboutModal"><img src="{{ asset('assets/img/menuIcons/about-us.png')}}" alt="Second slide">About Us</a>
                                  </li>
                                </ul>

                          </div>
                        </nav>
                    </div>
                </div>
            </div>
         </div>
    <!--main-sidebar end here-->
    </div>
</div>
<!-- About-->
<section class="bg-primary" id="page-card">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 pt-3">
                <a class="portfolio-box" href="#">
                    <img class="img-fluid" src="{{asset('assets/img/gift-card-home.jpg')}}" alt="" />
                </a>
            </div>
            <div class="col-lg-6 col-sm-6 p-3">
                <a class="portfolio-box" href="#">
                    <img class="img-fluid" src="{{asset('assets/img/home-page-superfoods-brand-new.jpg')}}" alt="" />
                </a>
            </div>
        </div>
    </div>
</section>
