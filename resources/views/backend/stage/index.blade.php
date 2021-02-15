@extends('backend.layout')

@section('content')
          
        <div class="main" >
           <div class="row" style="border:0px solid">
               <div class="col s5  offset-s0" style="border:0px solid">
               	    <h5>La liste des Tours</h5>
               </div>
               <div class="col s7  offset-s0" style="border:0px solid">
               	 <nav id="nav-bar-main" >
                    <div class="nav-wrapper">
               	        <ul class="right hide-on-med-and-down">
               	        	<li>
               	        	   	 <a href="#modal1" class="nav-a modal-trigger" style="border:0px solid">
               	        	   	 	<div class="material-icons nav-a-icon" style="border:0px solid">add_circle </div>
               	        		     <div class="menu-bottom-txt">Ajouter Tour</div>
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
                    <th>Tours</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                {{ '', $i = 1 }}
                @foreach ($stages as $stg)
                <tr class="phase-row" id="de{{($i++)}}">
                  <td >{{$stg->id}}</td>
                  <td>{{$stg->name}}</td>
                  <td><a class="delete-phase" href="#delete"><span  style="float: left;" class="material-icons a-txt">delete</span></a></td>
                  <input type="hidden" name="id_stage" class="id_stage"  value="{{$stg->id}}">
                </tr>
                @endforeach
              </tbody>
            </table>



  	           <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>Ajouter Tour</h4>
                    <div class="divider"></div>
                    <br>
                    <form id="team-form" method="post" action="{{url('/admin/stage/save')}}">
                      {{ csrf_field() }}
  	                   <div class="row frm-rw" style="border:0px solid">
    	                     <div class="col s2  offset-s2" style="border:0px solid">
    	                 	    <div class="input-label"><label class="label-txt">Tour:</label></div>
    	                     </div>
    	                     <div class="col s6  offset-s0" style="border:0px solid">
    	                 	    <div class="input-fields col s6" style="border:0px solid">
                                   <input placeholder="" id="name_stage" name="name_stage" type="text" >
                                </div>
    	                     </div>    
                       </div>
                       
                       <div class="row frm-rw" style="border:0px solid">
    	                  <div class="col s4  offset-s4" style="border:0px solid">
    	 	                <div class="input-fields col s8" style="border:0px solid">
                               <button class="btn waves-effect waves-light col s12 " id="btn-save-group">Enregistrer</button>
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