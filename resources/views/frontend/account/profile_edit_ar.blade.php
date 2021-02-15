@extends('frontend.account.layout_ar')

@section('pageTitle', 'Edit Profile')

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
          <h2 class="titel-page">Edit Profile</h2>
          <hr>
          <br>
          @if ($errors->any())
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
          @endif
          <form class="profile-data" enctype="multipart/form-data" method="POST" action="{{url('/profile/edit/save')}}">
             {{ csrf_field() }}
             <input type="hidden" name="id_user" value="{{ $user->id}}">
             <div class="row r-avatar">
              <div class="col-md-4" style="border:0px solid">
                 <img src="{{ URL::asset('frontend/img/avatars/')}}/{{ $user->user_avatar}}" alt="Avatar" style="width:100px;height:100px;max-width: none;" class="img-thumbnail img-circle">
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                <input type="file" name="user_avatar">
              </div>
            </div><br>
            <div class="row r-username">
              <div class="col-md-4" style="border:0px solid">
                 Username:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
               {{ $user->username}}
              </div>
            </div><br>
            <div class="row r-email">
              <div class="col-md-4" style="border:0px solid">
                 Email:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
               {{ $user->email}}
              </div>
            </div><br>
            <div class="row r-firstname">
              <div class="col-md-4" style="border:0px solid">
                 First Name:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                <input type="text" name="firstname" value="{{ $user->firstname}}">
              </div>
            </div><br>
            <div class="row r-lastname">
              <div class="col-md-4" style="border:0px solid">
                 Last Name:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                <input type="text" name="lastname" value="{{ $user->lastname}}">
              </div>
            </div><br>
            <div class="row r-country">
              <div class="col-md-4" style="border:0px solid">
                 Country:
              </div>
              <div class="col-md-8 profile-txt" style="border:0px solid">
                <input type="text" name="country" value="{{ $user->country}}">
              </div>
            </div><br><br>
             <button type="submit" class="btn btn-block btn-prd" id="js-save-profile">SAVE</button>
       </form>
       <br><br><br><br><br><br>
    </div>
            


     


    </div>
</div>
<!-- Contact Area End  class="title-tab-game"-->


@endsection
