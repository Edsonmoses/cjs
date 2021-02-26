<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CJ's - Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        @livewireStyles
    </head>
    <body id="page-top">
     <!-- Masthead-->
     {{$slot}}
    <!-- top-footer-->
    <section id="contact">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="mt-3 social-footer">
                        <a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-twitter-square" aria-hidden="true"></i></a>
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
                    <div id="TA_selfserveprop558" class="TA_selfserveprop" style="background:#a8b49e !important">
                        <ul id="YXrvZ6nXFiM" class="TA_links BR2vVE6h" style="background:#a8b49e !important">
                            <li id="btoVpSBLpqC" class="NaatAn" style="background:#a8b49e !important"><a style="background:#a8b49e !important" href="https://www.tripadvisor.com/" target="_blank" rel="noopener"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor" /></a></li>
                        </ul>
                        </div>
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
    @livewireScripts
</body>
</html>
