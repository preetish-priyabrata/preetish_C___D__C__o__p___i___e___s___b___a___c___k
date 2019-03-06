<?php 

ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
?>
<script type="text/javascript">
     function PreviewImage() {

      var oFReader = new FileReader();

      oFReader.readAsDataURL(document.getElementById("c_photo").files[0]);

    

      oFReader.onload = function(oFREvent) {

        document.getElementById("photopreview").src = oFREvent.target.result;

      };

      };
      
      </script>
          <script>

     function PreviewSign() {

      var oFReader = new FileReader();

      oFReader.readAsDataURL(document.getElementById("sign").files[0]);

    

      oFReader.onload = function(oFREvent) {

        document.getElementById("signpreview").src = oFREvent.target.result;

      };

      };
</script>
<div class="container">
<div class="row">
  <div class="text-center">
      <?php $msg->display(); ?>
    </div>
<div class="col-md-12 col-sm-12">
	  <!-- Basic input requireds -->
<div class="panel panel-danger">
<div class="panel-heading">

<div class="container">
  <center><h2><b>Application Form</b></h2></center><br><br>
  <form class="" action="exam_application_form_save.php" method="POST" enctype="multipart/form-data">
  	<!--  <div class="form-group">
      <label for="name">Post Applied For:</label>
       <div class="col-sm-7">
        1. Teacher : Yes <input required type="radio" name="remember"> 
                         No <input required type="radio" name="remember"> 
                       <br>

        2. Lecture : Yes <input required type="radio" name="remember1"> 
                         No <input required type="radio" name="remember1"> 
                       <br>
        3. Teacher : Yes <input required type="radio" name="remember2"> 
                         No <input required type="radio" name="remember2"> 
                       <br>
 	    4. Lecture : Yes <input required type="radio" name="remember3"> 
                         No <input required type="radio" name="remember3"> 
                       <br>
      </div>
    </div> -->

 	<div class="form-group">
      <label  for="candidate_photo"> Candidate Photo:</label>
      <div class="col-sm-7">
       <input required type="file" id="c_photo" onChange="PreviewImage();"  name="candidate_photo">
      
       
      	
         
      </div>
      <div class="pull-right" style="margin-top: -62px;   margin-bottom: 30px;">
      <img src="image/"  width="150"  height="150" id="photopreview" name="photopreview">
    </div>
    </div>
      
   
    <div class="form-group">
      <label for="candidate_name"> Name Of The Candidate:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_name" placeholder="Enter Name Of The Candidate " name="candidate_name">
      </div>
     
    </div>
      <div class="form-group">
      <label for="candidate_father_name">Father Name:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_father_name" placeholder="Enter Father Name" name="candidate_father_name">
      </div>
    </div>
    <div class="form-group">
      <label for="candidate_husband_name">If Married ,Husband Name:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_husband_name" placeholder="Enter Husband Name" name="candidate_husband_name">
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_dob">Date Of Birth:</label>
      <div class="col-sm-7">
     
        <input required class="form-control" id="candidate_dob" name="candidate_dob" placeholder="MM/DD/YYY" type="text"/>
       <!--  <input required type="text"  class="form-control" id="candidate_dob" placeholder="Enter Date Of Birth" name="candidate_dob"> -->
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_present_address">Address Of Communication:</label>
      <div class="col-sm-7">
      	<textarea name="candidate_present_address" cols="5" rows="4" id="candidate_present_address" class="form-control" placeholder="Enter Address Of Communication" ></textarea>
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_permanent_address">Permanent Address:</label>
      <div class="col-sm-7">
      	<textarea name="candidate_permanent_address" cols="5" rows="4" id="candidate_permanent_address" class="form-control" placeholder="Enter Permanent Address" ></textarea>
       
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_qualification">Education Qualification:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_qualification" placeholder="Enter Education Qualification" name="candidate_qualification">
      </div>
    </div>
     
     <div class="form-group">
      <label for="candidate_driving_licence_no">If Candidate Applying For Driver, Latest Driving Licence No:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_driving_licence_no" placeholder="Enter Driving Licence No " name="candidate_driving_licence_no">
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_belongs_cat">Candidate belongs to the category of:</label>
      <div class="col-sm-7">
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat" value="Gen"> Gen</label>
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat" value="OBCCL"> OBC CL</label>
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat"  value="OBCSL"> OBC SL</label>
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat" value="BL"> BL</label>
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat" value="ST"> ST</label>
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat"  value="SC"> SC</label>
        <label class="radio-inline"><input type="radio" required name="candidate_belongs_cat"  value="PT"> PT</label>



 
       
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_gender">Gender Of The Apllicant:</label>
      <div class="col-sm-7">
        <input required type="radio"  name="candidate_gender" value="male">Male
        <input required type="radio"  name="candidate_gender" value="female">Female
      </div>
    </div>
      <div class="form-group">
      <label for="candidate_category">Whether The Candidate Applying Under:</label>
      <div class="col-sm-7">
        <label class="radio-inline"><input type="radio" required name="candidate_category" value="BPL"> BPL</label>
        <label class="radio-inline"><input type="radio" required name="candidate_category" value="PWD"> PWD</label>
        <label class="radio-inline"><input type="radio" required name="candidate_category"  value="EXServicemen"> EXServicemen</label>
        
      </div>
    </div>
     <div class="form-group">
      <label for="cadidate_bpl_category_list">If BPL, Candidate should mention the card no issued by DES & ME Dept. stating for employment only:</label>
      <div class="col-sm-7">
      	<label class="radio-inline"><input type="radio" required name="cadidate_bpl_category_list" value="Celibral Plassy"> Celibral Plassy</label>
        <label class="radio-inline"><input type="radio" required name="cadidate_bpl_category_list" value="Hearing Impairment"> Hearing Impairment</label>
        <label class="radio-inline"><input type="radio" required name="cadidate_bpl_category_list"  value="Low Vision"> Low Vision</label>
        <br>
        
        <input required type="text" class="form-control" id="candidate_bpl_card_no" placeholder="Enter BPL Card No" name="candidate_bpl_card_no">
      </div>
    </div>
    <div class="form-group">
      <label for="sikkim_subject_no">Sikkim Subject no certificate of indentification:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="sikkim_subject_no" placeholder="Enter Sikkim Subject No" name="sikkim_subject_no">
      </div>
    </div>
    <div class="form-group">
      <label for="candidate_unmaried_certificate_no">Unmarried certificate no In case of female candidate:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_unmaried_certificate_no" placeholder="Enter Unmarried Certificate No" name="candidate_unmaried_certificate_no">
      </div>
    </div>
     <div class="form-group">
      <label for="candidate_husbands_SSC">If married, husbands COI/SSC:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_husbands_SSC" placeholder="Enter Husbands COI/SSC" name="candidate_husbands_SSC">
      </div>
    </div>
  
     <div class="form-group">
      <label for="candidate_devorce_certificate">If Divorce,Certificate No Issued by comptent authority stating non remarriage certificate:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_devorce_certificate" placeholder="Enter Divorce Certificate No" name="candidate_devorce_certificate">
      </div>
    </div>
     <div class="form-group">
      <label for="employment_card_no">Employment Card No:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="employment_card_no" placeholder="Enter Employment Card No" name="employment_card_no">
      </div>
    </div>
    <div class="form-group">
      <label for="candidate_category_certificate_no">Category Certificate No:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="candidate_category_certificate_no" placeholder="Enter Category Certificate No" name="candidate_category_certificate_no">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-6 col-sm-10">
        <input required type="submit" name="submit" class="btn btn-success" value="Submit">
      </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<?php 
}else{
  header('Location:logout.php');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>