
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


<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.botolaclub.com/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

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
                <a class="logo float-left" href="{{url('/')}}"><img src="{{ URL::asset('frontend/img/logo.png') }}" alt=""></a>
                <!-- Menu -->
                <div id="main-menu" class="main-menu float-right">
                    <nav>
                        <ul>
                            <li style="float: right;" {{{ (Request::is('/') ? 'class=active' : '') }}}><a  href="{{url('/')}}" class="arabic-rtl">@lang('app.home_label') </a></li>
                            <li style="float: right;" {{{ (Request::is('account/login') ? 'class=active' : '') }}} ><a href="{{url('/account/login')}}" class="arabic-rtl">@lang('app.login_label')</a></li>
                            <li style="float: right;"><a href="{{url('/')}}#register" class="arabic-rtl">@lang('app.register_label')</a></li>
                            <li style="float: right;"><a href="#" class="arabic-rtl">@lang('app.about_label')</a></li>
                            <li style="float: right;"><a href="{{url('/contact')}}" class="arabic-rtl">@lang('app.contact_label')</a></li>
                            <!-- <li><a href="{{url('/lang/en')}}">EN</a></li> -->
                            <!-- <li><a href="{{url('/lang/fr')}}">FR</a></li> -->
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
                    <p>Think you know all there is to know about Botola 2018-2019? Prove it with Botola Club. We coming soon run prediction competitions for many of football's top competitions.</p>
                    <div class="social fix">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <!-- <a href="#"><i class="fa fa-pinterest"></i></a> -->
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <!-- Footer Twitter -->
           <!--  <div class="col-md-4 col-sm-6 col-xs-12 mb-30">
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
            </div> -->
            <div class="col-md-4 col-sm-6 col-xs-12 mb-30">
                <div class="twitter-widget">
                    <h3 class="title">Privacy Policy</h3>
                    <div class="single-twite">
                        <p>If you require any more information or have any questions about our privacy policy, please feel free to contact us.
At www.botolaclub.com, the privacy of our visitors is of extreme importance to us.  </p>
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
                    <p><span>email:</span> contact@botolaclub.com</p>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>

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



              // for games on index page 

               jQuery('.btn-input').each(function() {

                 // console.log($(this).parents(".btn-input").find(".input-number-prd").val());
                 var upa=$(this).find(".fa-chevron-up");
                 var dow=$(this).find(".fa-chevron-down");
                 var inputSelector=$(this).find(".input-number-prd");
                 
                 upa.click(function() {
                    var oldVal=0;
                    var newVal=0;
                    
                    if (inputSelector.val()=="") {
                        oldVal=-1;
                    }else{
                        oldVal=parseFloat(inputSelector.val());
                    }
                    if (oldVal<20) {

                       newVal=oldVal+1;
                    }
                    
                    inputSelector.val(newVal);
                    
                 });
                 dow.click(function() {

                   var oldVal=0;
                   var newVal=0;
                    
                    if (inputSelector.val()=="") {
                        oldVal=0;
                    }else{
                        oldVal=parseFloat(inputSelector.val());
                    }
                    if (oldVal>0 && oldVal<20) {

                       newVal=oldVal-1;
                    }
                    inputSelector.val(newVal);
                 });
                



             });




               //Time handel  start
 //$.toaster({ priority : 'success', title : 'Timezone', message : moment.tz.guess()});
 var time_zone = moment.tz.guess();
 var time_now  = moment().tz(time_zone).format("HH:mm");
 // $.toaster({ priority : 'success', title : 'Now', message : time_now});

// var tt= moment.tz("2013-11-18 11:35", time_zone);


// var a    = moment("2018-06-15 12:00:00").tz("Europe/Berlin").format("HH:mm"); //work fine 
//part Converting to Zone in https://momentjs.com/timezone/docs/#/using-timezones/parsing-in-zone/

var a    = moment.tz("2018-06-15 12:00:00", "UTC").tz(time_zone).format("HH:mm");
 console.log(a); // alert(a);
// $('.time-match').text(moment($('.time-match').text()).tz(time_zone).format("HH:mm"));

$('.time-match').each(function(){
         var user_time= moment.tz($(this).text(), "UTC").tz(time_zone).format("HH:mm");
        $(this).text(user_time);
    });
// document.write(moment.tz.names());


$('.datum-match').each(function(){
         var datum_match= moment($(this).text()).format('MM-DD-YYYY');
        $(this).text(datum_match);
    });

//Time handel  end





         });

</script>
</body>

</html>