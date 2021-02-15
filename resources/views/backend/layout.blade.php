<!DOCTYPE html>
<html lang="en">
    <head>
      
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Pronostic WC - ADMIN</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link href="{{ URL::asset('materialize/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  
        <link href="{{ URL::asset('fontawesome/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>

        <style type="text/css">

         .side-nav.fixed {
           /*background-color:#263238; /*original*/
           background:#263238;
           color: #D1D3E0;
           top: 64px;
          }

.toast-success{
background-color:#00cc44;

}

          .side-nav.fixed li > a {
  color: #BEBEBE;
  font-weight: 800;

}

#nav-bar{
  /*background-color: #6a1b9a;original*/
  background:#6a1b9a;
  
}

#nav-bar-main{
  background:none;
  box-shadow:none;
  -webkit-box-shadow:none;
  line-height: 20px;
}

.nav-a-icon {
  color: #6a1b9a !important;
  font-size: 30px !important;
  height: 42px !important;
  display: block !important;
  text-align: center;
  /*max-width: 175px;*/
}

.nav-a {
color: #6a1b9a;
/*width: 210px;*/
}

.nav-a:hover {
  background-color:rgba(0,0,0,0) !important;
}

.menu-bottom-txt{
  text-align: center;
  /*max-width: 175px;*/
/*border:1px solid red;*/
/*float: right;*/
}


.btn{
      font-weight: 800;
      background-color: #8522c3;
      letter-spacing: 2px;
    }
    .btn:hover{
      font-weight: 800;
      background-color: #6a1b9a;
    }

    .btn:focus{
      font-weight: 800;
      background-color: #3b0f57;
    }
.select-option:focus{
outline: 1px solid #6a1b9a;
}

.teams-name-left{
text-transform: uppercase;
font-size: 26px;
}

.teams-name-right{
text-transform: uppercase;
font-size: 26px;
text-align: right;
}

.modal {
  max-height: 100%;
}
#header-nav {
position: fixed;
top: 0;
left: 0;
/*background:#263238;/*original*/
background:#263238  ;
width:300px;
 z-index: 1003;
 height: 65px;
 border-bottom: 1px solid #212121;
 overflow: hidden;
    transform: translateX(0px);
 /*border-right:  5px solid #757575;*/
-webkit-box-shadow: 0px 0px 5px 0px rgba(66,62,66,1);
-moz-box-shadow: 0px 0px 5px 0px rgba(66,62,66,1);
box-shadow: 0px 0px 5px 0px rgba(66,62,66,1);
}

.logo-top-left{
padding-left: 20%;
padding-top: 4px;

}


        


/*Custom Scrollbar CSS*/

::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #212121;
}

::-webkit-scrollbar
{
  width: 6px;
  background-color: #212121;
}

::-webkit-scrollbar-thumb
{
  background-color: #757575 ;
}


#search-inp{
  width: 380px;
   margin-top: 0px;
   margin-left: 450px;
   display: inline-block;
  position: absolute;
   /* border:1px solid blue;*/
   /*border:1px solid red;*/
    overflow-wrap: break-word;

}

#search-inp input[type=search]{
  width: 90%;
  padding: 0%;
  padding-left: 3%;
  font-size: 100%;
  background-color: #4a136c;
  position: relative;
  border-bottom: none;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  height: 45px;
  /*color: #6a1b9a;*/
  /*border:1px solid green;*/
  
}
#search-inp input[type=search]:focus{ 

  background-color: #FFF;
  color: #6a1b9a;/*color mauve*/
  
}

 body{
    background-color: #f5f5f5;
  }
.main-home{
  /*background-color: #f5f5f5;*/
  margin-left: 300px;
  margin-right: 0%;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 2px;
  padding: 2%;
  /*border:1px solid #e7e5e4;*/
  /*background-color: #FFF;*/
}

.main{
  margin-left: 310px;
  margin-right: 1%;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 2px;
  padding: 2%;
  border:1px solid #e7e5e4;
  background-color: #FFF;
}

.content-main {
    margin-bottom: 3%;
    margin-top: 3%;
}


hr.separator-line{
    /*outline: 1px groove #f5f5f5 ;*/ 
    border-top:1px solid #546e7a          ; 
    border-bottom:2px solid #e0e0e0    ;
   }


.input-fields input[type=text]:not(.browser-default),input[type=password]:not(.browser-default){
    padding: 1% 6%;
     box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border: 1px solid #cfd8dc  ;
    outline: none;  
    height: 33px;
}


.input-fields input[type=text]:not(.browser-default):focus:not([readonly]),input[type=password]:not(.browser-default):focus:not([readonly]){
          -moz-box-shadow: 0 0 1px #6a1b9a;
          -webkit-box-shadow: 0 0 1px #6a1b9a;
          box-shadow: 0 0 1px #6a1b9a;
          border: 1px solid #6a1b9a;
          
}

.input-label{
    margin-top: 4px;
    margin-left: 6px;
    position: relative; 
    overflow-wrap: break-word;

}

.label-txt{
font-size: 100%;
}

/*Responsive Section*/

@media  only screen and (max-width: 992px) {
          .button-collapse{
              color: #FFF;
              top: 17px;
              left: 1%;
              position: absolute;
              z-index: 1003;
              position: fixed;
          }

          .hide-on-med-and-down{
            /*display: block;*/
            display: block !important;
          }

          #search-inp{
  width: 50%;
   margin-top: 0px;
   margin-left: 10%;
   display: inline-block;
  position: relative;
    /*border:1px solid red;*/
    overflow-wrap: break-word;  
}


#search-inp input[type=search]{
  width: 75%;
  height: 40px;
  /*border:1px solid green;*/
  
}

.main-home{
margin-left: 0px;
}
.main{
  margin-left: 0px;
}
        }

@media  only screen and (max-width: 554px) {

            #search-inp{
  width: 35%;
   margin-top: 2px;
   margin-left: 15%;
   display: inline-block;
  position: absolute;
    /*border:1px solid yellow;*/
    overflow-wrap: break-word;  
    /*transition: width 1s; */
    transition: all 1s ease-in-out;
}


#search-inp input[type=search]{
  width: 75%;
  height: 38px;
  /*border:1px solid green;*/
  
}

#search-inp:focus-within{ 
  width: 65%;
  transition: width 0.8s;  
}
}

.card-data{
  margin: 4px;
  /*padding: 15px;*/
  color:#FFF;
      padding: 4% !important;
  /*position: fixed;*/
      overflow: hidden;
}

.card-data.card-1{
background-color:#f44336;
}
.card-data.card-2{
background-color:#0288d1;
}
.card-data.card-3{
background-color:#43a047;
}
.card-data.card-4{
background-color:#ffb300;
}

.card{
  padding-bottom: 6%;
  padding-top: 2%;
}

.background-roundaa {
    background-color: rgba(0, 0, 0, 0.18);
    padding: 15px;
    border-radius: 50%;
    /*width: 44px;*/
}

.color-round {
    color: rgba(0, 0, 0, 0.18);
}

.mb-0{
  margin-bottom: 0% !important;
}
.no-margin{
  margin: 0% !important;
}

.header-card{
  font-size: 28px;
  color: #546c78;
  padding-bottom: 15px;
  padding-right: 5px;
}
.footer-card{
  /*padding: 2% 0 2% 0;*/
  padding-bottom:10px; 
  padding-top:10px;
  text-align: center;
}

.side-nav li>a>i.slide-icon-menu{
 color: #FFF;
 margin-right: 5%; 
}

.side-nav li>a>i.slide-icon-menus{
 color: #BEBEBE;
 margin-right: 15px; 
 font-size:16px;

}

.side-nav li>a>i.slide-icon-menus-drop{
 color: #BEBEBE;
 margin-right: 20px; 
 font-size:16px;

}

span.badge.cat-phone{
background-color:rgb(75, 192, 192);
}
span.badge.cat-phone:after{
content: "";
}
span.badge.cat-tablet{
background-color: rgb(255, 99, 132);
}
span.badge.cat-tablet:after{
content: "";
}
span.badge.cat-laptop{
background-color: #ffcd56;
}
span.badge.cat-laptop:after{
content: "";
}
.unselect {
  -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
}

html {
    font-family: 'Titillium Web';
    /*font-size: 22px;*/
}

#dropdown1{
margin-top: 64px;
width: 135px !important;

}

.a-txt {
    color: #6a1b9a;
}


 /* start CSS for input Number style */

 .icon-score{
  font-size: 20px;
 }


.quantity {
  position: relative;

}

.input-number::-webkit-inner-spin-button,
.input-number::-webkit-outer-spin-button
{
  -webkit-appearance: none;
  margin: 0;
}

.input-number
{
  -moz-appearance: textfield;
}

.quantity input {
  width: 65px;
  height: 42px;
  line-height: 1.65;
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: 1px solid #bf7de8;


}

.quantity input:focus {
  outline: 0;
}

.quantity-nav {
  float: left;
  position: relative;
  height: 42px;
}

.quantity-button {
  position: relative;
  cursor: pointer;
  border-left: 1px solid #eee;
  width: 20px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "Trebuchet MS", Helvetica, sans-serif !important;
  line-height: 1.7;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.quantity-button.quantity-up {
  position: absolute;
  height: 50%;
  top: 0;
  border-bottom: 1px solid #eee;
  background-color: #6a1b9a;
  color: #FFF;
}

.quantity-button.quantity-down {
  position: absolute;
  bottom: -1px;
  height: 50%;
  background-color: #6a1b9a;
  color: #FFF;

}


      </style>



    </head>
    <body>
      <div class="navbar-fixed">
        <nav id="nav-bar">
            <div class="nav-wrapper">
               <!--  <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a> -->
                <div id="search-inp">
                    <!-- <span class="fa fa-search" style="margin-right: 1%;"></span> -->
                    <input type="search" id="search-input" name="search-txt" placeholder="Search">
                </div>
                <ul class="right hide-on-med-and-down">
                    <!-- <li><a href="#"><i class="material-icons">search</i></a></li> -->
                    <li><a href="#"><i class="material-icons">view_module</i></a></li>
                    <li><a href="#"><i class="material-icons">refresh</i></a></li>
                    <li><a href="javascript:void(0)" class='dropdown-button' data-activates='dropdown1'><i class="material-icons">more_vert</i></a></li>

                    <ul id="dropdown1" class="dropdown-content" >
                      <li>
                        <a  href="{{url('/admin/edit')}}">
                           <span class="a-txt">
                             <span class="fa fa-pencil-square-o" style="margin-right: 8%;"></span>Edit
                           </span>
                        </a>
                      </li>
                      <li>
                        <a  href="{{url('/admin/logout')}}">
                           <span class="a-txt">
                             <span class="fa fa-sign-out" style="margin-right: 8%;"></span>Logout
                           </span>
                        </a>
                      </li>
                    </ul>

                </ul>
            </div>
        </nav>
      </div>
       
    

    <div id="header-nav" class="side-nav fixed">
      <a href="#!" class="brand-logo"><img class="logo-top-left" width="50%"  src="{{url('/frontend/img/logo.png')}}"></a>
    </div>
    <ul id="slide-out" class="side-nav fixed unselect">
      <!-- <li><a href="#!"><i class="material-icons slide-icon-menu">add</i>First Sidebar Link</a></li> -->
      <li><a href="{{url('/admin/competition')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Competitions</a></li>
      <li><a href="{{url('/admin/team')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Teams</a></li>
      <li><a href="{{url('/admin/group')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Groupes</a></li>
       <li><a href="{{url('/admin/stage')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Tours</a></li>
       <li><a href="{{url('/admin/game')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Matches</a></li>
       <li><a href="{{url('/admin/users')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Users</a></li>
      <li><a href="{{url('/admin/emails')}}"><i class="fa fa-list-alt slide-icon-menus" ></i>Emails</a></li>
      <li><div class="navbar-fixed fixed" style="padding-bottom: 30%;background-color: #263238;"></div></li>
    </ul>

    <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          
        @yield('content')



        
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('materialize/js/materialize.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('materialize/js/init.js') }}"></script>
              <script type="text/javascript">



// start js for input Number style 
      jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="material-icons icon-score">arrow_drop_up</i></div><div class="quantity-button quantity-down"><i class="material-icons icon-score">arrow_drop_down</i></div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('.input-number'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        if (input.val()=="") {
           var oldValue =-1;
        }else{
           var oldValue = parseFloat(input.val());
        }
        
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        if (input.val()=="") {
           var oldValue =-1;
        }else{
           var oldValue = parseFloat(input.val());
        }        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });


        $(document).ready(function(){


  // alert($('.menu-bottom-txt').text());

  $(".save-scores").click(function(){
    // console.log('sdsa');

      var id_game = $(this).closest(".row-game").find(".id_game").val();
      var s_home  = $(this).closest(".row-game").find(".s-home").val();
      var s_away  = $(this).closest(".row-game").find(".s-away").val();
      var csrf_token = "{{ csrf_token() }}";
      var data    = "id_game="+id_game+"&s_home="+s_home+"&s_away="+s_away+"&_token="+csrf_token;

      // console.log(id_game);
      // console.log(s_home);
      // console.log(s_away);
         
         
        $.ajax({
                url:"{{url('/admin/game/save_score')}}",
                type: "POST",
                data:data,
                success: function(data) {
                    var obj = JSON.parse(JSON.stringify(data));
                    if (obj.status==true) {
                               
                         Materialize.toast(obj.msg, 1000,'toast-success')
                    }   
                }
        });
    });





         

if ($(window).width()<992) {
      $("#header-nav").css("transform", "translateX(-100%)");
    }

$(window).resize(function() {
  if ($(window).width()<992) {
      $("#header-nav").css("transform", "translateX(-100%)");
    }
    if ($(window).width()>992) {
      // $("#header-nav").show();
      // $("#header-nav").css("display", "none");
      $("#header-nav").css("transform", "translateX(0px)");
    }

});

    $('.button-collapse').sideNav({
      onOpen: function(el) { 
       $("#header-nav").css("transform", "translateX(0px)");
       // $("#header-nav").css("display", "block");
       }, // A function to be called when sideNav is opened
      onClose: function(el) { 
        if ($(window).width()<992) {
             $("#header-nav").css("transform", "translateX(-100%)");
            // $("#header-nav").hide();
        }
            }, // A function to be called when sideNav is closed
    });

    
    
});


        // start javascript chartjs

// var ctx1 = document.getElementById('myChart-1').getContext('2d');
var ctx2 = document.getElementById('myChart-2').getContext('2d');

//   var chart = new Chart(ctx, {
//     type: 'line',
//     data: data,
//     options: options
// });


var randomScalingFactor = function() {
      return Math.round(Math.random() * 100);
    };

window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(201, 203, 207)'
};

// var chart1 = new Chart(ctx1, {
//     // The type of chart we want to create
//     type: 'doughnut',

//     // The data for our dataset
//     data: {
//         datasets: [{
//           data: [
//             20,
//             38,
//             10,
//             15,
//           ],
//           backgroundColor: [
//             window.chartColors.red,
//             window.chartColors.purple,
//             window.chartColors.blue,
//             window.chartColors.yellow,
           
//           ],
//           label: 'Dataset 1'
//         }],
//         labels: [
//           'iOS',
//           'Android',
//           'BlackBerry 10',
//           'Windows 10 Mobile',
//         ]
//       },

//     // Configuration options go here
//     options: {
//         // responsive: true,
//         legend: {
//           position: 'top',
//         },
//         title: {
//           display: true,
//           text: 'Chart.js Polar Area Chart'
//         },
//         scale: {
//           ticks: {
//             beginAtZero: true
//           },
//           reverse: false
//         },
//         animation: {
//           animateRotate: false,
//           animateScale: true
//         }
//     }

   


// });


var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: "Laptops",
            backgroundColor: 'rgb(255, 205, 86)',
            borderColor: 'rgb(255, 205, 86)',
            fill: false,
            data: [0, 10, 5, 2, 20, 30, 88,30,77,66,88,95],
        },
        {
            label: "Smartphones",
            backgroundColor: 'rgb(75, 192, 192)',
            borderColor: 'rgb(75, 192, 192)',
            fill: false,
            data: [22, 14, 35, 88, 30, 50, 35,44,60,33,55,74],
        },{
            label: "Tablets",
            backgroundColor: window.chartColors.red,
            borderColor: window.chartColors.red,
            fill: false,
            data: [40, 64, 22, 14, 5, 70, 63,19,4,22,33,44],
        }
        ]
    },

    // Configuration options go here
    options: {
      // responsive: true,
    }
});

 // end javascript chartjs

 //start javascript canvasjs.com
    
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  // title:{
  //   text: "State Operating Funds",
  //   fontFamily: "Titillium Web",
  //   fontColor: "#546c78",
  // },
  legend:{
    cursor: "pointer",
    itemclick: explodePie
  },
  data: [{
    type: "pie",
    showInLegend: true,
    toolTipContent: "{name}: <strong>{y}%</strong>",
    indexLabel: "{name} - {y}%",
    dataPoints: [
      { y: 55, name: "Android", color:window.chartColors.yellow, exploded: true },
      { y: 20, name: "IOS", color:window.chartColors.red },
      { y: 8, name: "BlackBerry", color:window.chartColors.blue },
      { y: 17, name: "Windows" , color:window.chartColors.green}
    ]
  }]
});
chart.render();
}

function explodePie (e) {
  if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
  } else {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
  }
  e.chart.render();

}
    //end javascript canvasjs.com





      </script>
    </body>
</html>