@extends('backend.layout')

@section('content')


  
<div class="main" >
           <div class="row" style="border:0px solid">
               <div class="col s5  offset-s0" style="border:0px solid">
                    <h5>La liste des Users</h5>
               </div>
               <div class="col s7  offset-s0" style="border:0px solid">
                 <nav id="nav-bar-main" >
                    <!-- <div class="nav-wrapper">
                        <ul class="right hide-on-med-and-down">
                          <li>
                               <a href="#modal1" class="nav-a modal-trigger" style="border:0px solid">
                                <div class="material-icons nav-a-icon" style="border:0px solid">add_circle </div>
                                 <div class="menu-bottom-txt">Ajouter Game</div>
                               </a>
                          </li>
                          <li>
                               <a href="#" class="nav-a" style="border:0px solid">
                                <div class="material-icons nav-a-icon" style="border:0px solid">all_inclusive </div>
                                 <div class="menu-bottom-txt">Modules</div>
                               </a>
                          </li>
                        </ul>
                    </div> -->
                 </nav>
               </div>
               
           </div>
           <div class="divider"></div>
           </br>

         
           <div class="content-main">

                <table>
                   <thead>
                     <tr>
                         <th>ID</th>
                         <th>Username</th>
                         <th>Country</th>
                         <th>Created</th>
                     </tr>
                   </thead>
                   <tbody>
               @foreach ($users as $user)
                     <tr>
                       <td>{{ $user->id }}</td>
                       <td>{{ $user->username }}</td>
                       <td>{{ $user->city_ip }},{{ $user->country_ip }}</td>

                       <td>{{ $user->created_at }}</td>
                     </tr>
                   <?php

                      // $ip_details=ipInfos($user->user_ip);
                      // echo "  Country: ".$ip_details->country_name;
                   ?>
               @endforeach

                   </tbody>
                </table>
               @include('pagination.custom', ['paginator' => $users])
           </div>
</div>

@endsection