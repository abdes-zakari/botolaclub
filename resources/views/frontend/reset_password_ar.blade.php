
@extends('frontend.layout_ar')

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
            <div class="page-content col-md-5 col-md-offset-5  col-xs-12 " style="border:0px solid green">
              <h3 dir="rtl" class="arabic-rtl">استعادة حسابك</h3> <br>

              @if (Session::has('resetPasswordMessage'))
                 <div class="alert alert-{{session('status')}} alert-dismissible arabic-rtl" dir="rtl" id="recovery-sent">
                    {{session('resetPasswordMessage')}}
                </div>
              @endif
              <form method="POST" action="{{url('/account/reset/push')}}">
            {{ csrf_field() }}
          <div class="form-group arabic-rtl" dir="rtl">
            <label for="email_login" >البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control input-text-prd" id="email" placeholder="أدخل البريد الإلكتروني الخاص بك">
          </div>
          <br>
          <button type="submit" class="btn btn-block btn-prd arabic-rtl">إرسال </button>
          <br>
       </form>
               
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->



@endsection