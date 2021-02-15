@extends('backend.layout')

@section('content')

          
        <div class="main" >
           <div class="row" style="border:0px solid">
               <div class="col s5  offset-s0" style="border:0px solid">
               	    <h5>La liste des Matches</h5>
               </div>
               <div class="col s7  offset-s0" style="border:0px solid">
               	 <nav id="nav-bar-main" >
                    <div class="nav-wrapper">
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
                    </div>
                 </nav>
               </div>
               
           </div>
           <div class="divider"></div>
           </br>
           <div class="content-main">

           	<table class="responsive-table" id="tablos">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Heure</th>
                    <th>Datum</th>
                    <th>Home</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Away</th>
                    <th>Tour</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                {{ '', $i = 1 }}
                @foreach ($games as $game)
                <tr class="row-game" id="de{{($i++)}}">
                  <td >{{$game->id}}</td>
                  <td>@php echo date("H:i", strtotime($game->time_game)) @endphp</td>
                  <td>@php echo str_replace("2018-","",$game->date_game); @endphp</td>
                  <td>
                     <div class="row" style="border:0px solid red">
                       <div class="col s4 offset-s0" style="border:0px solid blue">
                         <span class="flag-team-left">
                           <img class="responsive-imgsddsada" height="42" width="42" src="{{ URL::asset('images/flags2')}}/{{ $game->home_flag }}">
                         </span>
                       </div>
                       <div class="col s8" style="border:0px solid green">
                         <span class="teams-name-left">{{$game->home_name}}</span>
                       </div>
                     </div>
                  </td>
                  <!-- width="28" height="18" -->
                  <td>
                    <div class="row" style="border:0px solid red">
                      <div class="col s12" style="border:0px solid blue">
                        <div class="quantity" style="border:0px solid red">
                           <input class="browser-default input-number s-home" type="number" min="0" max="20" step="1" value="{{$game->score_home}}">
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="row" style="border:0px solid red">
                      <div class="col s12" style="border:0px solid blue">
                         <h5>Vs</h5>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="row" style="border:0px solid red">
                      <div class="col s12"  style="border:0px solid blue;">
                        <div class="quantity" style="border:0px solid red;margin-right: 0px;">
                           <input class="browser-default input-number s-away" type="number" min="0" max="20" step="1" value="{{$game->score_away}}">
                        </div>
                      </div>
                    </div> 
                  </td>
                  <td>
                     <div class="row" style="border:0px solid red">
                       <div class="col s8" style="border:0px solid blue">
                          <div class="teams-name-right">{{$game->away_name}}</div>
                       </div>
                       <div class="col s4" style="border:0px solid green">
                         <span class="flag-team-right">
                           <img class="responsive-imgsddsada" height="42" width="42"src="{{ URL::asset('images/flags2')}}/{{ $game->away_flag }}">
                         </span>
                       </div>
                     </div>
                  </td>
                  <td>{{$game->competition_name}}</td>
                  <td>Week: {{$game->round}}</td>
                  <td>
                      <!-- <button class="btn" id="btn-update-match">save</button> -->
                       <a class="save-scores" href="#save">
                        <span  style="/*float: left;*/font-size: 30px;" class="material-icons a-txt" title="save">save</span>
                      </a>
                      <a class="delete-phase" href="{{url('/admin/game/delete')}}/{{$game->id}}">
                        <span  style="/*float: left;*/font-size: 30px;" class="material-icons a-txt" title="delete">delete</span>
                      </a>
                      <a href="{{url('/admin/game/edit')}}/{{$game->id}}">
                        <span  style="font-size: 30px;" class="material-icons a-txt" title="edit">mode_edit</span>
                      </a>
                  </td>
                  <input type="hidden" name="id_game" class="id_game"  value="{{$game->id}}">
                </tr>
                @endforeach
              </tbody>
            </table>
<div class="row">
  <div class="col s4  offset-s4" style="border:0px solid">@include('pagination.custom', ['paginator' => $games])</div>
</div>

  	           <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>Ajouter un match</h4>
                    <div class="divider"></div>
                    <br>
                    <form id="team-form" method="post" action="{{url('/admin/game/save')}}">
                      {{ csrf_field() }}
  	                   <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                              <div class="input-label"><label class="label-txt">Home Team</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                              <div class="input-fields col s6" style="border:0px solid">
                                    <select class="browser-default select-option" name="team_home">
                                       <option value="" disabled selected>Select Home team</option>
                                       @if($teams)
                                        @foreach ($teams as $team)  
                                           <option value="{{$team->id}}" > {{$team->name}}</option>
                                        @endforeach
                                       @endif
                                    </select>
                              </div>
                           </div>       
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                              <div class="input-label"><label class="label-txt">Away Team</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                              <div class="input-fields col s6" style="border:0px solid">
                                    <select class="browser-default select-option" name="team_away">
                                       <option value="" disabled selected>Select Away team</option>
                                       @if($teams)
                                        @foreach ($teams as $team)  
                                           <option value="{{$team->id}}" > {{$team->name}}</option>
                                        @endforeach
                                       @endif
                                    </select>
                              </div>
                           </div>       
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                              <div class="input-label"><label class="label-txt">Competition</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                              <div class="input-fields col s6" style="border:0px solid">
                                    <select class="browser-default select-option" name="competition_id">
                                       <option value="" disabled selected>Select Competition</option>
                                       @if($competitions)
                                        @foreach ($competitions as $c)  
                                           <option value="{{$c->id}}" > {{$c->name}}-{{$c->saison}}</option>
                                        @endforeach
                                       @endif
                                    </select>
                              </div>
                           </div>       
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                              <div class="input-label"><label class="label-txt">Round</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                              <div class="input-fields col s6" style="border:0px solid">
                                     <input placeholder="week 1..." id="round" name="round" type="text" >
                              </div>
                           </div>       
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                            <div class="input-label"><label class="label-txt">Date du Match</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="date_game" name="date_game" type="date" >
                                </div>
                           </div>    
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                            <div class="input-label"><label class="label-txt">Heure du Match (GMT)</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="time_game" name="time_game" type="time" >
                                </div>
                           </div>    
                       </div>

                       <!-- <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                            <div class="input-label"><label class="label-txt">Away Team:</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="team_away" name="team_away" type="text" >
                                </div>
                           </div>    
                       </div> -->
                       
                       <div class="row frm-rw" style="border:0px solid">
    	                  <div class="col s4  offset-s4" style="border:0px solid">
    	 	                <div class="input-fields col s9" style="border:0px solid">
                               <button class="btn waves-effect waves-light col s12 " id="btn-save-match">Enregistrer</button>
    	 	                </div>
    	                 </div>       
                       </div>
  	                </form> 
                  </div>
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                  </div>
                </div>
                <!-- End Modal Structure -->
           </div> <!-- end Content-main -->
        </div>


@endsection