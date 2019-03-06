<?php
// print_r($_REQUEST);exit;
// Array ( [challen] => chal_791238 [indent] => ind001 ) 
session_start();
ob_start();
if(isset($_SESSION['email'])){
  require 'config.php';
  $user_id=$_SESSION['email'];
  $sql_flag="SELECT * FROM `profile_table_flag` WHERE `user_id`='$user_id'";
  $sql_flag_exe=mysqli_query($conn,$sql_flag);
  $fetch=mysqli_fetch_assoc($sql_flag_exe);

  ?>


<!-- design -->
<section >
     <div class="container">
        <div class="row">
            <div class="board">
                <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                <div class="board-inner" style="margin-top: -165px; margin-left: 16px; width: 102%;">
                    <ul class="nav nav-tabs" id="myTab">
                      <div class="liner"></div>
                      <?php
                      // if($fetch['status']!="0"){

                      if($fetch['personal_profile']!="1"){?>
                      <li>
                        <a href="alumni_personal_profile.php"  title="Personal Profile">
                            <span class="round-tabs one">
                                  <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span> 
                        </a>
                      </li>
                      <?php
                      }else{?>
                        <li class="active">
                        <a href="#"  title="Personal Profile">
                            <span class="round-tabs one">
                                  <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </span> 
                        </a>
                      </li>
                      <?php }
                      if($fetch['family_profile']!="1"){?>
                   
                      <li >
                        <a href="alumni_family_profile.php"  title="Family Profile">
                          <span class="round-tabs two">
                              <i class="fa fa-users" aria-hidden="true"></i>
                          </span> 
                    </a>
                    </li>
                    <?php }else{?>
                    <li>
                        <a href="#"  title="Family Profile">
                          <span class="round-tabs two">
                              <i class="fa fa-users"></i>
                          </span> 
                    </a>
                    </li>
                    <?php }
                    if($fetch['present_address']!="1"){
                    ?>
                    <li>
                      <a href="alumni_present_address.php"  title="Present Address">
                          <span class="round-tabs three">
                                <i class="fa fa-address-card" aria-hidden="true"></i>
                          </span> 
                        </a>
                      </li>
                      <?php }else{
                        ?> 
                        <li>
                      <a href="#"  title="Present Address">
                          <span class="round-tabs three">
                                <i class="fa fa-address-card" aria-hidden="true"></i>
                          </span> 
                        </a>
                        </li>
                        <?php
                        }
                        if($fetch['permanent_address']!="1"){
                        ?>

                      <li>
                        <a href="alumni_permanent_address.php"  title="Permanent Address">
                            <span class="round-tabs four">
                                  <i class="fa fa-address-card" aria-hidden="true"></i>
                            </span> 
                        </a>
                      </li>
                      <?php }else{ ?>
                      <li>
                        <a href="alumni_permanent_address.php"  title="Permanent Address">
                            <span class="round-tabs four">
                                  <i class="fa fa-address-card" aria-hidden="true"></i>
                            </span> 
                        </a>
                      </li>
                       <?php 
                        }
                      // }
                      ?>
                      <li>
                        <a href="#doner" title="completed">
                            <span class="round-tabs five">
                                  <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                            </span>
                          </a>
                      </li>
                     
                    </ul>
                </div>
<style type="text/css">
  

  h4{
   font-size:15px;
   margin-left: 50px;
    }    
        
  input[type='text']{
      width: 500px;
      height: 34px;
      }
</style>
<style type="text/css">
 
     .error{
        color: red;
        font-size: 12px;
      }
</style>





   <div class="container">
       <div class="panel panel-default" style="border-color: #26f337;  border-width: 2px;">
         <div class="panel-body">
           <div class="tab-content">
             <div class="tab-pane fade in active" id="home">
                <h3 class="head text-center">PERSONAL PROFILE<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                    <!-- <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                    </p> -->
                    
              <form  id="myform1" method="POST" action="alumni_personal_profile_insert.php" enctype="multipart/form-data">
              <h6 style="color: red;text-align: left; margin-left: 8px;">* Marked Fields Are Mandatory</h6>
              

   <div class="row">
     <div class="col-lg-6">
        <div class="form-group">
          <label class="control-label" for="pass_year">Passing Year :<span style="color:red;">*</span></label>
            <input type="text" name="pass_year" class="form-control" id="pass_year" placeholder="Enter Your Passing Year" required="">
         </div>
        <div class="form-group">
          <label class="control-label" for="alumni_name">Name Of the Alumni :<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="alumni_name"" name="alumni_name"" placeholder="Enter Your Name" required="">
        </div>
     </div>

      <div class="col-lg-6">
        <div class="form-group">
          <label class="control-label" for="occupation">Current Occupation :<span style="color:red;">*</span></label>
            <input type="text" name="occupation" class="form-control" id="occupation" placeholder="Enter your occupation" required="">
        </div>
      <div class="form-group">
          <label class="control-label" for="designation">Designation :<span style="color:red;">*</span></label>
            <input type="text" class="form-control" id="designation"" name="designation"" placeholder="Enter your designation " required="">
      </div>
     </div>


     <div class="col-lg-6">
        <div class="form-group">
          <label class="control-label" for="employer">Name Of The Employer :<span style="color:red;">*</span></label>
           <input type="text" name="employer" class="form-control" id="employer" placeholder="Enter your employer" required="">
        </div>
         <div class="form-group">
          <label class="control-label" for="gen">Gender :<span style="color:red;">*</span></label><br>
           <label> Male : <input type="radio" name="gen" id="gen"  value="Male" ></label>
             <label>  Female : <input type="radio" name="gen"  id="gen"  value="Female" ></label>
             
      </div>
    
    </div>

    <div class="col-lg-6">
       <div class="form-group">
           <label class="control-label" for="ph_no">Mobile No :<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="ph_no"" name="ph_no"" placeholder="Enter your phone no " required="">
      </div>
    <div class="form-group">
        <label class="control-label" for="alter">Alternative Mobile No :</label>
           <input type="text" class="form-control" id="alter"" name="alter"" placeholder="Enter your alternative phone no " required="">
      </div>
    </div>

   
<div class="col-lg-6">
 <div class="form-group">
        <label class="control-label" for="email_id">Personal E-mail id :<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="email_id"" name="email_id"" placeholder="Enter your email_id " required="" >
      </div>
       <div class="form-group">
          <label class="control-label" for="ofc_email">Official E-mail id :</label>
             <input type="text" name="ofc_email" class="form-control" id="ofc_email" placeholder="Enter your Office Email Id" >
       </div>
      
    </div>
    

  
    <div class="col-lg-6">
       <div class="form-group">
           <label class="control-label" for="Landline">Landline No :</label>
              <input type="text" name="Landline" class="form-control" id="Landline" placeholder="Enter your Landline No">
        </div>
       <div class="form-group">
        <label class="control-label" for="Co-curricular">Co-curricular Activity :</label>
           <input type="text" name="Co-curricular" class="form-control" id="Co-curricular" placeholder="Enter your Co-curricular Activity " >
      </div>
   </div>
 
   <div class="col-lg-6">
    
         <div class="form-group">
          <label class="control-label" for="awards">Awards / Accolades :</label>
             <input type="text" class="form-control" id="awards"" name="awards"" placeholder="Enter your Awards / Accolades" >
       </div>
      <div class="form-group">
        <label class="control-label" for="marry" required="">Marital Status :<span style="color:red;">*</span></label><br>
          <label>Yes <input type="radio"  id="marry" name="marry" value="yes" onclick="show_date(this.value)"></label>
          <label>  No <input type="radio"  id="marry"  name="marry" value="no" onclick="show_date(this.value)" > </label>
          <span id="mdate_spn"  style="display:none">
         <b> If You Married Then Enter Date :</b><br>
          <input type="date" name="mrg_anni" placeholder="mm/dd/yyyy" width="200px" height="30px" required="";>
          </span>
      </div> 
    </div>

      <div class="col-lg-6"> 
        <div class="form-group">
          <label class="control-label" for="tribe">Tribe : <span style="color:red;">*</span></label>
            <input type="text" name="tribe" class="form-control" id="tribe" placeholder="Enter your tribe" required="">
        </div>
      <div class="form-group">
         <label class="control-label" for="sports">Sports Participated(if any) :</label>
        <input type="text" class="form-control" id="sports"" name="sports"" placeholder="Enter your Sports Participated" >
    </div>
    
   </div>
      <div class="col-lg-6"> 
     <div class="form-group">
            <label class="control-label" for="dob">Date Of Birth : <span style="color:red;">*</span></label>
             <input type="text" name="dob" class="form-control" id="dob" placeholder="Enter your DOB" required="">
        </div>
        </div>
</div>
<br>


 <center>
   <input type="submit" name="submit" value="save"/>
    <a class="btn btn-primary btn-md" href="alumni_family_profile.php">Skip</a>
</center> 
          
       <br>
         </form>
        </div>
      </div>
    </div>
  </div>
</div>

</section>


<?php
  }else{
    header('Location:logout.php');
    exit;
  }
  $contents = ob_get_contents();
  ob_clean();
  include 'alumni_template.php';
 

?>



<script>
function show_date(value){
  //alert(value);
   var x = document.getElementById('mdate_spn');
  if(value=="yes"){
     x.style.display = 'block';
  }
  else{
    x.style.display = 'none';
  }

}
</script>


      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">


      //FORM VALIDATION//
       
        $("#myform1").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {
                 // pass_year:"required",
                  pass_year:{
                     required:true,
                    
                  }, 
                  alumni_name:{
                    required:true,
                    //alphabet:true
                  },
                  occupation:{
                    required:true,
                   // alphabet:true
                  },

                  designation:{
                    required:true,
                   // alphabet:true
                  },

                  employer:{
                    required:true,
                    //alphabet:true

                  },

                  tribe:{
                    required:true,
                    
                  },

                  ph_no:{
                    required:true,
                     number:true
                  },
                  email_id:{
                    required:true,
                    email:true

                 },

                

                 

                },
                messages: {

                  pass_year:{
                     required:"Please Enter Your Passing Year.",
                    
                  },
                  
                 alumni_name:{
                    required:"Please Enter Your Name.",
                    //alphabet:true
                  },              
                 occupation:{
                    required:"Please Enter Your Occupation.",
                   // alphabet:true
                  },
                 
                  designation:{
                    required:"Please Enter Your Designation.",
                   // alphabet:true
                  },
                   employer:{
                    required:"Please Enter Your Employer.",
                    //alphabet:true

                  },

                  tribe:{
                    required:"Please Enter Your Tribe.",
                    
                  },

                  ph_no:{
                    required:"Please Enter Your Phone No.",
                     number:"Please Enter Numbers."
                  },
                  email_id:{
                    required:"Email Id Should Left Blank.",
                    email:"Please put vaild email."
                 },


              },
             
          
          //         submitHandler: function(form) {
          //   form.submit();
          // }
               
            })
        jQuery.validator.setDefaults({
          debug: true,
          // success: "valid"
        });

        </script>       

<!-- 
<script type="text/javascript">
	$(function(){
$('a[title]').tooltip();
});

</script> -->