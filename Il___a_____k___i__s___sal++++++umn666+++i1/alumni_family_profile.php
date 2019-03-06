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
<link rel="stylesheet" type="text/css" href="css/template.css">
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
                      

                      if($fetch['personal_profile']!="1"){?>
                      <li >
                        <a href="alumni_personal_profile.php"  title="Personal Profile">
                            <span class="round-tabs one">
                                  <i class="fa fa-user-circle-o"></i>
                            </span> 
                        </a>
                      </li>
                      <?php
                      }else{?>
                        <li>
                        <a href="#"  title="Personal Profile">
                            <span class="round-tabs one">
                                  <i class="fa fa-user-circle-o"></i>
                            </span> 
                        </a>
                      </li>
                      <?php }
                      if($fetch['family_profile']!="1"){?>
                      
                      <li class="active">
                        <a href="alumni_family_profile.php"  title="Family Profile">
                          <span class="round-tabs two">
                              <i class="fa fa-users"></i>
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
 /* .table{
background-color:#98F398;
      padding: 20px;
      margin-left: 100px;
      border-radius:10px; 
      }*/

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
  .table{
background-color:#98F398;
      padding: 20px;
      /*margin-left: 100px;*/
      border-radius:10px; 
      }.error{
        color: red;
        font-size: 12px;
      }
</style>




     <div class="container">
       <div class="panel panel-default" style="border-color: #EFA907;  border-width: 2px;">
         <div class="panel-body">
            <div class="tab-content">

                    <div class="tab-pane fade in active" id="home">
                      <h3 class="head text-center">FAMILY PROFILE<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                        <!-- <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                        </p> -->
                      <form method="POST" id="myForm" action="alumni_family_profile_insert.php" enctype="multipart/form-data">
                          

  <h6 style="color: red;text-align: left; margin-left: 8px;">* Marked Fields Are Mandatory</h6>
              


            
    <div class="row">

      <div class="col-lg-6">
          <div class="form-group">
            <label class="control-label" for="father_name">Father's Name : <span style="color:red;">*</span></label>
              <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter your Father's Name" required="">
          </div>
        <div class="form-group">
          <label class="control-label" for="father_occupation">Occupation : <span style="color:red;">*</span></label>
            <input type="text" name="father_occupation" class="form-control" id="father_occupation" placeholder="Enter your Father's Occupation " required="">
        </div>
      </div>
           

     <div class="col-lg-6">
         <div class="form-group">
           <label class="control-label" for="mother_name">Mother's Name :<span style="color:red;">*</span></label>
             <input type="text" class="form-control" id="mother_name" name="mother_name"" placeholder="Enter your Mother's Name" required="">
           </div>
           
        <div class="form-group">
          <label class="control-label" for="mother_occupation">Occupation :<span style="color:red;">*</span></label>
           <input type="text" class="form-control" id="mother_occupation"" name="mother_occupation"" placeholder="Enter your Mother's Occupation" required="">
      </div>
     </div>
   

  
      <div class="col-lg-6">
        <div class="form-group">
          <label class="control-label" for="father_designation">Designation : <span style="color:red;">*</span></label>
              <input type="text" name="father_designation" class="form-control" id="father_designation" placeholder="Enter your Father's Designation " required="">
         </div>
        <div class="form-group">
          <label class="control-label" for="father_mob_no">Mobile No : <span style="color:red;">*</span></label>
            <input type="text" name="father_mob_no" class="form-control" id="father_mob_no" placeholder="Enter your Father's Mobile No " required="">
        </div>
     </div>



    
    <div class="col-lg-6">
       <div class="form-group">
          <label class="control-label" for="mother_designation">Designation :<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="mother_designation"" name="mother_designation"" placeholder="Enter your Mother's Designation" required="">
      </div>
       <div class="form-group">
          <label class="control-label" for="mother_mob_no">Mobile No :<span style="color:red;">*</span></label>
        <input type="text" class="form-control" id="mother_mob_no"" name="mother_mob_no"" placeholder="Enter your Mother's Mobile No" required="">
      </div>
    </div>

    <div class="col-lg-6">
       <div class="form-group">
          <label class="control-label" for="father_land_ph_no">Landline No :</label>
          <input type="text" class="form-control" id="father_land_ph_no"" name="father_land_ph_no"" placeholder="Enter your Father's Landline No" >
      </div>
       <div class="form-group">
          <label class="control-label" for="father_email">E-mail id (if any) :</label>
        <input type="text" class="form-control" id="father_email"" name="father_email"" placeholder="Enter your Father's E-mail id" >
      </div>
    </div>

    <div class="col-lg-6">
       <div class="form-group">
          <label class="control-label" for="mother_land_ph_no">Landline No :</label>
          <input type="text" class="form-control" id="mother_land_ph_no"" name="mother_land_ph_no"" placeholder="Enter your Mother's Landline No" >
      </div>
       <div class="form-group">
          <label class="control-label" for="mother_email">E-mail id (if any) :</label>
        <input type="text" class="form-control" id="mother_email"" name="mother_email"" placeholder="Enter your Mother's E-mail id" >
      </div>
    </div>



</div>


<center>
<input type="submit" name="submit" value="save"/>
      <a class="btn btn-primary btn-md" href="alumni_present_address.php">Skip</a>
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




                   <!-- ends -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">


      //FORM VALIDATION//
       
        $("#myForm").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {


                  //father_name:"required",
                   father_name:{
                    required:true,
                    //alphabet:true
                  }, 
                  father_occupation:{
                    required:true,
                    //alphabet:true
                  },
                  mother_name:{
                    required:true,
                   // alphabet:true
                  },

                  mother_occupation:{
                    required:true,
                   // alphabet:true
                  },

                  father_designation:{
                    required:true,
                    //alphabet:true

                  },

                  father_mob_no:{
                    required:true,
                    number:true
                  },

                  mother_designation:{
                    required:true,
                   // alphabet:true 
                 },
                  mother_mob_no:{
                    required:true,
                    number:true

                 },

                

                },
                messages: {
                  
                  father_name:{
                    required:"Please Enter Your Father Name.",
                    //alphabet:"Please Enter Alphabets"               
                  },                 
                  father_occupation:{
                    required:"Please Enter Your Father occupation.  ",
                    //alphabet:"Please Enter Alphabets"               
                  },
                  mother_name:{
                    required:"Please Enter Your Mother Name.",
                   // alphabet:"Please Enter Alphabets"               
                  },

                   mother_occupation:{
                    required:"Please Enter Your Mother Occupation.",
                   // alphabet:"Please Enter Alphabets" 
                  },
                  father_designation:{
                     required:"Please Enter Your Father's Designation.",
                    // alphabet:"Please Enter Alphabets"
                  },

                  father_mob_no:{
                    required:"Please Enter Father's Contact No.",
                    number:"Please Enter Numbers"               
                  },

                  mother_designation:{
                    required:"Please Enter Your Mother's Designation.",
                   // alphabet:"Please Enter Alphabets"
                   },

                  mother_mob_no:{
                     required:"Please Enter Mother's Contact No.",
                     number:"Please Enter Numbers"               
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


<script type="text/javascript">
	$(function(){
$('a[title]').tooltip();
});

</script>