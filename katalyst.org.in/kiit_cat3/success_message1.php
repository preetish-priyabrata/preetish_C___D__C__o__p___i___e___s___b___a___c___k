<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
//   $(window).load(function()
// {
   
//     //window.setTimeout(window.location.href = "career_page23.php",1000000);
// });



  

$(document).ready(function() {  
   $('#myModal').modal('show');
    window.setInterval(function() {
    var timeLeft    = $("#timeLeft").html();                                
        if(eval(timeLeft) == 0){
                window.location= ("enroll.php");                 
        }else{              
            $("#timeLeft").html(eval(timeLeft)- eval(1));
        }
    }, 1000); 
});   
</script>
<style type="text/css">
  #container {
    width: 100%;
    height: 100%;
    position: absolute;
    visibility:hidden;
    display:none;
    background-color: rgba(22,22,22,0.5);
}

#container:target {
    visibility: visible;
    display: block;
}
.reveal-modal {
    background:#e1e1e1; 
    margin: 0 auto;
    width:160px; 
    position:relative; 
    z-index:41;
    top: 25%;
    padding:30px; 
    -webkit-box-shadow:0 0 10px rgba(0,0,0,0.4);
    -moz-box-shadow:0 0 10px rgba(0,0,0,0.4); 
    box-shadow:0 0 10px rgba(0,0,0,0.4);
}
</style>
</head>
<body>
<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">You will be redirect to actual Page After  <span style="color: red" id="timeLeft">20</span> Seconds Thanks</h4>
        </div>
        <div class="modal-body">
          
          <?php 
          $s=$_REQUEST['s'];
          if($s=='1'){?>
          <div class="alert alert-success">
            <strong>Success!</strong> Thank You For Registration .
            </div>     
          <?php }else if($s=='2'){?>
          <div class="alert alert-warning">
            <strong>Warning!</strong>Seat Is Full This Batch Please Try Others!!!
          </div>
         <?php }else{?>
          <div class="alert alert-danger">
            <strong>Error!</strong>Your Ip Is In Montoring Purpose Send To Admin
          </div>
         <?php }?>
              
        </div>
        <div class="modal-footer">
          <a href="enroll.php" class="btn btn-success" >For More Visit Our Registration Page </a>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>