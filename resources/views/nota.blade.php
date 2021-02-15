



<div id="notifika">{{ $data }}</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ URL::asset('StreamLab/StreamLab.js') }}"></script>



<script type="text/javascript">
    
var message, showDiv=$('#notifika');    
var slh = new StreamLabHtml()
var sls = new StreamLabSocket({
   appId:"{{ config('stream_lab.app_id') }}",
   channelName:"jarbi",
   event:"AddPost"
 });


sls.socket.onmessage = function(res){
  ///res is data send from our api
  ///set this data to our class so you can use our helper function 
  var kaka=slh.setData(res); 
   

     // console.log(slh.getSource());

if (slh.getSource() ==='messages') {
console.log(message);
 message=slh.getMessage();
 showDiv.prepend('<li>'+message+'</li>');
}



}



</script>