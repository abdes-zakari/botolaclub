@extends('backend.layout')

@section('content')

<style type="text/css">
  .alert-box-custom {
    padding: 20px;
    background-color: #66bb6a;
    color: white;
    border-radius: 4px;
}



.close-btn-alert {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.close-btn-alert:hover {
    color: black;
}

</style>
          
        <div class="main" >
           <div class="row" style="border:0px solid">
               <div class="col s5  offset-s0" style="border:0px solid">
               	    <h5>Edit Game</h5>
               </div>
               <div class="col s7  offset-s0" style="border:0px solid">
               	 <nav id="nav-bar-main" >
                    <div class="nav-wrapper">
               	        <!-- <ul class="right hide-on-med-and-down">
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
                        </ul> -->
                    </div>
                 </nav>
               </div>
               

           </div>
           <div class="divider"></div>
           </br>
           <div class="content-main">
            @if (Session::has('MsgSavedData'))
               <div class="row " style="border:0px solid">
                 <div class="col s5  offset-s2" style="border:0px solid">
                      <div class="alert-box-custom">
                        <span class="close-btn-alert" onclick="this.parentElement.style.display='none';">&times;</span>
                        <span  style="float: left;color: #e8f5e9;" class="material-icons">check_circle</span>
                        <span  style="margin-left: 3%;"> {{session('MsgSavedData')}}  </span> 
                      </div>
                 </div>    
               </div>
            @endif
              <form id="team-form" method="post" action="{{url('/admin/game/edit')}}/{{$game->id}}/save">
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
                                           <option value="{{$team->id}}" 
                                            @if($team->id==$game->team_home) selected @endif > {{$team->name}}</option>
                                        @endforeach
                                       @endif
                                    </select>
                              </div>
                           </div>       
                       </div>
                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                              <div class="input-label"><label class="label-txt">Score Home</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                              <div class="input-fields col s6" style="border:0px solid">
                                    <input type="text" name="score_home" value="{{$game->score_home}}">
                              </div>
                           </div>       
                       </div>
                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                              <div class="input-label"><label class="label-txt">Score Away</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                              <div class="input-fields col s6" style="border:0px solid">
                                    <input type="text" name="score_away" value="{{$game->score_away}}">
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
                                           <option value="{{$team->id}}" 
                                            @if($team->id==$game->team_away) selected @endif> {{$team->name}}</option>
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
                                           <option value="{{$c->id}}"
                                           @if($c->id==$game->competition_id) selected @endif > {{$c->name}}-{{$c->saison}}</option>
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
                                    <input placeholder="week 1..." id="round" name="round" type="text" value="{{$game->round}}" >
                              </div>
                           </div>       
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                            <div class="input-label"><label class="label-txt">Date du Match</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="date_game" name="date_game" type="date" value="{{$game->date_game}}">
                                </div>
                           </div>    
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s2  offset-s2" style="border:0px solid">
                            <div class="input-label"><label class="label-txt">Heure du Match</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="time_game" name="time_game" type="time" value="{{$game->time_game}}" >
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
           </div> <!-- end Content-main -->
        </div>


@endsection