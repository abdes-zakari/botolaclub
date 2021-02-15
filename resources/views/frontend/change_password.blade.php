
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

              <form method="POST" action="{{url('/account/reset/push')}}">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="inputpassword1">Password:</label>
            <input type="password" name="password" class="form-control input-text-prd" id="inputpassword1" placeholder="Create a password">
            @if ($errors->has('password'))
               <span class="help-block">
                   <strong class="up-arrow" style="color: #fff">{{ $errors->first('password') }}</strong>
                </span>
            @endif 
          </div>

          <div class="form-group">
            <label for="inputpassword2">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control input-text-prd" id="inputpassword2" placeholder="Confirm a password">
            @if ($errors->has('password_confirmation'))
               <span class="help-block">
                   <strong class="up-arrow" style="color: #fff">{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif 
          </div>
          <br>
          <input type="hidden" name="token_reset" value="{{ $token }}" >
          <button type="submit" class="btn btn-block btn-prd" name="change_password" value="change_password">Save New Password </button>
          <br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection

