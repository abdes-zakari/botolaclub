@extends('frontend.account.layout_ar')

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
    <h2 class="titel-page arabic-rtl" dir="rtl">الترتيب العام</h2>
         <div class="table-responsive" dir="rtl">
    <table class="table" dir="rtl">
      <thead>
        <tr>
          <th>#</th>
          <th class="titel-label-table arabic-rtl" dir="rtl" style="text-align: right;">اسم المستخدم </th>
          <th class="titel-label-table arabic-rtl" dir="rtl" style="text-align: right;">لعب</th>
          <th class="titel-label-table arabic-rtl" dir="rtl" style="text-align: right;">فوز</th>
          <th class="titel-label-table arabic-rtl" dir="rtl" style="text-align: right;">تعادل </th>
          <th class="titel-label-table arabic-rtl" dir="rtl" style="text-align: right;">خسارة</th>
          <th class="titel-label-table arabic-rtl" dir="rtl" style="text-align: right;">نقاط</th>
        </tr>
      </thead>
      <tbody>
        @php($pos = 1)
        @foreach ($standing as $s)
        <tr>
          <td class="label-table">{{ (($currentPage-1)*$perPage)+($pos) }}</td>
          <td class="label-table"><a href="{{url('/profile/'.$s->id.'/view')}}">{{ $s->username }}</a></td>
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
  </div>
     @include('pagination.bootstrap', ['paginator' => $standing])



    </div>
</div>
<!-- Contact Area End  class="title-tab-game"-->


@endsection
