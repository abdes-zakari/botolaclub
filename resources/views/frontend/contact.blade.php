
@extends('frontend.layout')

@section('content')
<style type="text/css">
  .header-area{
  background-color: #000;
}
</style>
<!-- Login Area Start -->
<div id="login" class="login-area section pb-120 pt-150" style="border:0px solid blue">
    <div class="container ctn-login">
        <div class="row"  style="border:0px solid red">
            <div class="page-content col-md-5 col-md-offset-1  col-xs-12 " style="border:0px solid green">
              <h3>CONTACT FORM</h3> <br>
              
               @if (Session::has('messageSent'))
                 <div class="alert alert-success alert-dismissible">
                    <strong>Success!</strong> {{session('messageSent')}}
                </div>
                @endif
              <form method="POST" action="{{url('/contact/send')}}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="email_login">Your Email:</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email_user" placeholder="Email" value="">
            @if ($errors->has('email'))
               <span class="help-block">
                   <strong class="up-arrow" style="color: #fff">{{ $errors->first('email') }}</strong>
                </span>
            @endif 
          </div>
          <br>
          <div class="form-group">
            <label for="message">Your Message:</label>
            <!-- <input type="password" name="message" class="form-control input-text-prd" id="password_login" placeholder="Password"> -->
            <textarea class="form-control" rows="8" id="message" name="message" placeholder="Your Message"></textarea>
            @if ($errors->has('message'))
               <span class="help-block">
                   <strong class="up-arrow" style="color: #fff">{{ $errors->first('message') }}</strong>
                </span>
            @endif 
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd">SEND</button>
          <br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection