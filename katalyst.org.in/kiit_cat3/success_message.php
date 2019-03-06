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
                window.location= ("http://innovadorslab.co.in/kiit_cat3/enroll.php");                 
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
          include './conf.php';
          $s=$_REQUEST['s'];
          if($s=='1'){
            $ids=$_REQUEST['id']; 

            ?>
          <div class="alert alert-success">
            <strong>Success!</strong> Thank You For Registration .
            </div>  


           <?php }else if($s=='11'){
              $ids=$_REQUEST['id']; 
            ?>
          <div class="alert alert-warning">
            <strong>Warning!</strong>Transaction Failed !!!.
          </div>   
          <?php }else if($s=='2'){?>
          <div class="alert alert-warning">
            <strong>Warning!</strong>Failure!!Try again.
          </div>
         <?php }else{?>
          <div class="alert alert-danger">
            <strong>Error!</strong>Your Ip Is In Montoring Purpose Send To Admin
          </div>
         <?php }?>
              
        </div>
        <div class="modal-footer">
          <a href="http://innovadorslab.co.in/kiit_cat3/" class="btn btn-success" >For More Visit Our Home Page </a>
        </div>
      </div>
      
    </div>
  </div>
  <style type="text/css">
   /* body { 
  background: #f0f0f0 url('http://s22.postimg.org/3l1gnfmwd/image.gif'); 
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: #313131;
  font-size: 62.5%; 
  line-height: 1; 
}*/

::selection { background: #a4dcec; }
::-moz-selection { background: #a4dcec; }
::-webkit-selection { background: #a4dcec; }

::-webkit-input-placeholder { /* WebKit browsers */
  color: #ccc;
  font-style: italic;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
  color: #ccc;
  font-style: italic;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
  color: #ccc;
  font-style: italic;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
  color: #ccc !important;
  font-style: italic;  
}

br { display: block; line-height: 2.2em; } 

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

#topbar {
  background: #4f4a41;
  padding: 10px 0 10px 0;
  text-align: center;
}

#topbar a {
  color: #fff;
  font-size:1.3em;
  line-height: 1.25em;
  text-decoration: none;
  opacity: 0.5;
  font-weight: bold;
}

#topbar a:hover {
  opacity: 1;
}

/** typography **/
h1 {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 2.5em;
  line-height: 1.5em;
  letter-spacing: -0.05em;
  margin-bottom: 20px;
  padding: .1em 0;
  color: #444;
    position: relative;
  overflow: hidden;
  white-space: nowrap;
  text-align: center;
}
h1:before,
h1:after {
  content: "";
  position: relative;
  display: inline-block;
  width: 50%;
  height: 1px;
  vertical-align: middle;
  background: #f0f0f0;
}
h1:before {    
  left: -.5em;
  margin: 0 0 0 -50%;
}
h1:after {    
  left: .5em;
  margin: 0 -50% 0 0;
}
h1 > span {
  display: inline-block;
  vertical-align: middle;
  white-space: normal;
}

p {
  display: block;
  font-size: 1.35em;
  line-height: 1.5em;
  margin-bottom: 22px;
}


/** page structure **/
#w {
  display: block;
  width: 950px;
  margin: 0 auto;
  padding-top: 30px;
}

#content {
  display: block;
  width: 100%;
  background: #fff;
  padding: 25px 20px;
  padding-bottom: 35px;
  -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
  -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
}


.flatbtn {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: inline-block;
  outline: 0;
  border: 0;
  color: #f9f8ed;
  text-decoration: none;
  background-color: #b6a742;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  font-size: 1.2em;
  font-weight: bold;
  padding: 12px 22px 12px 22px;
  line-height: normal;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  text-transform: uppercase;
  text-shadow: 0 1px 0 rgba(0,0,0,0.3);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3);
  -moz-box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3);
  box-shadow: 0 1px 0 rgba(15, 15, 15, 0.3);
}
.flatbtn:hover {
  color: #fff;
  background-color: #c4b237;
}
.flatbtn:active {
  -webkit-box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);
  -moz-box-shadow:inset 0 1px 5px rgba(0, 0, 0, 0.1);
  box-shadow:inset 0 1px 5px rgba(0, 0, 0, 0.1);
}

/** notifications **/
.notify {
  display: block;
  background: #fff;
  padding: 12px 18px;
  max-width: 400px;
  margin: 0 auto;
  cursor: pointer;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  margin-bottom: 20px;
  box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 2px 0px;
}

.notify h1 { margin-bottom: 6px; }

.successbox h1 { color: #678361; }
.errorbox h1 { color: #6f423b; }

.successbox h1:before, .successbox h1:after { background: #cad8a9; }
.errorbox h1:before, .errorbox h1:after { background: #d6b8b7; }

.notify .alerticon { 
  display: block;
  text-align: center;
  margin-bottom: 10px;
}
  </style>
    <?php 
    if($s=='1'){
     $P_slno = decryptIt_webs(str_replace(" ", "+", $ids));

     $get_details="SELECT * FROM `tbl_payment_details` WHERE `P_slno`='$P_slno' ";
     $sql_get_details=mysqli_query($con,$get_details);
     $fetch_get_details=mysqli_fetch_assoc($sql_get_details);
     $P_BillingName=$fetch_get_details['P_BillingName'];
     $P_Amount=$fetch_get_details['P_Amount'];
     $P_MerchantRefNo=$fetch_get_details['P_MerchantRefNo'];
     $P_ResponseMessage=$fetch_get_details['P_ResponseMessage'];


      $get_enroll="SELECT * FROM `tbl_enrollment` WHERE `reference_id`='$P_MerchantRefNo' ";
      $sql_enroll=mysqli_query($con,$get_enroll);
      
      $fetch_enroll=mysqli_fetch_assoc($sql_enroll);

      $stud_course=$fetch_enroll['student_course'];
      $batch_id=$fetch_enroll['course_batch_id'];
      
      $batch_query="SELECT * FROM `tbl_batch` WHERE `course_id`='$stud_course'  and `sl_no`='$batch_id'";
      $batch_sql_exe=mysqli_query($con,$batch_query);  
      $res_list=mysqli_fetch_assoc($batch_sql_exe);  

      $course_ids=$stud_course; 
      $course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_ids'";
      $sql_exe_course=mysqli_query($con,$course_list);
      $res_course=mysqli_fetch_assoc($sql_exe_course);
      $student_course=$res_course['course_name'];                            
      ?>
    <div id="w">
    <div id="content">
      <!-- Icons source http://dribbble.com/shots/913555-Flat-Web-Elements -->
      <div class="notify successbox">
        <h1>Success!</h1>
        <span class="alerticon"><img src="http://s22.postimg.org/i5iji9hv1/check.png" alt="checkmark" /></span>
        <fieldset>
          <table width="90%" border="0">
            <tr>
              <td>Student Name</td>
              <td> : </td>
              <td><?=$P_BillingName?></td>
            </tr>
            <!-- name -->
            <tr>
              <td>Program Name</td>
              <td> : </td>
              <td><?=$student_course?></td>
            </tr>
            <!-- course -->
            <tr>
              <td>Batch Name</td>
              <td> : </td>
              <td>
                <?php echo $res_list['batch_name']?><br>
                 <div class="row">
                  <div class="col-md-4">
                    <label ><strong>Timing </strong></label> : 
                  </div>
                  <div class="col-md-8">
                    <b><?php echo $res_list['start_time']?> - <?php echo $res_list['end_time']?></b><br>
                  </div>
                </div>
                  <div class="row">
                  <div class="col-md-4">
                    <label ><strong>Days</strong> </label> : 
                  </div>
                  <div class="col-md-8">
                    <?php 
                                  $days=unserialize($res_list['days']); 
                                    for ($i=0; $i < count($days); $i++) { ?>
                                      <b ><?php echo $days[$i]?></b>
                                  <?php 
                                    }
                                  ?>
                                  <br>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <label ><strong>Venue</strong> </label> :
                  </div>
                  <div class="col-md-8">
                   <b><?php echo $res_list['venue']?></b><br>
                  </div>
                </div>            
                  
                
              </td>
            </tr>
            <!-- batch -->
            <tr>
              <td>Program Fee</td>
              <td> : </td>
              <td><?=$P_Amount?></td>
            </tr>
            <!-- fee  -->
            <tr>
              <td>Message</td>
              <td> : </td>
              <td><?=$P_ResponseMessage?></td>
            </tr>
            <!-- message -->
            <tr>
              <td>Tranaction Id</td>
              <td> : </td>
              <td><?=$P_MerchantRefNo?></td>
            </tr>
            <!--tranaction id  -->
            
          </table>
        </fieldset>

      </div>
    </div>
  </div>
      <!-- <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-body">
                
              </div>
            </div>
          </div>
      </div> -->

    <?php

    }else if ($s=='11') {
      $P_slno = decryptIt_webs(str_replace(" ", "+", $ids));

     $get_details="SELECT * FROM `tbl_payment_details` WHERE `P_slno`='$P_slno' ";
     $sql_get_details=mysqli_query($con,$get_details);
     $fetch_get_details=mysqli_fetch_assoc($sql_get_details);
     $P_BillingName=$fetch_get_details['P_BillingName'];
     $P_Amount=$fetch_get_details['P_Amount'];
     $P_MerchantRefNo=$fetch_get_details['P_MerchantRefNo'];
     $P_ResponseMessage=$fetch_get_details['P_ResponseMessage'];


      $get_enroll="SELECT * FROM `tbl_enrollment` WHERE `reference_id`='$P_MerchantRefNo' ";
      $sql_enroll=mysqli_query($con,$get_enroll);
      
      $fetch_enroll=mysqli_fetch_assoc($sql_enroll);

      $stud_course=$fetch_enroll['student_course'];
      $batch_id=$fetch_enroll['course_batch_id'];
      
      $batch_query="SELECT * FROM `tbl_batch` WHERE `course_id`='$stud_course'  and `sl_no`='$batch_id'";
      $batch_sql_exe=mysqli_query($con,$batch_query);  
      $res_list=mysqli_fetch_assoc($batch_sql_exe);  

      $course_ids=$stud_course; 
      $course_list="SELECT * FROM `tbl_course` WHERE `sl_no`='$course_ids'";
      $sql_exe_course=mysqli_query($con,$course_list);
      $res_course=mysqli_fetch_assoc($sql_exe_course);
      $student_course=$res_course['course_name'];                            
      ?>
    <div id="w">
    <div id="content">
      <!-- Icons source http://dribbble.com/shots/913555-Flat-Web-Elements -->
      <div class="notify errorbox">
        <h1>Warning!</h1>
        <span class="alerticon"><img src="http://s22.postimg.org/ulf9c0b71/error.png" alt="error" /></span>
        <fieldset>
          <table width="80%" border="0">
            <tr>
              <td>Student Name</td>
              <td> : </td>
              <td><?=$P_BillingName?></td>
            </tr>
            <!-- name -->
            <tr>
              <td>Program Name</td>
              <td> : </td>
              <td><?=$student_course?></td>
            </tr>
            <!-- course -->
            
            <tr>
              <td>Program Fee</td>
              <td> : </td>
              <td><?=$P_Amount?></td>
            </tr>
            <!-- fee  -->
            <tr>
              <td>Message</td>
              <td> : </td>
              <td><?=$P_ResponseMessage?></td>
            </tr>
            <!-- message -->
            <tr>
              <td>Tranaction Id</td>
              <td> : </td>
             <td><?=$P_MerchantRefNo?></td>
            </tr>
            <!--tranaction id  -->
            
          </table>
        </fieldset>

      </div>
    </div>
  </div>

    <?php
      
    }
    ?>
</div>

</body>
</html>