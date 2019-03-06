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
                     
                      <li >
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

                      <li class="active">
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
h4{
   font-size:14px;
   margin-left: 50px;
    }    
        
  input[type='text']{
      width: 500px;
      height: 33px;
      }
</style>
 <style type="text/css">
  
    .error{
        color: red;
        font-size: 12px;
      }
</style>

                          


  <div class="container">
    <div class="panel panel-default" style="border-color: #EC5247;  border-width: 2px;">
      <div class="panel-body">
         <div class="tab-content">
           <div class="tab-pane fade in active" id="home">
              <h3 class="head text-center">PERMANENT ADDRESS<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                <form method="POST" id="myForm" action="alumni_permanent_address_insert.php" enctype="multipart/form-data">
                          
            <h6 style="color: red;text-align: left; margin-left: 8px;">* Marked Fields Are Mandatory</h6>
              
  <div class="row">
        <div class="col-lg-6">
           <div class="form-group">
            <label class="control-label" for="at">AT : <span style="color:red;">*</span></label>
            <input type="text" name="at" class="form-control" id="at" placeholder="Enter your AT" required="">
           </div>
         <div class="form-group">
            <label class="control-label" for="post">Post : <span style="color:red;">*</span></label>
          <input type="text" name="post" class="form-control" id="post" placeholder="Enter your Post" required="">
         </div>
       </div>
           
 <div class="col-lg-6">
       <div class="form-group">
          <label class="control-label" for="via">Via :<span style="color:red;">*</span></label>
          <input type="text" class="form-control" id="via"" name="via"" placeholder="Enter your via" required="">
      </div>
       <div class="form-group">
          <label class="control-label" for="PS">Police Station :<span style="color:red;">*</span></label>
        <input type="text" class="form-control" id="PS"" name="PS"" placeholder="Enter your Police Station" required="">
      </div>
    </div>


     <div class="col-lg-6">
           <div class="form-group">
            <label class="control-label" for="city">City : <span style="color:red;">*</span></label>
            <input type="text" name="city" class="form-control" id="city" placeholder="Enter your City" required="">
           </div>
         <div class="form-group">
            <label class="control-label" for="District">District : <span style="color:red;">*</span></label>
          <input type="text" name="District" class="form-control" id="District" placeholder="Enter your District" required="">
         </div>
       </div>




     <div class="col-lg-6">
           <div class="form-group">
            <label class="control-label" for="pin">Pin : <span style="color:red;">*</span></label>
            <input type="text" name="pin" class="form-control" id="pin" placeholder="Enter your Pin" required="">
           </div>
         <div class="form-group">
            <label class="control-label" for="State">State : <span style="color:red;">*</span></label>
            <select name="State"  id="State" class="form-control" style=" width: 500px;height: 38px;">
                                  <option value="">Select Your State..</option>
                                  <option value="Odisha"> Odisha</option>
                                  <option value="Tamilnadu">Tamilnadu</option>
                                  <option value="Bihar">Bihar</option>
                                  <option value="West Bengal">West Bengal</option>
                                  <option value="Karnatak">Karnatak</option>
                                  <option value="Kolkata"> Kolkata</option>
                                  <option value="Kerla">Kerla</option>
                                  <option value="Uttarakhand">Uttarakhand</option>
                                  <option value="Jammu & Kasmir">Jammu & Kasmir</option>
                                  <option value="Himachal Pradesh"> Himachal Pradesh</option>
                                  <option value="Madhya pradesh">Madhya pradesh</option>
                                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                  <option value="Assam">Assam</option>
                                  <option value="Sikkim">Sikkim</option>
                                  <option value="Uttaranchal"> Uttaranchal</option>
                                  <option value="Tripura">Tripura</option>
                                  <option value="Nagaland">Nagaland</option>
                                  <option value="Mizoram">Mizoram</option>
                                  <option value="Meghalaya">Meghalaya</option>
                                  <option value="Andra Pradesh">Andra Pradesh</option>
                                  <option value="Chhattisgarh">Chhattisgarh</option>
                                  <option value="Goa">Goa</option>
                                  <option value="Gujarat">Gujarat</option>
                                  <option value="Jharkhand">Jharkhand</option>
                                  <option value="Maharashtra">Maharashtra</option>
                                  <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                  <option value="Chandigarh">Chandigarh</option>
                                  <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                  <option value="Daman and Diu">Daman and Diu</option>
                                  <option value="Delhi">Delhi</option>
                                  <option value="Lakshadeep">Lakshadeep</option>
                                  <option value="Pondicherry">Pondicherry</option>
                             
                                </select>
         
         </div>
       </div>

       <div class="col-lg-6">
           <div class="form-group">
            <label class="control-label" for="zone">Zone :<span style="color:red;">*</span> <span style=" font-size:12px">(East/West/North/South/Central)</span></label>
            <input type="text" name="zone" class="form-control" id="zone" placeholder="Enter your Zone" required="">
           </div>
         <div class="form-group">
            <label class="control-label" for="country">Country : <span style="color:red;">*</span></label>
          <input type="text" name="country" class="form-control" id="country" placeholder="Enter your country" required="">
         </div>
       </div>
 
    <div class="col-lg-6">
      <div class="form-group">
       <label class="control-label" for="Landline">Landline No :</label>
        <input type="text" name="Landline" class="form-control" id="Landline" placeholder="Enter your Landline No" >
      </div>
         
     </div>
    </div>

                              <center>
                              <input type="submit" name="submit" value="Submit"/>
                              <a class="btn btn-primary btn-md" href="alumni_permanent_address.php">Skip</a>
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



               

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
     
      <script type="text/javascript">


      //FORM VALIDATION//
       
        $("#myForm").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {


                  //father_name:"required",
                  at:{
                    required:true,
                   // alphabet:true
                  }, 
                  post:{
                    required:true,
                   // alphabet:true
                  },
                  via:{
                    required:true,
                   // alphabet:true
                  },
                  PS:{
                    required:true,
                  //  alphabet:true
                  },
                  city:{
                    required:true,
                 //   alphabet:true
                  },
                  District:{
                    required:true,
                 //   alphabet:true
                  },
                  
                  pin:{
                    required:true,
                    number:true
                  },
                   State:{
                    required:true,
                 //   alphabet:true
                  },

                  zone:{
                   required:true,
                 //  alphabet:true
                  },
                  country:{
                    required:true,
                  //  alphabet:true
                   }, 
                
                
                },


                messages: {
                  
                  at:{
                    required:"Please Enter Your AT. ",
                  //  alphabet:"Please Enter Alphabets."               
                  },                 
                  post:{
                    required:"Please Enter Your Post.  ",
                 //   alphabet:"Please Enter Alphabets."               
                  },
                  via:{
                    required:"Please Enter Your AT.",
                 //   alphabet:"Please Enter Alphabets." 
                  },
                  PS:{
                    required:"Please Enter Your AT.",
                 //   alphabet:"Please Enter Alphabets." 
                  },
                  city:{
                    required:"Please Enter Your City.",
                //    alphabet:"Please Enter Alphabets." 
                  },
                  District:{
                    required:"Please Enter Your District.",
                 //   alphabet:"Please Enter Alphabets."
                  },
                  
                  pin:{
                    required:"Please Enter Your Pin.",
                    number:"Please Enter Number." 
                  },
                 State:{
                 required:"Please Select Your State.",
                   
                  },
                 zone:{
                  required:"Please Enter Your Zone.",
               //    alphabet:"Please Enter Alphabets."
                  },
                 country:{
                   required:"Please Enter Your Country.",
                //   alphabet:"Please Enter Alphabets."
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