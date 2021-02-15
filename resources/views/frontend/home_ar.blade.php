
@extends('frontend.layout_ar')

@section('content')

<style type="text/css">


    .first-col{
         width: 10% !important;
    }
    .seconde-col{
         width: 30% !important;
         text-align: left !important;
    }


    .hero-content h1 {
          font-size: 52px;
    }

    @media only screen and (max-width: 1200px) and (min-width: 992px){
.hero-content h1 {
    font-size:46px;}
  }

  @media only screen and (max-width: 991px) and (min-width: 768px){
.hero-content h1 {
    font-size: 34px;}
  }
  
  @media only screen and (max-width: 767px){
.hero-content h1 {
    font-size: 24px;}
  }

  @media only screen and (max-width: 479px){
.hero-content h1 {
    font-size: 18px;}
}
</style>

                

<!-- Hero Area Start -->
<div id="hero-area" class="hero-area section">
    <!-- Hero Slider Start -->
    <div class="hero-slider">
        <!-- Single Hero Item --> 
        <div class="hero-item">
            <!-- Hero Slider Image -->
            <div class="slide-pattern"></div>
            <img src="{{ URL::asset('frontend/img/hero/1.jpg') }}" alt="">
            <div class="container">
                <div class="row arabic-rtl">
                    <!-- Hero Slider Content -->
                    <div class="hero-content col-md-10 col-xs-12 " style="border:0px solid;float: right;">
                        <h1 style="float: right" class="arabic-rtl" dir="rtl" >
                          @lang('app.h1_titel_home') 
                          <span>@lang('app.span_titel_home')</span>
                        </h1>
                        <p dir="rtl"  style="float: right;"> @lang('app.short_description')</p>
                        <a  style="float: right;" href="#next-match-area" data-toggle="modal" data-target="#login-modal" class="arabic-rtl">@lang('app.login_label') </a>
                        
                        <a  style="float: right;margin-right: 10px;" href="#register" class="arabic-rtl">@lang('app.register_label')</a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!-- Hero Slider End -->
</div>
<!-- Hero Area End -->

<!-- Modal login Start -->
<div class="modal fade login-modal arabic-rtl" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button  style="float: left;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title arabic-rtl"  id="myModalLabel" style="float: right;" >@lang('app.label_signIn') </h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('/account/check')}}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="email_login" style="float: right;" class="arabic-rtl" >@lang('app.email_label')</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email_login" placeholder="" value="" style="direction:RTL">
          </div>
          <br>
          <div class="form-group">
            <label for="password_login" style="float: right;" class="arabic-rtl">@lang('app.password_label')</label>
            <input type="password" name="password" class="form-control input-text-prd" id="password_login" placeholder="" style="direction:RTL">
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd arabic-rtl" >@lang('app.login_label')</button>
          <br>
          <a  style="float: right;" class="link-forgot-password arabic-rtl" href="{{url('/account/reset')}}">@lang('app.label_Forgot')</a>
          <br>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal login End  --> 


<!-- Register Area Start -->
<div id="games" class="about-area section pb-100 pt-50 arabic-rtl" style="border:0px solid">
    <div class="container ctn-register">
        <div class="row"  style="border:0px solid">
            <div class="about-content col-md-10 col-md-offset-1  col-xs-12 " style="border:0px solid">
                <h2  class="arabic-rtl" style="direction:RTL">توقع مباريات هذا الأسبوع  </h2>
                <!-- <div class="row" style="border:1px solid">
                   <div class="col-md-8 col-md-offset-1  col-xs-12 " style="border:1px solid">
                    kaaka
                   </div>
                  
                </div> -->
    {{ csrf_field() }}
    @php($count = 0)
@foreach ($games as $g)
        <div class="row row-game " style="border:0px solid;">
         <input type="hidden" name="{{$count}}[id_game]" class="js-id-game" value="{{ $g->id}}">
             <div class="col-lg-2 col-md-2 col-xs-12 col-sm-11 col-custom-width " style="border:0px solid">
                <div class="time-match">{{ $g->date_game}} {{ $g->time_game}}</div>
             </div>
             <div class="col-lg-3 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid">
                        <div class="flag-home"><img class="img-size" src="{{ URL::asset('images/flags2/')}}/{{ $g->home_flag}}"></div>
                     </div>
                     <div class="col-lg-9 col-md-9 col-xs-9 col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-home js-namehome">{{ $g->home_short}}</div>
                     </div>
                     <div class="col-xs-offset-1 col-xs-4 col-sm-offset-2 col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">{{ $g->home_short}}</div>
                     </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-2 col-xs-4 col-sm-3 col-custom-width " style="border:0px solid">
                <div class="row">
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-home" style="border:0px solid red">
                               <center><input  type="number" class="input-number-prd" min="0" max="20" name="{{$count}}[s_home]" value=""></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                      </div>                      
                  </div>
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-away" style="border:0px solid red">
                               <center><input type="number" class="input-number-prd" min="0" max="20" name="{{$count}}[s_away]" value=""></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                      </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                     <div class="col-lg-9 col-md-9 col-xs-9  col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-away js-nameaway ">{{ $g->away_short}}</div>
                     </div>
                     <div class="col-xs-offset-2 col-xs-4 col-sm-offset-1  col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-away">{{ $g->away_short}}</div>
                     </div>
                     <div class="col-lg-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid;">
                        <div class="flag-away"><img class="img-size" src="{{ URL::asset('images/flags2/')}}/{{ $g->away_flag}}"></div>
                     </div>
                </div>
             </div>
        </div>
<hr class="style-two">
@php($count++) 
@endforeach

        <div class="row row-game " style="border:0px solid">
             <div class="col-lg-4 col-md-4 col-xs-6 col-sm-5 col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" style="border:0px solid">
                 <button  class="btn btn-block btn-prd arabic-rtl" onClick="document.getElementById('register').scrollIntoView();">حفظ النتائج</button>
                 <!-- <a  href="#register" class="btn btn-block btn-prd arabic-rtl">حفظ النتائج</a> -->
             </div>
        </div>

            </div>

        </div>
    </div>
</div>
<!-- Register Area End -->






<div id="next-match-area" class="next-match-area overlayA section pb-110 pt-120" style="background-color: #807e7e;">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
           <div class="section-title title-white text-center col-xs-12 mb-70 arabic-rtl">
               <h1>@lang('app.tab1_titel')</h1>
           </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="table-responsive points-table">
                    <table class="table">
                        <tbody><tr>
                            <th class="first-col"></th>
                            <th class="seconde-col">Teams</th>
                            <th>GP</th>
                            <th>W</th>
                            <th>D</th>
                            <th>L</th>
                            <th>F</th>
                            <th>PTS</th>
                        </tr>
                        @foreach ($teams as $t)
                        <tr>
                            <td class="first-col"><img width="33" height="33" src="{{ URL::asset('images/flags2/')}}/{{ $t->flag}}"></td>
                            <td class="seconde-col" >{{ $t->name}}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        @endforeach
                       
                       
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Register Area Start -->
<div id="register" class="about-area section pb-120 pt-100 arabic-rtl" style="border:0px solid">
    <div class="container ctn-register">
        <div class="row"  style="border:0px solid">
            <!-- About Image -->
            <!-- <div class="about-image col-md-5 col-xs-12">
                <img src="frontend/img/about/1.jpg" alt="">
            </div> -->
            <!-- About Content -->
            <div class="about-content col-md-8 col-md-offset-1  col-xs-12 " style="border:0px solid">
                <!-- <h4>ABOUT US</h4> -->
                <h2  class="arabic-rtl" style="direction:RTL">@lang('app.register_titel') </h2>

                @if (Session::has('accountSuccessCreated'))
                 <div class="alert alert-success alert-dismissible" id="account-success-created">
                    <strong>Success!</strong> {{session('accountSuccessCreated')}}
                </div>
                @endif

                @if (Session::has('accountConfirmed'))
                 <div class="alert alert-success alert-dismissible" id="account-success-confirmed">
                    <strong>Success!</strong> {{session('accountConfirmed')}}
                </div>
                @endif

                <form class="form-horizontal frm-prd" method="POST" action="{{url('/account/register')}}">
                    {{ csrf_field() }}
                    <div class="form-group"  >
                      <label for="username" class="col-sm-4 control-label label-txt arabic-rtl"  style="float: right;">@lang('app.username_label')</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control input-text-prd"  dir="rtl" name="username" id="username" placeholder="" @if (Session::has('username_redirect')) value="{{session('username_redirect')}}" @endif>
                         @if ($errors->has('username'))
                           <span class="help-block">
                              <strong class="up-arrow" style="color: #fff">{{ $errors->first('username') }}</strong>
                           </span>
                         @endif 
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label label-txt arabic-rtl" style="float: right;">@lang('app.email_label')</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control input-text-prd"  dir="rtl" name="email" id="inputEmail3"  placeholder="" 
                        @if (Session::has('email_redirect')) value="{{session('email_redirect')}}" @endif >
                        @if ($errors->has('email'))
                           <span class="help-block">
                              <strong class="up-arrow" style="color: #fff">{{ $errors->first('email') }}</strong>
                           </span>
                         @endif 
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label label-txt arabic-rtl" style="float: right;">@lang('app.password_label')</label>
                      <div class="col-sm-8">
                        <input type="password" name="password"  dir="rtl" class="form-control input-text-prd " id="inputPassword3" placeholder="">
                        @if ($errors->has('password'))
                           <span class="help-block">
                              <strong class="up-arrow" style="color: #fff">{{ $errors->first('password') }}</strong>
                           </span>
                         @endif 
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="inputPassword4" class="col-sm-4 control-label label-txt arabic-rtl" style="float: right;">@lang('app.passwordconfirm_label')</label>
                      <div class="col-sm-8">
                        <input type="password" name="password_confirmation"  dir="rtl" class="form-control input-text-prd " id="inputPassword4"  placeholder="" >
                        @if ($errors->has('password_confirmation '))
                           <span class="help-block">
                              <strong style="color: #eb2d3a">{{ $errors->first('password_confirmation ') }}</strong>
                           </span>
                         @endif 
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-default btn-prd arabic-rtl">@lang('app.btn_signUp')</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Register Area End -->




<!-- Breaking News Area Start -->
<!-- <div class="breaking-news-area section overlay pb-40 pt-40">
    <div class="container">
        <div class="row"> -->
            <!-- Breaking News Wrapper -->
           <!--  <div class="news-wrapper col-xs-12">
                <h4>Breaking News :</h4> -->
                <!-- Breaking News Slider -->
                <!-- <div class="bnews-slider">
                    <a href="#">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</a>
                    <a href="#">There are many variations of passages of Lorem Ipsum available.</a>
                    <a href="#">There are many variations of passages of Lorem Ipsum available, but the majority.</a>
                </div> -->
<!--             </div>
        </div>
    </div>
</div> -->
<!-- Breaking News Area End -->

@endsection