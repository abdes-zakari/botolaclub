
@extends('frontend.layout')

@section('content')
<style type="text/css">
  .header-area{
  background-color: #000;
}
</style>
<!-- Login Area Start -->
<div id="reset-password" class="reset-password-area section pb-120 pt-150" style="border:0px solid blue">
    <div class="container ctn-reset-password">
        <div class="row"  style="border:0px solid red">
            <div class="page-content col-md-5 col-md-offset-1  col-xs-12 " style="border:0px solid green">
              <h3>Recovery Password</h3> <br>

              @if (Session::has('resetPasswordMessage'))
                 <div class="alert alert-{{session('status')}} alert-dismissible" id="recovery-sent">
                    {{session('resetPasswordMessage')}}
                </div>
              @endif
              <form method="POST" action="{{url('/account/reset/push')}}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="email_login">Your Email:</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email" placeholder="Email">
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd">Send Recovery Email </button>
          <br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection