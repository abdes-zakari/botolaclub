@extends('frontend.account.layout')

@section('pageTitle', 'Profile')

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
    <div class="container" style="border:0px solid">
    <div class="row" style="border:0px solid">
       <div class="col-lg-4 col-md-5 col-lg-offset-4 col-md-offset-4" style="border:0px solid">
          <div class="row profile-avatar">
            <div class="col-md-5 col-md-offset-2" style="border:0px solid">
               <img src="{{ URL::asset('frontend/img/avatars/')}}/{{ $profile->user_avatar}}" alt="Avatar" style="width:130px;height: 130px;" class="img-thumbnail img-circle">
            </div>
          </div>
          <hr>
          <br>
          <div class="profile-data">
            <div class="row r-username">
              <div class="col-md-4" style="border:0px solid">
                 Username:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                {{ $profile->username}}
              </div>
            </div><br>
            <div class="row r-firstname">
              <div class="col-md-4" style="border:0px solid">
                 First Name:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                {{ $profile->firstname}}
              </div>
            </div><br>
            <div class="row r-lastname">
              <div class="col-md-4" style="border:0px solid">
                 Last Name:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                {{ $profile->lastname}}
              </div>
            </div><br>
            <div class="row r-country">
              <div class="col-md-4" style="border:0px solid">
                 Country:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                {{ $profile->country}}
              </div>
            </div><br><br>
            @if ($user->id==$profile->id)     
              <div class="row r-editProfile">
                <div class="col-md-10 col-md-offset-2 profile-txt" style="border:0px solid">
                   <a href="{{url('/profile/edit')}}">Edit profile <span class="fa fa-pencil-square-o"></span></a>
                </div>
              </div><br>
            @endif
       </div>
       </div>
    </div>
        <br><br>
    <div class="row" style="border:0px solid">
      <div class="row row-game" style="border:0px solid">
            <div class="col-lg-5 col-md-6 col-lg-offset-1 col-md-offset-1" style="border:0px solid">
                   <span class="title-tab-game"><center>Games Played by {{ $profile->username}} </center></span>
            </div>
             <div class="col-lg-2 col-md-1 col-lg-offset-2 col-md-offset-2 hide-on-min" style="border:0px solid">
                 <span class="title-tab-game"><center>Score final</center></span>
             </div>
             <!-- <div class="col-lg-1 col-md-1 hide-on-min" style="border:0px solid">
                <span class="title-tab-game"><center></center></span>
            </div> -->
             <div class="col-lg-1 col-md-1 hide-on-min" style="border:0px solid">
                <span class="title-tab-game"><center>Pts</center></span>
            </div>
        </div>
        <hr class="style-two">
@foreach ($games as $g)
        <div class="row row-game " style="border:0px solid">
             <div class="col-lg-2 col-md-2 col-xs-12 col-sm-11 col-custom-width " style="border:0px solid">
                <div class="row row-datum">
                    <div class="col-lg-12 " style="border:0px solid">
                        <div class="datum-match">{{ $g->date_game}} </div>
                    </div>
                    <div class="col-lg-12 " style="border:0px solid">
                        <div class="time-match" style="margin-top: 5px;">{{ $g->date_game}} {{ $g->time_game}}</div>
                    </div>
                </div>
             </div>
             <div class="col-lg-3 col-md-4 col-xs-4 col-sm-5 " style="border:0px solid">
                <div class="row" style="border:0px solid">
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid">
                        <div class="flag-home"><img class="img-size" src="{{ URL::asset('/images/flags2/')}}/{{ $g->home_flag}}"></div>
                     </div>
                     <div class="col-lg-9 col-md-9 col-xs-9 col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-home js-namehome">{{ $g->home_name}}</div>
                     </div>
                     <div class="col-xs-offset-1 col-xs-4 col-sm-offset-2 col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">{{ $g->home_short}}</div>
                     </div>
                </div>
             </div>
             <div class="col-lg-1 col-md-2 col-xs-3 col-sm-3 col-custom-width " style="border:0px solid">
                <div class="row">
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                          <div class="col-xs-12 no-padding-col" style="border:0px solid;margin-top:28px;">
                            <div class="s-home" style="border:0px solid red">
                               <center><label class="s-lab">{{ $g->score_home_user}}</label></center>
                            </div>
                        </div>
                      </div>                      
                  </div>
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                          <div class="col-xs-12 no-padding-col" style="border:0px solid;margin-top:28px;">
                            <div class="s-home" style="border:0px solid red">
                               <center><label class="s-lab">{{ $g->score_away_user}}</label></center>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                     <div class="col-lg-9 col-md-9 col-xs-9  col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-away js-nameaway">{{ $g->away_name}}</div>
                     </div>
                     <div class="col-xs-offset-2 col-xs-4 col-sm-offset-1  col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-away">{{ $g->away_short}}</div>
                     </div>
                     <div class="col-lg-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid;">
                        <div class="flag-away"><img class="img-size" src="{{ URL::asset('images/flags2/')}}/{{ $g->away_flag}}"></div>
                     </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-1 col-xs-6 col-sm-6 " style="border:0px solid">
                <div class="stage-info"><span class="show-on-min">Score Final:</span>{{ $g->score_home_final}} - {{ $g->score_away_final}}</div>
             </div>
             <!-- <div class="col-lg-1 col-md-1 col-xs-3 col-sm-3 " style="border:0px solid">
                <div class="infos js-show-stats" data-toggle="modal" data-target="#show-stats">
                    <span class="show-on-min">Stats:</span>
                    <i class="fa fa-bar-chart" style="font-size:24px;color:#eb2d3a"></i>
                </div>
             </div> -->
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-2 " style="border:0px solid">
                <div class="infos">
                    <span class="show-on-min">Pts:</span>
                   <!--  <i class="fa fa-check-circle" style="font-size:24px;color: #009933;"></i> -->
                   {{ $g->user_points}}
                </div>
             </div>
        </div>
<hr class="style-two">

@endforeach
    </div>
    </div>
</div>
<!-- Contact Area End  class="title-tab-game"-->


@endsection
