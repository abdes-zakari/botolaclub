@extends('frontend.account.layout')

@section('content')

<!-- Contact Area Start -->
<div id="contact-area" class="contact-area section pb-90 pt-50">
    <div class="container-fluid">

        <div class="row row-game" style="border:0px solid">
            <div class="col-lg-3 col-md-4 col-lg-offset-1 col-md-offset-1" style="border:0px solid">
                <span class="title-tab-game">15 june 2018</span>
            </div>
             <div class="col-lg-2 col-md-1 col-lg-offset-2 col-md-offset-4 hide-on-min" style="border:0px solid">
                 <span class="title-tab-game"><center>Score final</center></span>
             </div>
             <div class="col-lg-1 col-md-1 hide-on-min" style="border:0px solid">
                <span class="title-tab-game"><center>stats</center></span>
            </div>
             <div class="col-lg-1 col-md-1 hide-on-min" style="border:0px solid">
                <span class="title-tab-game"><center>Result</center></span>
            </div>
        </div>
<hr class="style-two">
        <div class="row row-game " style="border:0px solid">
             <div class="col-lg-1 col-md-1 col-xs-12 col-sm-11 col-custom-width " style="border:0px solid">
                <div class="time-match">19H00</div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid">
                        <div class="flag-home"><img class="img-size" src="{{ URL::asset('frontend/img/flags2/ksa.png')}}"></div>
                     </div>
                     <div class="col-lg-9 col-md-9 col-xs-9 col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-home">SAUDI ARABIA</div>
                     </div>
                     <div class="col-xs-offset-1 col-xs-4 col-sm-offset-2 col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">KSA</div>
                     </div>
                </div>
             </div>
             <div class="col-lg-1 col-md-2 col-xs-4 col-sm-3 col-custom-width " style="border:0px solid">
                <div class="row">
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-home" style="border:0px solid red">
                               <center><input type="number" class="input-number-prd" min="0" max="20" name="s_home"></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-away" style="border:0px solid red">
                               <center><input type="number" class="input-number-prd" min="0" max="20" name="s_away"></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                      </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4 " style="border:0px solid">
                <div class="row">
                     <div class="col-lg-9 col-md-9 col-xs-9  col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-away">SOUTH KOREA</div>
                     </div>
                     <div class="col-xs-offset-2 col-xs-4 col-sm-offset-1  col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">KOR</div>
                     </div>
                     <div class="col-lg-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid;">
                        <div class="flag-away"><img class="img-size" src="{{ URL::asset('frontend/img/flags2/kor.png')}}"></div>
                     </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-1 col-xs-6 col-sm-6 " style="border:0px solid">
                <div class="stage-info"><span class="show-on-min">Score Final:</span>Phase de groupe</div>
             </div>
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-3 " style="border:0px solid">
                <div class="infos"><span class="show-on-min">Stats:</span><i class="fa fa-bar-chart" style="font-size:24px;color:#eb2d3a"></i></div>
             </div>
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-2 " style="border:0px solid">
                <div class="infos"><span class="show-on-min">result:</span><i class="fa fa-check-circle" style="font-size:24px;color: #009933;"></i></div>
             </div>
        </div>
<hr class="style-two">
        <div class="row row-game " style="border:0px solid">
             <div class="col-lg-1 col-md-1 col-xs-12 col-sm-11 col-custom-width" style="border:0px solid">
                <div class="time-match">21H00</div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4" style="border:0px solid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid">
                        <div class="flag-home"><img class="img-size" src="{{ URL::asset('frontend/img/flags2/mar.png')}}"></div>
                     </div>
                     <div class="col-lg-9 col-md-9 col-xs-9 col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-home">MOROCCO</div>
                     </div>
                     <div class="col-xs-offset-1 col-xs-4 col-sm-offset-2 col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">MAR</div>
                     </div>
                </div>
             </div>
             <div class="col-lg-1 col-md-2 col-xs-4 col-sm-3 col-custom-width" style="border:0px solid">
                <div class="row">
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-home" style="border:0px solid red">
                               <center><input type="number" class="input-number-prd" min="0" max="20" name="s_home"></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-home chevron-btn fa fa-chevron-down"></div></center>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-5 col-xs-5 col-xs-offset-1 col-md-offset-1" style="border:0px solid">
                      <div class="row btn-input">
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-up" "></div></center>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <div class="s-away" style="border:0px solid red">
                               <center><input type="number" class="input-number-prd" min="0" max="20" name="s_away"></center>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding-col" style="border:0px solid">
                            <center><div class="s-away chevron-btn fa fa-chevron-down"></div></center></a>
                        </div>
                      </div>
                  </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-3 col-xs-4 col-sm-4" style="border:0px solid">
                <div class="row">
                     <div class="col-lg-9 col-md-9 col-xs-9  col-sm-7 fullname" style="border:0px solid">
                         <div class="name-team-away">SPAIN</div>
                     </div>
                     <div class="col-xs-offset-2 col-xs-4 col-sm-offset-1  col-sm-4 abrv" style="border:0px solid">
                         <div class="name-team-home">ESP</div>
                     </div>
                     <div class="col-lg-3 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-md-3 col-sm-5 col-xs-5 " style="border:0px solid;">
                        <div class="flag-away"><img class="img-size" src="{{ URL::asset('frontend/img/flags2/esp.png')}}"></div>
                     </div>
                </div>
             </div>
             <div class="col-lg-2 col-md-1 col-xs-6 col-sm-6" style="border:0px solid">
                <div class="stage-info"><span class="show-on-min">Score Final:</span>Phase de groupe</div>
             </div>
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-3" style="border:0px solid">
                <div class="infos"><span class="show-on-min">Stats:</span><i class="fa fa-bar-chart" style="font-size:24px;color:#eb2d3a"></i></div>
             </div>
             <div class="col-lg-1 col-md-1 col-xs-3 col-sm-2" style="border:0px solid">
                <div class="infos"><span class="show-on-min">result:</span><i class="fa fa-check-circle" style="font-size:24px;color: #009933;"></i></div>
             </div>
        </div>
<hr class="style-two">

    </div>
</div>
<!-- Contact Area End -->


@endsection
