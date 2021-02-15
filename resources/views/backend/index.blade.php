@extends('backend.layout')

@section('content')
          
        <div class="main-home">
          <div class="row" style="border:0px solid">
            <div class="col s12 m12 l12 xl6">
              <div class="card"  style="padding: 18px 18px 18px 18px;">
                 <div class="header-card" >Welcome to Admin Panel: Botolaclub</div>

              </div>
            </div>
          </div>

          <div class="row" style="border:0px solid">

             <div class="col s12 m6 l3" style="border:0px solid;">
                <div class="card-data card-2 card">
                   <div class="col s7" style="border:0px solid;">
                    <!--  <i class="material-icons background-roundaa mt-5">shopping_cart</i> -->
                    <!-- <i class="fa fa-users" style="font-size:22px"></i> -->
                    <span class="fa-stack fa-2x">
                       <i class="fa fa-circle fa-stack-2x color-round" ></i>
                       <i class="fa fa-users fa-stack-1x" style="color:#FFF";></i>
                    </span>
                    <p>Users</p>
                   </div>
                   <div class="col s5 right-align" style="border:0px solid;">
                     <h5 class="mb-0">-</h5>
                     <p class="no-margin">New</p>
                     <p>{{$countUser}}</p>
                   </div>
                </div>
             </div> 
             <div class="col s12 m6 l3" style="border:0px solid;">
                <div class="card-data card-3 card">
                   <div class="col s7" style="border:0px solid;">
                    <!--  <i class="material-icons background-roundaa mt-5">shopping_cart</i> -->
                     <!-- <i class="fa fa-line-chart" style="font-size:22px;"></i> -->
                    <span class="fa-stack fa-2x">
                       <i class="fa fa-circle fa-stack-2x color-round" ></i>
                       <i class="fa fa-line-chart fa-stack-1x" style="color:#FFF";></i>
                    </span>
                    <p>Games</p>
                   </div>
                   <div class="col s5 right-align" style="border:0px solid;">
                      <h5 class="mb-0">-</h5>
                      <p class="no-margin">New</p>
                      <p>{{$countGame}}</p>
                   </div>
                </div>
             </div>
          </div><!--end first row-->
        

         
        </div>


@endsection