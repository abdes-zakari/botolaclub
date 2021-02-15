
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
            <div class="page-content col-md-5 col-md-offset-5  col-xs-12 arabic-rtl" style="border:0px solid green">
              <h2 dir="rtl" class="arabic-rtl"> تواصل معنا </h2> <br>
              <h5 dir="rtl" class="arabic-rtl"> إذا كان لديك أي سؤال ، اقتراح أو رغبت بالتواصل معنا، فضلا استعمل النموذج البريدي أدناه </h5> <br>
               @if (Session::has('messageSent'))
                 <div class="alert alert-success alert-dismissible arabic-rtl" dir="rtl">
                     {{session('messageSent')}}
                </div>
                @endif
              <form method="POST" action="{{url('/contact/send')}}">
            {{ csrf_field() }}
          <div class="form-group" dir="rtl">
            <label for="email_login" dir="rtl">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email_user" placeholder="البريد الإلكتروني" value="">
            @if ($errors->has('email'))
               <span class="help-block">
                   <strong class="up-arrow" style="color: #fff">{{ $errors->first('email') }}</strong>
                </span>
            @endif 
          </div>
          <br>
          <div class="form-group" dir="rtl">
            <label for="message">اترك رسالتك هنا</label>
            <!-- <input type="password" name="message" class="form-control input-text-prd" id="password_login" placeholder="Password"> -->
            <textarea class="form-control" rows="8" id="message" name="message" placeholder=""></textarea>
            @if ($errors->has('message'))
               <span class="help-block">
                   <strong class="up-arrow" style="color: #fff">{{ $errors->first('message') }}</strong>
                </span>
            @endif 
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd arabic-rtl">أرسل الرسالة</button>
          <br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection