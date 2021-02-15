@extends('frontend.account.layout_ar')

@section('pageTitle', 'Fixtures')

@section('content')

<!-- <script type="text/javascript">
  $(document).ready(function(){ 

       $(".next-click").click(function(){
         
         var date_now=$(".current_date").val();

         $.ajax({
                      url:"{{url('/game/date')}}",
                      type: "GET",
                      data:'date_now='+date_now,
                      success: function(data) {
                          // var obj = JSON.parse(JSON.stringify(data));
                          //   if (obj.status==true) {
                               
                          //       Materialize.toast(obj.msg, 3500,'toast-success');
                          //   }   
                      }
                  });

       });

   });

</script> -->



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>

    <script type="text/javascript">
        // alert(moment.tz.guess());
        $(document).ready(function(){
         $.toaster({ priority : 'success', title : 'Timezone', message : moment.tz.guess()});
         });
    </script> -->

<!-- Contact Area Start -->
<div id="contact-area" class="contact-area section pb-90 pt-50">
    <div class="container">
        <h2 class="titel-page arabic-rtl" dir="rtl">المباريات الحالية </h2>
    </div>
    <br>
    <div class="container-fluid">


        <div class="row row-game" style="border:0px solid">
            <div class="col-lg-3 col-md-4 col-lg-offset-2 col-md-offset-1" style="border:0px solid">
                <span class="title-tab-game">
                        <span class="fa fa-chevron-left btn-next-prev prev-click" title="Previous Day"></span> 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="arabic-time arabic-rtl" style="font-size: 18px;">  {{ $day_game }} </span>
                        <input type="hidden" name="current_date" class="current_date" value="{{ $date_now }}">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="fa fa-chevron-right btn-next-prev next-click" title="Next Day"></span>
                </span>
            </div>
             <div class="col-lg-2 col-md-1 col-lg-offset-1 col-md-offset-4 hide-on-min" style="border:0px solid">
                 <span class="title-tab-game arabic-rtl" style="font-size: 16px;"><center>النتيجة النهائية</center></span>
             </div>
             <div class="col-lg-1 col-md-1 hide-on-min" style="border:0px solid">
                <span class="title-tab-game arabic-rtl" style="font-size: 16px;"><center>الإحصائيات</center></span>
            </div>
             <div class="col-lg-1 col-md-1 hide-on-min" style="border:0px solid">
                <span class="title-tab-game arabic-rtl" style="font-size: 16px;"><center> النقاط  </center></span>
            </div>
        </div>
        <hr class="style-two">
<!-- <form method="POST" action="{{url('/account/game/save')}}"> -->
<form id="games-form">
    {{ csrf_field() }}
    @php($count = 0)
@foreach ($games as $g)
        <div class="row row-game " style="border:0px solid">
         <input type="hidden" name="{{$count}}[id_game]" class="js-id-game" value="{{ $g->id}}">
             <div class="col-lg-1 col-md-1 col-xs-12 col-sm-11 col-custom-width " style="border:0px solid">
                <div class="time-match">{{ $g->date_game}} {{ $g->time_game}}</div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid">
                        <div class="flag-home"><img class="img-size" src="{{ URL::asset('images/flags2/')}}/{{ $g->away_flag}}"></div>
                     </div>
                     <div class="col-lg-9 col-md-9 col-xs-9 col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-home js-namehome arabic-rtl">{{ $g->away_arabic_name}}</div>
                     </div>
                     <div class="col-xs-offset-1 col-xs-4 col-sm-offset-2 col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">{{ $g->away_short}}</div>
                     </div>
                </div>
             </div>
             <div class="col-lg-1 col-md-2 col-xs-4 col-sm-3 col-custom-width " style="border:0px solid">
                <div class="row">
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                         @php($close=App\Http\Controllers\Frontend\AccountGameController::closeGame($g->date_game,$g->time_game))
                         @if ($close==true) <!--show labels-->
                          <div class="col-xs-12 no-padding-col" style="border:0px solid;margin-top:28px;">
                            <div class="s-home" style="border:0px solid red">
                               <center><label class="s-lab">{{ $g->score_away_user}}</label></center>
                            </div>
                        </div>
                        @else <!--show inputs Number-->
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-home" style="border:0px solid red">
                               <center><input  type="number" class="input-number-prd" min="0" max="20" name="{{$count}}[s_away]" value="{{ $g->score_away_user}}"></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                       
                        @endif
                      </div>                      
                  </div>
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        @if ($close==true) <!--show labels-->
                          <div class="col-xs-12 no-padding-col" style="border:0px solid;margin-top:28px;">
                            <div class="s-home" style="border:0px solid red">
                               <center><label class="s-lab">{{ $g->score_home_user}}</label></center>
                            </div>
                        </div>
                        @else <!--show inputs Number-->
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-away" style="border:0px solid red">
                               <center><input type="number" class="input-number-prd" min="0" max="20" name="{{$count}}[s_home]" value="{{ $g->score_home_user}}"></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                         @endif
                      </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                     <div class="col-lg-9 col-md-9 col-xs-9  col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-away js-nameaway arabic-rtl">{{ $g->home_arabic_name}}</div>
                     </div>
                     <div class="col-xs-offset-2 col-xs-4 col-sm-offset-1  col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-away">{{ $g->home_short}}</div>
                     </div>
                     <div class="col-lg-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid;">
                        <div class="flag-away"><img class="img-size" src="{{ URL::asset('images/flags2/')}}/{{ $g->home_flag}}"></div>
                     </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-1 col-xs-6 col-sm-6 " style="border:0px solid">
                <div class="stage-info"><span class="show-on-min arabic-rtl" style="font-size: 16px;">النتيجة النهائية</span>{{ $g->score_away_final}} - {{ $g->score_home_final}}</div>
             </div>
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-3 " style="border:0px solid">
                <div class="infos js-show-stats" data-toggle="modal" data-target="#show-stats">
                    <span class="show-on-min arabic-rtl" style="font-size: 16px;"> الإحصائيات </span>
                    <i class="fa fa-bar-chart" style="font-size:24px;color:#eb2d3a"></i>
                </div>
             </div>
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-2 " style="border:0px solid">
                <div class="infos">
                    <span class="show-on-min arabic-rtl" style="font-size: 16px;">النقاط</span>
                   <!--  <i class="fa fa-check-circle" style="font-size:24px;color: #009933;"></i> -->
                   {{ $g->user_points}}
                </div>
             </div>
        </div>
<hr class="style-two">
@php($count++) 
@endforeach

        <div class="row row-game " style="border:0px solid">
             <div class="col-lg-3 col-md-4 col-xs-6 col-sm-5 col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" style="border:0px solid">
                 <button type="submit" class="btn btn-block btn-prd arabic-rtl" id="js-save-game">حفظ النتائج</button>
             </div>
        </div>
</form>

<!-- The Modal -->
<div class="modal fade modal-on-mobile" id="show-stats">
  <div class="modal-dialog center-modal">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-prd arabic-rtl" data-dismiss="modal">إغلاق</button>
      </div>

    </div>
  </div>
</div>

    </div>
</div>
<!-- Contact Area End -->


@endsection
