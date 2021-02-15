@extends('backend.layout')

@section('content')

<style type="text/css">
  .input-fields [type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:after {
  background-color: #8522c3;
}

[type="radio"]:checked+label:after, [type="radio"].with-gap:checked+label:before, [type="radio"].with-gap:checked+label:after {
    border: 2px solid #8522c3;
}

</style>
          
        <div class="main" >
           <div class="row" style="border:0px solid">
               <div class="col s5  offset-s0" style="border:0px solid">
               	    <h5>La liste des Competitions</h5>
               </div>
               <div class="col s7  offset-s0" style="border:0px solid">
               	 <nav id="nav-bar-main" >
                    <div class="nav-wrapper">
               	        <ul class="right hide-on-med-and-down">
               	        	<li>
               	        	   	 <a href="#modal1" class="nav-a modal-trigger" style="border:0px solid">
               	        	   	 	<div class="material-icons nav-a-icon" style="border:0px solid">add_circle </div>
               	        		     <div class="menu-bottom-txt">Ajouter une Competition</div>
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
                    <th>Competition Name</th>
                    <th>Competition Type</th>
                    <th>Saison</th>
                    <th>Rounds of Competition</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                {{ '', $i = 1 }}
                @foreach ($competitions as $c)
                <tr class="competition-row" id="de{{($i++)}}">
                  <td >{{$c->id}}</td>
                  <td>{{$c->name}} - {{$c->saison}}</td>
                  <td>{{$c->compType->type}}</td>
                  <td>{{$c->saison}}</td>
                  <td>{{$c->round_number}}</td>
                  <td><a class="delete-competition" href="{{url('/admin/competition/delete')}}/{{$c->id}}"><span  style="float: left;" class="material-icons a-txt">delete</span></a></td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>



  	           <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>Ajouter Competition</h4>
                    <div class="divider"></div>
                    <br>
                    <form id="competition-form" enctype="multipart/form-data" method="post" action="{{url('/admin/competition/save')}}">
                      {{ csrf_field() }}
  	                   <div class="row frm-rw" style="border:0px solid">
    	                     <div class="col s3  offset-s2" style="border:0px solid">
    	                 	     <div class="input-label"><label class="label-txt">Nom Competition:</label></div>
    	                     </div>
    	                     <div class="col s6  offset-s0" style="border:0px solid">
    	                 	    <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="name_competition" name="name_competition" type="text" >
                                </div>
    	                     </div>    
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s3  offset-s2" style="border:0px solid">
                             <div class="input-label"><label class="label-txt">Saison:</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="saison" name="saison" type="text" >
                                </div>
                           </div>    
                       </div>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s3  offset-s2" style="border:0px solid">
                             <div class="input-label"><label class="label-txt">Logo Competition:</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input type="file" name="logo_competition">
                                </div>
                           </div>    
                       </div>
                       <br>

                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s3  offset-s2" style="border:0px solid">
                             <div class="input-label"><label class="label-txt">Competition Type:</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                              <div class="row">
                                <div class="col s6" style="border:0px solid;">
                                   <input name="competitionType" type="radio" id="league" value="1" />
                                   <label for="league">League</label>
                                </div>
                                <div class="col s6" style="border:0px solid;">
                                   <input name="competitionType" type="radio" id="cup" value="2" />
                                   <label for="cup">Cup</label>
                                </div>
                              </div>
                                  
                            </div>
                           </div>    
                       </div>
                       <br>
                       <div class="row frm-rw" style="border:0px solid">
                           <div class="col s3  offset-s2" style="border:0px solid">
                             <div class="input-label"><label class="label-txt">Number of Round:</label></div>
                           </div>
                           <div class="col s6  offset-s0" style="border:0px solid">
                            <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="round_number" name="round_number" type="text" >
                                </div>
                           </div>    
                       </div>

                       <br>
                       
                       <div class="row frm-rw" style="border:0px solid">
    	                  <div class="col s4  offset-s5" style="border:0px solid">
    	 	                <div class="input-fields col s8" style="border:0px solid">
                               <button class="btn waves-effect waves-light col s12 " id="btn-save-competition">Enregistrer</button>
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