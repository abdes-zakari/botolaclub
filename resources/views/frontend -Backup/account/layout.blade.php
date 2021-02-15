
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('pageTitle') - Predict Club</title> 
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Fonts -->
      <!-- <link rel="stylesheet" href="{{-- URL::asset('frontend/css/montserrat.css') --}}"> -->    <!-- CSS -->
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

<body >
<!-- Body main wrapper start -->
<div class="wrapper fix">

<!-- Header Area Start -->
<div id="header-area" class="header-area section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Logo --> 
                <a class="logo float-left" href="index.html"><img src="{{ URL::asset('frontend/img/logo.png')}}" alt=""></a>
                <!-- Mini Cart -->
                <div class="mini-cart float-right">
                    <a href="#"><i class="zmdi zmdi-shopping-basket"></i></a>
                </div>
                <!---- Menu ---->
                <div id="main-menu" class="main-menu float-right">
                    <nav>
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li><a href="about.html">about</a></li>
                            <li><a href="team.html">team</a></li>
                            <li><a href="{{url('/account/game')}}">fixtures</a></li>
                            <li><a href="{{url('/account/standing')}}">Standing</a></li>
                            <li><a href="{{url('/account/logout')}}">Logout</a>
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
                            <li class="active"><a href="contact.html">contact</a></li>
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

<!-- Page Banner Area Start -->

<div id="page-banner-area" class="page-banner-area section">
    <div class="slide-pattern"></div>
    <div class="container">
        <div class="row">
            <div class="page-banner-title text-center col-xs-8 col-xs-offset-2"  style="border:0px solid blue">
                <div class="user-data">
                    <div class="row pic-profile-row">
                        <div class="col-xs-12"  style="border:0px solid green">
                            <!-- <div>Photo-Profile</div> -->
                            @if ($user->user_avatar)
                            <img src="{{ URL::asset('frontend/img/avatars/')}}/{{ $user->user_avatar}}" alt="Avatar" style="width:130px" class="img-thumbnail img-circle">
                            @else
                            <img src="http://ktva.images.worldnow.com/images/16098319_G.png" alt="Avatar" style="width:130px" class="img-thumbnail img-circle">
                            @endif
                        </div>
                    </div>
                    <div class="row data-profile-row">
                        <div class="col-xs-12"  style="border:0px solid green">
                            <br>
                            <div class="row">
                                <div class="col-xs-12 user-data-name"  style="border:0px solid green">{{ $user->username}} {{ $user->id}}</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"  style="border:0px solid green">
                                    <a href="#">Edit profile <span class="fa fa-pencil-square-o"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="page-banner-title text-center col-xs-6"  style="border:0px solid red">
                <h2>@yield('pageTitle')</h2>
            </div> -->
        </div>
    </div>
</div>
<!-- Page Banner Area End -->

<!-- {{ $user }} -->

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
                    <p><span>Phone:</span> +98 996 554 658</p>
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
                <p>Copyright &copy; <span>Supar Sport</span>. 2016.All right reserved</p>
            </div>
            <!-- Author Credit -->
            <div class="author-credit text-right col-sm-6 col-xs-12">
                <p>Created by <a href="https://hastech.company/">Hastech</a> With <i class="fa fa-heart-o"></i></p>
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

<!-- Main JS
============================================ -->
<script src="{{ URL::asset('frontend/js/main.js') }}"></script>

<script src="{{ URL::asset('frontend/js/jquery.toaster.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>


    <script type="text/javascript">

         $(document).ready(function(){


 // $.toaster({ priority : 'success', title : 'pop', message : 'Salu les gens'});
             // $(".chevron-btn").click(function(){
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

    $(".next-click").click(function(){
         
        var date_now=$(".current_date").val();
         
        $.ajax({
                url:"{{url('/account/game/next')}}",
                type: "GET",
                data:'date_now='+date_now,
                success: function(data) {
                    var obj = JSON.parse(JSON.stringify(data));
                    if (obj.status==true) {
                               
                            // Materialize.toast(obj.msg, 500,'toast-success')
                             console.log(obj.day);
                             console.log(obj.month);
                             console.log(obj.year);
                             var data='y='+obj.year+'&m='+obj.month+'&d='+obj.day;
                             window.location="{{url('/account/game')}}?"+data;
                    }   
                }
        });
    });

    $(".prev-click").click(function(){
         
        var date_now=$(".current_date").val();
         
        $.ajax({
                url:"{{url('/account/game/prev')}}",
                type: "GET",
                data:'date_now='+date_now,
                success: function(data) {
                    var obj = JSON.parse(JSON.stringify(data));
                    if (obj.status==true) {
                               
                            // Materialize.toast(obj.msg, 500,'toast-success')
                             console.log(obj.day);
                             console.log(obj.month);
                             console.log(obj.year);
                             var data='y='+obj.year+'&m='+obj.month+'&d='+obj.day;
                             window.location="{{url('/account/game')}}?"+data;
                    }   
                }
        });
    });

    // $("#js-save-game").click(function(){
        //submit user_games_scores
    $('#games-form').on('submit', function(e) {
          e.preventDefault();
        var data=$("#games-form").serialize()
        console.log(data);
         
        $.ajax({
                url:"{{url('/account/game/save')}}",
                type: "POST",
                data:data,
                success: function(data) {
                    var obj = JSON.parse(JSON.stringify(data));
                    if (obj.status==true) {
                               
                            $.toaster({ priority : 'success', title : 'Success', message : obj.msg});
                    }   
                }
        });
    });


//Time handel  start
 $.toaster({ priority : 'success', title : 'Timezone', message : moment.tz.guess()});
 var time_zone = moment.tz.guess();
 var time_now  = moment().tz(time_zone).format("HH:mm");
 $.toaster({ priority : 'success', title : 'Now', message : time_now});

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


//Time handel  end


 // console.log($('.time-match').text());

    // $('#myform').on('submit', function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         url : $(this).attr('action') || window.location.pathname,
    //         type: "GET",
    //         data: $(this).serialize(),
    //         success: function (data) {
    //             $("#form_output").html(data);
    //         },
    //         error: function (jXHR, textStatus, errorThrown) {
    //             alert(errorThrown);
    //         }
    //     });
    // });



    $(".js-show-stats").click(function(){
         
         $(".modal-body").empty();
         // $(".modal-body").html("<center><img src='https://loading.io/spinners/eclipse/lg.ring-loading-gif.gif' width='100' height='100'></center>");
         var team1=$(this).closest(".row-game").find(".js-namehome").text();
         var team2=$(this).closest(".row-game").find(".js-nameaway").text();
         var game_id=$(this).closest(".row-game").find(".js-id-game").val();
         // console.log(n1);
          // console.log(game_id);
         var titel=team1+' - '+team2;
        
         $(".modal-title").text(titel);
        $.ajax({
                url:"{{url('/account/game/stats')}}",
                type: "GET",
                data:'game_id='+game_id,
                beforeSend: function() {
                           $(".modal-body").html("<center><img src='https://loading.io/spinners/eclipse/lg.ring-loading-gif.gif' width='100' height='100'></center>");
                },
                success: function(data) {
                    $(".modal-body").empty();
                    var obj = JSON.parse(JSON.stringify(data));
                    // console.log(obj.total_score);
                     // console.log(obj.scores[0]);
                     // console.log(obj.scores.length);

                    if (obj.scores.length>0) {

                        for (var i = 0; i < obj.scores.length; i++) {
                             // console.log(obj.scores[i].score_home+" - "+obj.scores[i].score_away);
                            score = obj.scores[i].score_home+" - "+obj.scores[i].score_away;
                            percent =Math.floor(obj.scores[i].counterScore*100/obj.total_score);
                            html="<div class='container-stats'><div class='left-stats'>"+score+" :  </div> <div class='right-stats'><b>"+percent+" %</b></div><div class='meter'><span style='width:"+percent+"%;'><span class='progress'></span></span></div></div><br>"
                            $(".modal-body").append(html);
                        }
                    }else{
                         $(".modal-body").append("<center><div class='container-stats'>No statistic fot this game</div></center>");
                    }
                    
                    // if (obj.status==true) {
                               
                    //         // Materialize.toast(obj.msg, 500,'toast-success')
                    //          console.log(obj.day);
                    //          console.log(obj.month);
                    //          console.log(obj.year);
                    //          var data='y='+obj.year+'&m='+obj.month+'&d='+obj.day;
                    //          window.location="{{url('/account/game')}}?"+data;
                    // }   
                }
        });
    });



});





    </script>
</body>

</html>