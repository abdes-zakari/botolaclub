
@extends('frontend.layout')

@section('content')

<style type="text/css">


    .first-col{
         width: 10% !important;
    }
    .seconde-col{
         width: 30% !important;
         text-align: left !important;
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
                <div class="row">
                    <!-- Hero Slider Content -->
                    <div class="hero-content col-md-10 col-xs-12" style="border:0px solid;">
                        <h1>@lang('app.h1_titel_home') <span>@lang('app.span_titel_home')</span></h1>
                        <p><!-- Think you know all there is to know about World Cup 2018? Prove it with Botola Club. We coming soon run prediction competitions for many of football's top competitions. --> @lang('app.short_description')</p>
                        <a href="#next-match-area" data-toggle="modal" data-target="#login-modal">@lang('app.login_label') </a>
                        <a href="#register">@lang('app.register_label')</a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    <!-- Hero Slider End -->
</div>
<!-- Hero Area End -->

<!-- Modal login Start -->
<div class="modal fade login-modal" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">@lang('app.label_signIn') </h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('/account/check')}}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="email_login">@lang('app.email_label')</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email_login" placeholder="Email" value="">
          </div>
          <br>
          <div class="form-group">
            <label for="password_login">@lang('app.password_label')</label>
            <input type="password" name="password" class="form-control input-text-prd" id="password_login" placeholder="Password">
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd">@lang('app.login_label')</button>
          <br>
          <a  class="link-forgot-password" href="{{url('/account/reset')}}">@lang('app.label_Forgot')</a>
       </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal login End  --> 


<!-- About Area Start -->
<div id="register" class="about-area section pb-120 pt-100 " style="border:0px solid">
    <div class="container ctn-register">
        <div class="row"  style="border:0px solid">
            <!-- About Image -->
            <!-- <div class="about-image col-md-5 col-xs-12">
                <img src="frontend/img/about/1.jpg" alt="">
            </div> -->
            <!-- About Content -->
            <div class="about-content col-md-8 col-md-offset-1  col-xs-12 " style="border:0px solid">
                <!-- <h4>ABOUT US</h4> -->
                <h2>@lang('app.register_titel')</h2>

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
                    <div class="form-group">
                      <label for="username" class="col-sm-4 control-label label-txt">@lang('app.username_label')</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control input-text-prd" name="username" id="username" placeholder="pick a username" @if (Session::has('username_redirect')) value="{{session('username_redirect')}}" @endif>
                         @if ($errors->has('username'))
                           <span class="help-block">
                              <strong class="up-arrow" style="color: #fff">{{ $errors->first('username') }}</strong>
                           </span>
                         @endif 
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label label-txt">@lang('app.email_label')</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control input-text-prd" name="email" id="inputEmail3"  placeholder="you@example.com" 
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
                      <label for="inputPassword3" class="col-sm-4 control-label label-txt">@lang('app.password_label')</label>
                      <div class="col-sm-8">
                        <input type="password" name="password" class="form-control input-text-prd " id="inputPassword3" placeholder="create a password">
                        @if ($errors->has('password'))
                           <span class="help-block">
                              <strong class="up-arrow" style="color: #fff">{{ $errors->first('password') }}</strong>
                           </span>
                         @endif 
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="inputPassword4" class="col-sm-4 control-label label-txt">@lang('app.passwordconfirm_label')</label>
                      <div class="col-sm-8">
                        <input type="password" name="password_confirmation" class="form-control input-text-prd " id="inputPassword4"  placeholder="confirm password" >
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
                        <button type="submit" class="btn btn-default btn-prd">@lang('app.btn_signUp')</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About Area End -->






<div id="next-match-area" class="next-match-area overlayA section pb-110 pt-120" style="background-color: #807e7e;">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
           <div class="section-title title-white text-center col-xs-12 mb-70">
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