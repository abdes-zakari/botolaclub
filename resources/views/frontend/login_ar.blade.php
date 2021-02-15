
@extends('frontend.layout_ar')

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
            <div class="page-content col-md-5 col-md-offset-5  col-xs-12 " style="border:0px solid green">
              <h3 dir="rtl" class="arabic-rtl"> تسجيل الدخول  </h3> <br>
              
              @if (Session::has('back_message'))
                 <div class="alert alert-{{session('status')}} alert-dismissible arabic-rtl"  dir="rtl" id="recovery-sent">
                    {{session('back_message')}}
                </div>
              @endif
              <form method="POST" action="{{url('/account/check')}}">
            {{ csrf_field() }}
          <div class="form-group arabic-rtl"  dir="rtl">
            <label for="email_login">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email_login" placeholder="البريد الإلكتروني" value="">
          </div>
          <br>
          <div class="form-group arabic-rtl"  dir="rtl" >
            <label for="password_login">كلمة المرور</label>
            <input type="password" name="password" class="form-control input-text-prd" id="password_login" placeholder="كلمة المرور">
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd arabic-rtl">تسجيل الدخول</button>
          <br>
          <a  class="link-forgot-password arabic-rtl" dir="rtl" href="{{url('/account/reset')}}" dir="rtl">هل نسيت كلمة المرور؟</a>
          <br><br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection