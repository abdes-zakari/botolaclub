@extends('frontend.account.layout')

@section('pageTitle', 'Standing')

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
    <h2 class="titel-page">Standing</h2>
         <!-- <div class="table-responsive"> -->
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th class="titel-label-table">Username</th>
          <th class="titel-label-table">Played</th>
          <th class="titel-label-table">Win</th>
          <th class="titel-label-table">Draw</th>
          <th class="titel-label-table">Los</th>
          <th class="titel-label-table">Pts</th>
        </tr>
      </thead>
      <tbody>
        @php($pos = 1)
        @foreach ($standing as $s)
        <tr>
          <td class="label-table">{{ $pos }}</td>
          <td class="label-table">{{ $s->username }}</td>
          <td class="label-table">{{ $s->CountGame }}</td>
          <td class="label-table">{{ $s->win }}</td>
          <td class="label-table">{{ $s->draw }}</td>
          <td class="label-table">{{ $s->los }}</td>
          <td class="label-table">{{ $s->pts }}</td>
        </tr>
        @php($pos++) 
        @endforeach
      </tbody>
    </table>
  <!-- </div> -->



    </div>
</div>
<!-- Contact Area End  class="title-tab-game"-->


@endsection
