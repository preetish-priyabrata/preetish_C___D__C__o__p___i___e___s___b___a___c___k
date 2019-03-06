var input = $('#input-a');
input.clockpicker({
    autoclose: true,
    beforeHourSelect: function() {
    	//alert("before hour selected");
    },
    afterHourSelect: function() {
    	//alert("after hour selected");
    },
    beforeDone: function() {
    //	alert("before done");
    },
    afterDone: function() {
    	
    	//alert("after done");
     chac();

      var input2 = $('#input-b');
      	
				input2.clockpicker(
        {
        	autoclose: true,
          afterDone: function() {
    	
    			alert("after done");
      		chac();
          }
        });
    }
});

var mornFromTime = document.user_registration.mornFromHour.value + document.user_registration.mornFromMin.value;
    var mornToTime = document.user_registration.mornToHour.value + document.user_registration.mornToMin.value;
    var evenFromTime = document.user_registration.evenFromHour.value + document.user_registration.evenFromMin.value;
    var evenToTime = document.user_registration.evenToHour.value + document.user_registration.evenToMin.value;
if (mornFromTime > mornToTime) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Prefered morning call time seems to be invalid.";
        document.user_registration.mornToMin.focus();
        return false;
    } else if (evenFromTime > evenToTime) {
        document.getElementById("message_box").style.display = 'block';
        document.getElementById("message_box").innerHTML = "Prefered evening call time seems to be invalid.";
        document.user_registration.evenToMin.focus();
        return false;
    }
function chac(){
var mids=$('#input-a').val();
var mids3=$('#input-b').val();
var fields = mids.split(/:/);
var fields2 = mids3.split(/:/);
if(mids!="" && mids3!=""){
if(parseInt(fields[0])==parseInt(fields2[0]) ){
alert('eq');
}else if( parseInt(fields[0])<=parseInt(fields2[0])){ //when 10:00 from 11:00
alert('oh');

}else{ //when 10:00 from to is 8:00

alert('miss');
}
alert(mids);
alert(mids3);
var d = new Date(mids);
 var n = d.getHours();
 document.getElementById("demo").innerHTML = n;
 }else{
 	if(mids==""){
  	alert('blank');
    
  }
  if(mids3==""){
  alert('blank2');
  }
 }
}
// Manual operations
$('#button-a').click(function(e){
    // Have to stop propagation here
    e.stopPropagation();
    input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
});
$('#button-b').click(function(e){
    // Have to stop propagation here
    e.stopPropagation();
    input.clockpicker('show')
            .clockpicker('toggleView', 'hours');
});