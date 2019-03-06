<?php
session_start();
ob_start(); 
include 'config.php';
// print_r($_SESSION);
if($_SESSION['user_no']){
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
  $Mobile=$_SESSION['user_no'];
  $application_form_query="SELECT * from `application_form` where `candidate_mobile`='$Mobile'";
  $sql_application_form=mysqli_query($conn,$application_form_query);
  $num_application_form=mysqli_num_rows($sql_application_form);
  if($num_application_form==0){

    $del_query="DELETE FROM `candidate_application_info` WHERE `candidate_mobile`='$Mobile'";
            $sql_del=mysqli_query($conn,$del_query);
            $update_moble="UPDATE `ilab_login` SET `complete_status`='0',`basic_status`='0' WHERE `mobile_no_L`='$Mobile'";
              $insert_sql=mysqli_query($conn, $update_moble);
              $_SESSION['active_basic_status']=0;
              $_SESSION['complete_application']=0;
            $_SESSION['user_no']=$Mobile; 
            $msg->error("Internet is Slow Try");
            header('Location:basic_registration');
            exit;
  }else if($num_application_form==1){

?>
<style type="text/css">
  .error{
    color: red;
  }
</style>
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

<link rel="stylesheet" type="text/css" href="/assert/validate.css">
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
 <!--  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<div class="container">
  <div class="col-md-12 col-sm-12">
        <?php $msg->display(); ?>
      </div>
<!--   <div class="row"> -->
    <form id="myform_details" method="POST" action="detail_application_save" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">Application Form No <?=$_SESSION['application_no'];?></div>
        <div class="card-body">
          <div class="row row-eq-height">
            
            <div class="col-sm-8">
              <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;"><legend>Personal Information</legend>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Upload Photo *</label>
                <div class="col-sm-6">
                  <input type="file"  class="form-control-plaintext demoInputBox" id="c_photo" onChange="PreviewImage();"  name="candidate_photo" required=""> <span id="file_error"></span>
                  <small id="emailHelp" class="form-text text-muted text-danger">Please upload a self attested photograph of max Sixe 100 kb *</small>
                  
                </div>   
              </div>
              <div class="form-group row">
                <label for="candidate_name" class="col-sm-4 col-form-label">Candidate Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Enter Name" required="">
                </div>
              </div> 
              <!-- <div class="form-group row">
                <label for="candidate_dob" class="col-sm-4 col-form-label">Date Of Birth * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_dob" name="candidate_dob" placeholder="MM/DD/YYYY" >
                </div>
              </div>
              <div class="form-group row">
                <label for="c_age" class="col-sm-4 col-form-label">Age * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="c_age" name="c_age" placeholder="" required="">
                </div>
              </div> -->
              <div class="form-group row">
                <label for="candidate_father_name" class="col-sm-4 col-form-label">Father's Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" required="" id="candidate_father_name" name="candidate_father_name" placeholder="Enter Father Name">
                </div>
              </div> 
              <div class="form-group row">
                
                <label for="gender" class="col-sm-4 col-form-label">Gender * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="gender" onchange="check_gender()" name="gender" required>
                    <option value="">----</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <!-- <option value="transgender">Transgender</option> -->
                  </select>
                </div>
              
              </div> 
              <input type="hidden" name="candidate_husbands_SSC_status" id="candidate_husbands_SSC_status" value="2">
              <input type="hidden" name="candidate_unmaried_certificate_no_status" id="candidate_unmaried_certificate_no_status" value="2">
              <div id="sikkim_sub">
              <div class="form-group row">
                <label for="marred_status" class="col-sm-4 col-form-label">Marital Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="marred_status" onchange="check_gender_status()" name="marred_status" >
                    <option value="">----</option>
                    <option value="1">Unmarried</option>
                    <option value="2">Married</option>
                  </select>
                </div>
              </div>
              <div class="form-group row" >
                <label for="candidate_husband_name" class="col-sm-4 col-form-label">Husband Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_husband_name" name="candidate_husband_name" placeholder="Enter Husband Name">
                  <small id="emailHelp" class="form-text text-muted danger">If Married *</small>
                </div>
              </div>
               <div class="form-group row">
                <label for="candidate_unmaried_certificate_no" class="col-sm-4 col-form-label">Unmarried certificate * </label>
                <div class="col-sm-6">
                  <!-- <select class="form-control" id="candidate_unmaried_certificate_no_status"  name="candidate_unmaried_certificate_no_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select> --> 
                  <!-- <br>      -->
                  <input type="text" class="form-control" id="candidate_unmaried_certificate_no" placeholder="Enter Unmarried Certificate No" name="candidate_unmaried_certificate_no">     
                  <small id="emailHelp" class="form-text text-muted">Unmarried certificate no In case of female candidate * </small>           
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_husbands_SSC" class="col-sm-4 col-form-label">husband COI/SSCcertificate * </label>
                <div class="col-sm-6">
                  
                  <!-- <br>      -->
                  <input type="text" class="form-control" id="candidate_husbands_SSC" placeholder="Enter Husbands COI/SSC" name="candidate_husbands_SSC">     
                  <small id="emailHelp" class="form-text text-muted">If married, husband COI/SSC * </small>           
                </div>
              </div>
              <input type="hidden" name="candidate_divorce_certificate_status" id="candidate_divorce_certificate_status" value="2">
              <input type="hidden" class="form-control" id="candidate_divorce_certificate" placeholder="Enter Divorce Certificate No" name="candidate_divorce_certificate">  
             </div>
             <input type="hidden" name="Employment_status" value="1">
              <!-- <div class="form-group row">
                <label for="Employment_status" class="col-sm-4 col-form-label">Employment Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="Employment_status"  name="Employment_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select>
                </div>
              </div> -->
               <div class="form-group row">
                <label for="Employment_no" class="col-sm-4 col-form-label">Employment Card No * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="Employment_no" name="Employment_no" placeholder="Enter Employment Card No" >
                  <small id="emailHelp" class="form-text text-muted">If Employment Employment Card No * </small> 
                </div>
              </div> 
            </fieldset>
            <fieldset style="border: 1px solid lightgreen; padding: 6px; margin-bottom: 11px;"><legend>Education Information</legend>
              <div class="form-group row">
                <label for="candidate_qualification" class="col-sm-4 col-form-label"> Min. Educational Qualification pertinent to advertised post * </label>
                <div class="col-sm-6">

                  <select class="form-control" id="candidate_qualification" name="candidate_qualification" required="">
                    <option value="">----</option>
                    <?php 
                    $edu="SELECT * FROM `ilab_class` WHERE `status`='1'";
                    $sql_edu=mysqli_query($conn,$edu);
                    while($res_edu=mysqli_fetch_assoc($sql_edu)){
                    ?>
                    <option value="<?=$res_edu['slno_class']?>"><?=$res_edu['class_name']?></option>
                    <?php }?>
                  </select>               
                </div>
              </div>
              <div class="form-group row">
                <label for="diploma_status" class="col-sm-4 col-form-label">Diploma/ ITI * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="diploma_status" onchange="iti_statu()" name="diploma_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="iti_certificate_no" class="col-sm-4 col-form-label">Diploma/ITI</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="iti_certificate_no" placeholder="Enter Diploma/ITI Certificate No" name="iti_certificate_no">
                  <small id="iti_certificate_no" class="form-text text-muted danger">Applicable for Fitter, Painter and Generator Operator post only *</small>
                </div>
              </div>
               
            </fieldset>            
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Basic Information</legend>
              <div class="form-group row" >
                <label for="candidate_belongs_cat" class="col-sm-4 col-form-label">Candidate belongs to the category * </label>
                <div class="col-sm-6">
                   <select class="form-control" id="candidate_belongs_cat" onchange="social_status()" name="candidate_belongs_cat" required="">
                    <option value="">----</option>
                    <option value="Gen"> Un-Reserved</option>
                    <option value="OBCCL"> OBC CL</option> 
                    <option value="OBCSL"> OBC SL</option>
                    <option value="BL"> BL</option>
                    <option value="ST"> ST</option> 
                    <option value="SC"> SC</option>
                    <option value="PT"> PT</option>
                                    
                  </select> 
                               
                </div>
                </div>
                <div class="form-group row">
                <label for="candidate_certificate_cat" class="col-sm-4 col-form-label">Castes Certificate No  * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_certificate_cat" name="candidate_certificate_cat" placeholder="Enter Castes Certificate No" >
                </div>
              </div>
              <div class="form-group row">
                <label for="spae_status" class="col-sm-4 col-form-label">SPAE Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="spae_status" onchange="sports_qouta()"  name="spae_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select>
                </div>
              </div>
               <div class="form-group row">
                <label for="spae_no" class="col-sm-4 col-form-label">SPAE Certificate No </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="spae_no" name="spae_no" placeholder="Enter SPAE Certificate No" >
                  <small id="emailHelp" class="form-text text-muted">If SPAE (Sports Persons and Artisans with Excellence) Certificate No * </small> 
                </div>
              </div> 
              
            </fieldset>
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Candidate Category</legend>
              <div class="form-group row">
                <label for="applying_status" class="col-sm-4 col-form-label">Whether the candidate applying under * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="applying_status" onchange="Subject_status()" name="applying_status" >
                    <option value="">----</option>
                    <option value="1">BPL</option>
                    <option value="2">PWD</option>  
                    <option value="3">ExServiceman</option>                
                  </select>               
                </div>
              </div>
              <div class="form-group row">
                <label for="BPL_No" class="col-sm-4 col-form-label">BPL certificate Issued by DES & ME</label>
                <div class="col-sm-6">
                 <input type="text" class="form-control" id="BPL_No" name="BPL_No" placeholder="Enter BPL No">  <small id="emailHelp" class="form-text text-muted danger">If BPL The candidate should mention the certificate issued by DES & ME different stating for employment only *</small>         
                </div>
              </div>
               <div class="form-group row" >
                <label for="pwd_card_no" class="col-sm-4 col-form-label">PWD Card no issued by SJ & WD </label>
                <div class="col-sm-6">
                 <input type="text" class="form-control" id="pwd_card_no" name="pwd_card_no" placeholder="Enter PWD Card No">     
                  <small id="emailHelp" class="form-text text-muted">If PWD The Candidate should mention the card no issued by SJ & WD * </small>  
                  <br>     
                  <select class="form-control" id="pwd_name_id" onchange="Subject_status()" name="pwd_name_id" >
                    <option value="">----</option>
                    <option value="Low Vision">Low Vision</option>
                    <option value="Hearing Imparement">Hearing Imparement</option>  
                    <option value="Celebral Plassy">Celebral Plassy</option>                
                  </select>            
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_driving_licence_no_status" class="col-sm-4 col-form-label">Applying For Driver * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="candidate_driving_licence_no_status" onchange="diver_status()"  name="candidate_driving_licence_no_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select>               
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_driving_licence_no" class="col-sm-4 col-form-label">Latest Driving Licence No</label>
                <div class="col-sm-6">
                 <input type="text" class="form-control" id="candidate_driving_licence_no" name="candidate_driving_licence_no" placeholder="Enter Driving Licence No">  <small id="emailHelp" class="form-text text-muted danger">If Candidate Applying For Driver, Latest Driving Licence No *</small>         
                </div>
              </div>
            </fieldset>
          
             <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Address Details</legend>
              <div class="form-group row" >
                <label for="candidate_present_address" class="col-sm-4 col-form-label">Present Address * </label>
                <div class="col-sm-6">
                  <textarea class="form-control" rows="5" id="candidate_present_address" placeholder="Enter Address Of Communication" name="candidate_present_address" required=""></textarea>  
                   <small id="emailHelp" class="form-text text-muted">Present Address Same As Permanet Address. * </small>   <input type="checkbox" onclick="FillBilling(this.form)" name="billingtoo">         
                </div>
                
                  
                </div>
                <div class="form-group row">
                <label for="candidate_permanent_address" class="col-sm-4 col-form-label">Permanent Address * </label>
                <div class="col-sm-6">
                 <textarea class="form-control" rows="5"  name="candidate_permanent_address"  id="candidate_permanent_address" placeholder="Enter Permanent Address" required=""></textarea>
                </div>
              </div>
              
            </fieldset>

             <!-- <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Exam Location Preference</legend>
              <div class="form-group row">
                <label for="Preference_one" class="col-sm-4 col-form-label">Preference 1 * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="Preference_one" onchange="Preference()" name="Preference_one" required="">
                    <option value="">----</option>
                    <?php 
                    $edu="SELECT * FROM `ilab_location_exam_praference` WHERE `status`='1'";
                    $sql_edu=mysqli_query($conn,$edu);
                    while($res_edu=mysqli_fetch_assoc($sql_edu)){
                    ?>
                    <option value="<?=$res_edu['location']?>"><?=$res_edu['location']?></option>
                    <?php }?>
                  </select>               
                </div>
              </div>
              <div class="form-group row">
                <label for="Preference_two" class="col-sm-4 col-form-label">Preference 2 * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="Preference_two"  name="Preference_two" required="">
                    <option value="">----</option>
                    
                  </select>               
                </div>
              </div>
              
            </fieldset> -->
            </div>
            <div class="col-sm-4 pull-right">
                <img src="image/profile-pic.f92db697.png"  width="150"  height="180" id="photopreview" name="photopreview">
              </div>
              <div class="row">
              <div class="col-sm-10">
              <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;">
                <legend>Self Declaration </legend>
                <div class="form-group row">
                  <label class="col-sm-1 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="checkbox" required="" class="form-check-input" name="">
                    <p class="text-justify text-capitalize">I hereby declare that the information furnished above are true and correct to the best of my knowledge and belief. In case, any information furnished is found incorrect, incomplete before issue of admit card and or at any stage of examination, I undertake that my candidature is liable to be rejected. <br>
                      <strong class="pull-right">Date : <?=date("d-m-Y")?></strong>
                    </p>
                  </div>
                  
                </div>
              </fieldset>
            </div>
            </div>
               
              
              <div class="col-md-12">
                
              </div>
            </div>

          </div>
      </div>
        <div class="card-footer">
          <div class="col-sm-offset-8 col-sm-12 text-center">
           
             <input type="submit" name="submit" id="save" class="btn btn-success" value="Submit">
         </div>
       </div>
      </div>
      
      
    </form>
    
 
</div>



<?php 
}else{
  header('Location:logout');
  exit;
}
}else{
  header('Location:logout');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>
<!-- <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <script  src="/assert/js/validate.js"></script>
     <!-- <script  src="/assert/js/valid_add.js"></script> -->
    <script src="date_picker/js/zebra_datepicker.js"></script>

 <script type="text/javascript">
  // $.validator.addMethod('filesize', function (value, element, arg) {
  //           var minsize=1000; // min 1kb
  //           if((value>minsize)&&(value<=arg)){
  //               return true;
  //           }else{
  //               return false;
  //           }
  //       });
  //       
  // $("input").prop('required',false);spae_status social_status diver_status()
function iti_statu(){
  var diploma_status=$('#diploma_status').val();
  if(diploma_status=='1'){
    $("#iti_certificate_no").prop('required',true);
  }else{
    $("#iti_certificate_no").prop('required',false);
  }
}
function diver_status(){
  var candidate_driving_licence_no_status=$('#candidate_driving_licence_no_status').val();
  if(diploma_status=='1'){
    $("#candidate_driving_licence_no").prop('required',true);
  }else{
    $("#candidate_driving_licence_no").prop('required',false);
  }
}
function social_status(){
  var candidate_belongs_cat=$('#candidate_belongs_cat').val();
  if(candidate_belongs_cat=='Gen'){
    $("#candidate_certificate_cat").prop('required',false);
  }else{
    $("#candidate_certificate_cat").prop('required',true);
  }
}
function sports_qouta(){
  var spae_status=$('#spae_status').val();
  if(spae_status=='1'){
    $("#spae_no").prop('required',true);
  }else{
    $("#spae_no").prop('required',false);
  }
}
function check_gender(){
  var gender=$('#gender').val();
  if(gender!=""){
    if(gender=="male"){
      $("#marred_status").prop('required',false);   
      $("#candidate_unmaried_certificate_no").prop('required',false);
       $("#candidate_husbands_SSC").prop('required',false);
      $('#marred_status').html('<option value="3">Not Applicable</option>');
      $("#sikkim_sub").hide();
    }else if(gender=="female"){
      $("#marred_status").prop('required',true); 
      
      $("#sikkim_sub").show();
      $('#marred_status').html('<option value="">-----</option><option value="1">Unmarried</option><option value="2">Married</option>');
      
      

    }
  }else{
    $("#sikkim_sub").hide();
  }
}
function check_gender_status(argument) {
  var marred_status=$('#marred_status').val();
      if(marred_status=='1'){
        $("#candidate_unmaried_certificate_no").prop('required',true);
        $("#candidate_husbands_SSC").prop('required',false);
      }else if(marred_status=='2'){
        $("#candidate_unmaried_certificate_no").prop('required',false);
        $("#candidate_husbands_SSC").prop('required',true);
      }else{
        $("#candidate_unmaried_certificate_no").prop('required',false);
        $("#candidate_husbands_SSC").prop('required',false);
        $("#marred_status").prop('required',true);   
      }
}




$( document ).ready(function() {
  var validator = $( "#myform_details" ).validate();
        console.log( "ready2!" );
    $( "#myform_details" ).validate({
      rules: {
          candidate_name:"required",         
          candidate_father_name:"required",
          gender:"required",
          marred_status:{
            required: {
              depends: function (element) {
                return ($("#gender").val()=="female");
              }
            }
          },
          candidate_qualification:"required",
          candidate_belongs_cat:"required",
          candidate_certificate_cat:{
            required: {
              depends: function (element) {
                  if($("#candidate_belongs_cat").val()=='Gen'){
                  return false;
                }else{
                   return true;
                }
              }
            }
          },
          // applying_status:"required",
          BPL_No:{
            required: {
              depends: function (element) {
                return $("#applying_status").val()==1;
              }
            }
          },
          pwd_card_no:{
            required: {
              depends: function (element) {
                return $("#applying_status").val()==2;
              }
            }
          },
          pwd_name_id:{
            required: {
              depends: function (element) {
                return $("#applying_status").val()==2;
              }
            }
          },
          candidate_driving_licence_no_status:"required",
          candidate_driving_licence_no:{
            required: {
            depends: function (element) {
              return $("#candidate_driving_licence_no_status").val()=='1';
            }
          }
        },
          candidate_unmaried_certificate_no_status:"required",
          candidate_unmaried_certificate_no:{
            required: {
              depends: function (element) {
                if(($('#gender').val()=='female') && ($('#marred_status').val()=='1')){
                  return true;
                }else{
                  return false;
                }
              }
            }
          },
          candidate_husbands_SSC_status:"required",
          candidate_husbands_SSC:{
            required: {
              depends: function (element) {
                if(($('#gender').val()=='female') && ($('#marred_status').val()=='2')){
                  return true;
                }else{
                  return false;
                }
              }
            }
          },
          candidate_divorce_certificate_status:"required",
          candidate_divorce_certificate:{
            required: {
              depends: function (element) {
                if(($('#gender').val()=='female') && ($('#candidate_divorce_certificate_status').val()=='1')){
                  return true;
                }else{
                  return false;
                }
              }
            }
          },
           diploma_status:"required",
          // Employment_status:"required",
          iti_certificate_no:{
            required: {
              depends: function (element) {
                if($('#diploma_status').val()==1){
                   console.log( "ready3!" );
                  return true;
                }else{
                   console.log( "ready7!" );
                  return false;
                }
              }
            }
          },
          spae_status:"required",
          spae_no:{
            required: {
              depends: function (element) {
                if($("#spae_status").val()==1){
                  return true;
                }else{
                  return false;
                }
              }
            }
          },
          candidate_present_address:"required",
          candidate_permanent_address:"required",
          candidate_photo:{
            required:true,
            // accept:"image/*",
            filesize: 2000000   //max size 200 kb
          }
         



      },
      messages: {
          candidate_photo:{
            filesize:" file size must be less than 200 KB.",
            // accept:"Please upload .jpg or .png of Candidate Photo.",
            required:"Please upload file."
          },
          candidate_name:"Please Enter Full Name",         
          candidate_father_name:"Please Enter Father Name",
          gender:"Please Select Gender",
          marred_status:"Please Marital Status",         
          candidate_qualification:"Please Education Information",
          candidate_belongs_cat:"Please Select Category ",
          candidate_certificate_cat:"Please Castes Certificate No",
          BPL_No:{
             required: "This Field Can Not Left Blank"
          },
          pwd_card_no:{
            required: "This is Required"
          },
          pwd_name_id:{
            required: "This is Required"
          },
          candidate_driving_licence_no_status:"Please Select This Field",
          candidate_driving_licence_no:{
            required: "This is Required"
          },
          candidate_unmaried_certificate_no_status:"Please Select This Field",
          candidate_unmaried_certificate_no:{
             required: "Please Enter Unmarried certificate no"

          },
          candidate_husbands_SSC_status:"Please Select This Field",
          candidate_husbands_SSC:{
             required: "If married, husbands COI/SSC"

          },
          candidate_divorce_certificate_status:"Please Select This Field",
          candidate_divorce_certificate:{
            required: "If Divorce,Certificate No Issued by comptent authority stating non remarriage certificate"
          },
          
          iti_certificate_no:{
            required: "Please Enter Diploma/ITI Certificate No"
          },
          candidate_present_address:"Please Fill Present Address",
          candidate_permanent_address:"Please Fill Permanent Address",
         
          diploma_status:"Please Select Diploma/ITI Yes or No",
          spae_status:"Please Select Yes or No",
          spae_no:{
            required: "Please Enter SPAE (Sports Persons and Artisans with Excellence) Certificate No "
          }
       },
       onsubmit: false,
       submitHandler: function(form) {  
         if ($(form).valid())
         {
             form.submit(); 
         }
         return false; // prevent normal form posting
       }
      
    })
  });
$('#save').click(function() {

        $("#myform_details").valid();
      });
function validate_s() {
  $("#file_error").html("");
  $(".demoInputBox").css("border-color","#F0F0F0");
  var file_size = $('#file')[0].files[0].size;
  if(file_size>100000) {
    $("#file_error").html("File size is greater than 100kb");
    $(".demoInputBox").css("border-color","#FF0000");
    return false;
  } 
  return true;
}
</script>
<script type="text/javascript">
  $( document ).ready(function() {
        console.log( "ready1!" );
         $("#hus").hide();
          $("#sikkim_sub").hide();
             $("#basic_id").hide();
          $.validator.addMethod('filesize', function(value, element, param) {
    // param = size (en bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
});
    });
  
// function Preference() {
//   var Preference_one_s=$('#Preference_one').val();
//   if(Preference_one_s!=""){
//     $.ajax({
//         type:'POST',
//         url:'get_perference',
//         data:'Preference_one='+Preference_one_s,
//         success:function(html){   
//           $('#Preference_two').html(html);                    
//         }
//       });

//   }else{
//     $('#Preference_two').html("<option value=''>--Please Select Preference 1--</option>");
//   }
// }
function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.candidate_permanent_address.value = f.candidate_present_address.value;
    // f.billingcity.value = f.shippingcity.value;
  }
    if(f.billingtoo.checked == false) {
    f.candidate_permanent_address.value = '';
    // f.billingcity.value = '';
  }
}

  </script>