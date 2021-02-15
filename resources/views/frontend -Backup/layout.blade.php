
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Botola Club</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="{{-- URL::asset('frontend/css/montserrat.css') --}}"> -->
    <!-- CSS -->
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css') }}">
    <!-- Icon Font CSS
    ============================================ -->
  <!--   <link rel="stylesheet" href="{{-- URL::asset('frontend/css/material-design-iconic-font.min.css') --}}"> -->
    <!-- <link rel="stylesheet" href="{{-- URL::asset('frontend/css/font-awesome.min.css') --}}"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Plugins CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/plugins.css') }}">
    <!-- Style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/style.css') }}">
     <link rel="stylesheet" href="{{ URL::asset('frontend/prd-style.css') }}">
    <!-- Modernizer JS
    ============================================ -->
    <script src="{{ URL::asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


</head>

<body>
<!-- Body main wrapper start -->
<div class="wrapper fix">

<!-- Header Area Start -->
<div id="header-area" class="header-area section" >
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Logo -->
                <a class="logo float-left" href="index.html"><img src="{{ URL::asset('frontend/img/logo.png') }}" alt=""></a>
                <!-- Mini Cart -->
                <div class="mini-cart float-right">
                    <a href="cart.html"><i class="zmdi zmdi-shopping-basket"></i></a>
                </div>
                <!-- Menu -->
                <div id="main-menu" class="main-menu float-right">
                    <nav>
                        <ul>
                            <li class="active"><a href="{{url('/')}}">home</a></li>
                            <li><a href="about.html">about</a></li>
                            <li><a href="team.html">team</a></li>
                            <li><a href="{{url('/account/login')}}">Login</a></li>
                            <li><a href="{{url('/')}}#register">Register</a></li>
                            <li><a href="blog.html">blog</a>
                                <ul>
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.html">shop</a>
                                <ul>
                                    <li><a href="shop.html">shop</a></li>
                                    <li><a href="product-details.html">product details</a></li>
                                    <li><a href="cart.html">cart</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                    <li><a href="checkout.html">checkout</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!---- Mobile Menu ---->
                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
</div>
<!-- Header Area End -->



@yield('content')






<!-- Footer Top Area Start -->
<div class="footer-top-area section pb-70 pt-100">
   <div class="footer-top-left-bg overlay"></div>
    <div class="container">
        <div class="row">
            <!-- Footer About -->
            <div class="col-md-5 col-xs-12 mb-30">
                <div class="footer-about">
                    <img src="{{ URL::asset('frontend/img/logo.png')}}" alt="">
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proiden</p>
                    <div class="social fix">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <!-- Footer Twitter -->
            <div class="col-md-4 col-sm-6 col-xs-12 mb-30">
                <div class="twitter-widget">
                    <h3 class="title">Latest Tweets</h3>
                    <div class="single-twite">
                        <p>Duis aute irure <a href="#">@dolor</a> in rderiin voluptate velit esse cillum dolore eu ft nulla pariatur. Excepteur <a href="#">@sint</a> occaecat..</p>
                        <span>30 minutes ago</span>
                    </div>
                    <div class="single-twite">
                        <p>Duis aute irure <a href="#">@dolor</a> in rderiin voluptate velit esse cillum dolore eu ft </p>
                        <span>15 minutes ago</span>
                    </div>
                </div>
            </div>
            <!-- Footer Subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-12 mb-30">
                <div class="subscribe-widget">
                    <h3 class="title">Newsletters</h3>
                    <div class="subscribe-form">
                        <form action="#">
                            <input type="text" placeholder="your email address">
                            <button class="submit"><i class="zmdi zmdi-mail-send"></i></button>
                        </form>
                    </div>
                    <p><span>email:</span> sport@email.com</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Footer Top Area End -->

<!-- Footer Bottom Area Start -->
<div class="footer-bottom-area section">
    <div class="container">
        <div class="row">
           
            <!-- Copyright -->
            <div class="copyright text-left col-sm-6 col-xs-12">
                <p>Copyright &copy; <span>Botola Club</span>. 2018.All right reserved</p>
            </div>
            
        </div>
    </div>
</div>
<!-- Footer Bottom Area End -->


</div>
<!-- Body main wrapper end -->



<!-- JS -->

<!-- jQuery JS
============================================ -->
<script src="{{ URL::asset('frontend/js/vendor/jquery-1.12.0.min.js') }}"></script>
<!-- Bootstrap JS
============================================ -->
<script src="{{ URL::asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Plugins JS
============================================ -->
<script src="{{ URL::asset('frontend/js/plugins.js') }}"></script>
<!-- Ajax Mail JS
============================================ -->
<script src="{{ URL::asset('frontend/js/ajax-mail.js') }}"></script>
<!-- Main JS
============================================ -->
<script src="{{ URL::asset('frontend/js/main.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ URL::asset('frontend/js/app.js') }}"></script>

<script type="text/javascript">

         $(document).ready(function(){
              
              $("#username-dasdasdsa").change(function(){
                  //console.log($(this).val());
                  $.ajax({
                      url:"{{url('/jsonValidator')}}?username="+$(this).val(),
                      type: "GET",
                      success: function(data) {
                                  
                                //  var obj = JSON.parse(data);
                                // $('.id_values').val(obj.id);
                                // $('#field_values').val(obj.value);

                                // $('.loading').hide();
                                // $('#edit-val').modal('open');
                               }
                      });
               });
         });

</script>
</body>

</html>