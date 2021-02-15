
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
              <h3>SIGN IN</h3> <br>
              
              @if (Session::has('back_message'))
                 <div class="alert alert-{{session('status')}} alert-dismissible" id="recovery-sent">
                    {{session('back_message')}}
                </div>
              @endif
              <form method="POST" action="{{url('/account/check')}}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="email_login">Email address</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email_login" placeholder="Email" value="abde.zakari@gmail.com">
          </div>
          <br>
          <div class="form-group">
            <label for="password_login">Password</label>
            <input type="password" name="password" class="form-control input-text-prd" id="password_login" placeholder="Password">
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd">Login</button>
          <br>
          <a  class="link-forgot-password" href="{{url('/account/reset')}}">Forgot password?</a>
          <br><br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection