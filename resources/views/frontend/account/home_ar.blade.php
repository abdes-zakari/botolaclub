@extends('frontend.account.layout_ar')

@section('pageTitle', 'Home')

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
<script src="http://localhost:8090/w/pronostic/site/public/frontend/js/vendor/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){ 

       // $(".js-join-comp").click(function(){
       //   var elem=$(this);
       //   var comp_id=elem.attr('data-id-comp');
       //   var csrf_token = "{{ csrf_token() }}";
       //   // console.log(id);

       //   $.ajax({
       //                url:"{{url('/account/join')}}",
       //                type: "POST",
       //                data:'competition_id='+comp_id+'&_token='+csrf_token,
       //                success: function(data) {
       //                  // alert(stoka.attr('data-id-comp'));

       //                  if (data.status=='join') {
       //                      elem.text('REMOVE');
       //                      elem.addClass("joined-btn");
       //                  }else{
       //                      elem.removeClass("joined-btn");
       //                      elem.text('JOIN');
       //                      // elem.addClass("unjoined-btn");
       //                  }
       //                  // $("p").removeClass("intro");

       //                    // var obj = JSON.parse(JSON.stringify(data));
       //                    //   if (obj.status==true) {
                               
       //                    //       Materialize.toast(obj.msg, 3500,'toast-success');
       //                    //   }   
       //                }
       //          });

       // });

   });

</script>
<style type="text/css">

.txt-competition{
  font-family: font2;
    color: #eb2d3a;
    text-transform: capitalize;
    font-size: 20px;
    margin-top: 10px;
    margin-left:10px; 
    margin-right:10px;
}
  
</style>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>

    <script type="text/javascript">
        // alert(moment.tz.guess());
        $(document).ready(function(){
         $.toaster({ priority : 'success', title : 'Timezone', message : moment.tz.guess()});
         });
    </script> -->

    <style type="text/css">
button {
  outline: none; 
}
.btn-prd:focus {outline:0;color: #FFF;}
      .joined-btn{
        background-color: #e6e6e6;
        color: #737373;
        border: 2px solid #e6e6e6;
      }

      .joined-btn:focus{
        color: #737373;
      }

      .unjoined-btn{
        background-color: #eb2d3a;
        color: #000;
        border: 2px solid #eb2d3a;
      }
      /*.joined-btn:hover{
        border: 2px solid #eb2d3a;
        color: #eb2d3a;
        background-color: #FFF;
      }*/
    </style>

<!-- Contact Area Start -->

<div id="contact-area" class="contact-area section pb-90 pt-50">
    <div class="container" style="border:0px solid">
        <div class="row" style="border:0px solid" dir="rtl">
          <h2 class="titel-page arabic_rtl" >شارك في البطولات الحالية </h2>
          <hr>
        @foreach ($competitions as $c)
            <div class="col-md-2 col-md-offset-2" style="border:0px solid">
               <a href="{{url('/account/game')}}?competition={{$c->id}}">
                  <div class="row" style="border:0px solid">
                    <center> <img src="{{ URL::asset('images/logo_competitons/')}}/{{$c->logo}}" alt="World Cup 2018" style="width:120px;height: 120px;"></center>
                  </div>
                  <div class="row txt-competition" style="border:0px solid"><center>{{$c->name}}<br>{{$c->saison}}</center></div>
                  <div class="row txt-competition" style="border:0px solid">

                    <center><button type="submit" class="btn btn-block btn-prd js-play arabic-rtl" data-id-comp="{{$c->id}}">إلعب </button></center>
                  </div>
               </a>
            </div>
        @endforeach

         <div class="col-md-2" style="border:0px solid">
               <a href="#">
                  <div class="row" style="border:0px solid">
                    <center> <img src="http://localhost:8090/w/pronostic/site/public/images/logo_competitons/epl.png" alt="World Cup 2018" style="width:120px;height: 120px;"></center>
                  </div>
                  <div class="row txt-competition" style="border:0px solid"><center>Premier League<br>2018/2019</center></div>
                  <div class="row txt-competition" style="border:0px solid">

                    <center><button disabled type="submit" class="btn btn-block btn-prd js-play arabic-rtl" data-id-comp="1">قريبا</button></center>
                  </div>
               </a>
            </div>

                    <div class="col-md-2" style="border:0px solid">
               <a href="#">
                  <div class="row" style="border:0px solid">
                    <center> <img src="http://localhost:8090/w/pronostic/site/public/images/logo_competitons/liga.png" alt="World Cup 2018" style="width:120px;height: 120px;"></center>
                  </div>
                  <div class="row txt-competition" style="border:0px solid"><center>Liga<br>2018/2019</center></div>
                  <div class="row txt-competition" style="border:0px solid">

                    <center><button disabled type="submit" class="btn btn-block btn-prd js-play arabic-rtl" data-id-comp="3">قريبا</button></center>
                  </div>
               </a>
            </div>
                    <div class="col-md-2" style="border:0px solid">
               <a href="#">
                  <div class="row" style="border:0px solid">
                    <center> <img src="http://localhost:8090/w/pronostic/site/public/images/logo_competitons/seriea.png" alt="World Cup 2018" style="width:120px;height: 120px;"></center>
                  </div>
                  <div class="row txt-competition" style="border:0px solid"><center>Serie A<br>2018/2019</center></div>
                  <div class="row txt-competition" style="border:0px solid">

                    <center><button disabled type="submit" class="btn btn-block btn-prd js-play arabic-rtl" data-id-comp="4">قريبا</button></center>
                  </div>
               </a>
            </div>

            <!-- <div class="col-md-2" style="border:0px solid">
                  <div class="row" style="border:0px solid">
                    <center> <img src="{{ URL::asset('images/logos_comp/wclogo.jpg')}}" alt="World Cup 2018" style="width:120px;height: 120px;"></center>
                  </div>
                  <div class="row txt-competition" style="border:0px solid"><center>World Cup 2018</center></div>
                  <div class="row txt-competition" style="border:0px solid">
                    <center><button type="submit" class="btn btn-block btn-prd" id="join-compet">JOIN</button></center>
                  </div>
            </div>

            <div class="col-md-2" style="border:0px solid">
               <div class="row" style="border:0px solid">
                <center> <img src="{{ URL::asset('images/logos_comp/botola.png')}}" alt="Botola" style="width:120px;height: 120px;"></center>
              </div>
               <div class="row txt-competition" style="border:0px solid"><center>Coming Soon</center></div>
               <div class="row txt-competition" style="border:0px solid">
                    <center><button type="submit" class="btn btn-block btn-prd" id="join-compet">JOIN</button></center>
                  </div>
            </div>

            <div class="col-md-2" style="border:0px solid">
               <div class="row" style="border:0px solid">
                <center> <img src="{{ URL::asset('images/logos_comp/liga.png')}}" alt="Liga" style="width:120px;height: 120px;"></center>
              </div>
               <div class="row txt-competition" style="border:0px solid"><center>Coming Soon</center></div>
               <div class="row txt-competition" style="border:0px solid">
                    <center><button type="submit" class="btn btn-block btn-prd" id="join-compet">JOIN</button></center>
                  </div>
            </div>

            <div class="col-md-2" style="border:0px solid">
               <div class="row" style="border:0px solid">
                <center> <img src="{{ URL::asset('images/logos_comp/epl.png')}}" alt="EPL" style="width:120px;height: 120px;"></center>
              </div>
               <div class="row txt-competition" style="border:0px solid"><center>Coming Soon</center></div>
               <div class="row txt-competition" style="border:0px solid">
                    <center><button type="submit" class="btn btn-block btn-prd" id="join-compet">JOIN</button></center>
                  </div>
            </div>

            <div class="col-md-2" style="border:0px solid">
               <div class="row" style="border:0px solid">
                <center> <img src="{{ URL::asset('images/logos_comp/seriea.png')}}" alt="Serie A" style="width:120px;height: 120px;"></center>
              </div>
               <div class="row txt-competition" style="border:0px solid"><center>Coming Soon</center></div>
               <div class="row txt-competition" style="border:0px solid">
                    <center><button type="submit" class="btn btn-block btn-prd" id="join-compet">JOIN</button></center>
                  </div>
            </div>
 -->

        </div>
    </div>
</div>
<!-- Contact Area End  class="title-tab-game"-->


@endsection
