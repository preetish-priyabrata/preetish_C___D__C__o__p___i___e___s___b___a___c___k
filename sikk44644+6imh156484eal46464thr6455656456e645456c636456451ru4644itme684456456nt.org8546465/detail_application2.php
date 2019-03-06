<?php 
ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
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

</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!--  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<div class="container">
  <div class="col-md-12 col-sm-12">
        <?php $msg->display(); ?>
      </div>
<!--   <div class="row"> -->
    <form id="myform_details" method="POST" action="detail_application_save" onSubmit="return validates();" enctype="multipart/form-data">
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
                </div>   
              </div>
              <div class="form-group row">
                <label for="candidate_name" class="col-sm-4 col-form-label">Candidate Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Enter Name" required="">
                </div>
              </div> 
              <div class="form-group row">
                <label for="candidate_dob" class="col-sm-4 col-form-label">Date Of Birth * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_dob" name="candidate_dob" placeholder="MM/DD/YYYY" >
                </div>
              </div>
              <div class="form-group row">
                <label for="c_age" class="col-sm-4 col-form-label">Age * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="c_age" name="c_age" placeholder="" >
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_father_name" class="col-sm-4 col-form-label">Father Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_father_name" name="candidate_father_name" placeholder="Enter Father Name">
                </div>
              </div> 
              <div class="form-group row">
                
                <label for="gender" class="col-sm-4 col-form-label">Gender * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="gender" name="gender" required>
                    <option value="">----</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <!-- <option value="transgender">Transgender</option> -->
                  </select>
                </div>
              
              </div> 
              <input type="hidden" name="marred_status" id="marred_status" value="2">
              <!-- <div class="form-group row">
                <label for="marred_status" class="col-sm-4 col-form-label">Marital Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="marred_status" onchange="marred_status_changes()" name="marred_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                </div>
              </div> -->
              <div class="form-group row" >
                <label for="candidate_husband_name" class="col-sm-4 col-form-label">Husband Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_husband_name" name="candidate_husband_name" placeholder="Enter Husband Name">
                  <small id="emailHelp" class="form-text text-muted danger">If Married *</small>
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
                  <select class="form-control" id="diploma_status"  name="diploma_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select>
                </div>
              </div>
               
            </fieldset>            
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Basic Information</legend>
              <div class="form-group row" >
                <label for="candidate_belongs_cat" class="col-sm-4 col-form-label">Candidate belongs to the category * </label>
                <div class="col-sm-6">
                   <select class="form-control" id="candidate_belongs_cat"  name="candidate_belongs_cat" required="">
                    <option value="">----</option>
                    <option value="Gen"> Gen</option>
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
                  <input type="text" class="form-control" id="candidate_certificate_cat" name="candidate_certificate_cat" placeholder="Enter Castes Certificate No" required="">
                </div>
              </div>
              <div class="form-group row">
                <label for="spae_status" class="col-sm-4 col-form-label">SPAE Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="spae_status"  name="spae_status" required="">
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
                  <select class="form-control" id="applying_status" onchange="Subject_status()" name="applying_status" required="">
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
                  <select class="form-control" id="candidate_driving_licence_no_status"  name="candidate_driving_licence_no_status" required="">
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
          <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Candidate Details</legend>
              <div class="form-group row">
                <label for="candidate_unmaried_certificate_no_status" class="col-sm-4 col-form-label">Unmarried Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="candidate_unmaried_certificate_no_status"  name="candidate_unmaried_certificate_no_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select> 
                  <br>     
                  <input type="text" class="form-control" id="candidate_unmaried_certificate_no" placeholder="Enter Unmarried Certificate No" name="candidate_unmaried_certificate_no">     
                  <small id="emailHelp" class="form-text text-muted">Unmarried certificate no In case of female candidate * </small>           
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_husbands_SSC_status" class="col-sm-4 col-form-label">Married Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="candidate_husbands_SSC_status"  name="candidate_husbands_SSC_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select> 
                  <br>     
                  <input type="text" class="form-control" id="candidate_husbands_SSC" placeholder="Enter Husbands COI/SSC" name="candidate_husbands_SSC">     
                  <small id="emailHelp" class="form-text text-muted">If married, husbands COI/SSC * </small>           
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_divorce_certificate_status" class="col-sm-4 col-form-label">Divorce Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="candidate_divorce_certificate_status"  name="candidate_divorce_certificate_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select> 
                  <br>     
                  <input type="text" class="form-control" id="candidate_divorce_certificate" placeholder="Enter Divorce Certificate No" name="candidate_divorce_certificate">     
                  <small id="emailHelp" class="form-text text-muted">If Divorce,Certificate No Issued by comptent authority stating non remarriage certificate  * </small>           
                </div>
              </div>
              <div class="form-group row">
                <label for="Employment_status" class="col-sm-4 col-form-label">Employment Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="Employment_status"  name="Employment_status" required="">
                    <option value="">----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>  
                  </select>
                </div>
              </div>
               <div class="form-group row">
                <label for="Employment_no" class="col-sm-4 col-form-label">Employment Card No * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="Employment_no" name="Employment_no" placeholder="Enter Employment Card No" >
                  <small id="emailHelp" class="form-text text-muted">If Employment Employment Card No * </small> 
                </div>
              </div> 
              
            </fieldset>
             <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Basic Information</legend>
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
               <div class="col-sm-8">
                  <fieldset style="border: 1px solid rebeccapurple; padding: 6px; margin-bottom: 11px;"><legend>Candiadte signature </legend>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Scan signature *</label>
                    <div class="col-sm-6">
                      <input type="file"  class="form-control-plaintext" id="sign" onChange="PreviewSign();"  name="signature" required="">
                    </div>   
                  </div>
                </fieldset>
              </div>
              <div class="col-sm-4 pull-right">
                <img src="image/logo-signature.jpg"  width="200"  height="100" id="signpreview" name="signpreview">
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
      
      <!-- <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
      </div> -->
    </form>
    
  <!-- </div> -->
</div>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->



<?php 
}else{
  header('Location:logout.php');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>
<!-- <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script> -->
    <script type="text/javascript" src="assert/js/validate.js"></script>

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
  $.validator.addMethod('filesize', function(value, element, param) {
    // param = size (en bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
});






$( document ).ready(function() {
    $( "#myform_details" ).validate({
      rules: {
          
          candidate_name:"required",  
          candidate_dob:"required",   
          candidate_father_name:"required",    
          gender:"required",   
          marred_status:"required", 
          candidate_husband_name:{
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
          candidate_qualification:"required",
          candidate_belongs_cat:"required",
          candidate_certificate_cat:"required",
          applying_status:"required",
          BPL_No:{
            required: {
              depends: function (element) {
                return $("#applying_status").val()=="1";
              }
            }
          },
          pwd_card_no:{
            required: {
              depends: function (element) {
                return $("#applying_status").val()=="2";
              }
            }
          },
          pwd_name_id:{
            required: {
              depends: function (element) {
                return $("#applying_status").val()=="2";
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
                if(($('#gender').val()=='female') && ($('#candidate_unmaried_certificate_no_status').val()=='1')){
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
                if(($('#gender').val()=='female') && ($('#candidate_husbands_SSC_status').val()=='1')){
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
          Employment_status:"required",
          Employment_no:{
            required: {
              depends: function (element) {
                return $("#Employment_status").val()=="1";
              }
            }
          },
          spae_status:"required",
          spae_no:{
            required: {
              depends: function (element) {
                return $("#spae_status").val()=="1";
              }
            }
          },
          candidate_present_address:"required",
          candidate_permanent_address:"required",
          signature:{
            required:true,
            // accept:"image/*",
            filesize: 2000000   //max size 200 kb
          },
          candidate_photo:{
            required:true,
            // accept:"image/*",
            filesize: 2000000   //max size 200 kb
          },
         c_age:{
            required: true,
            range: [18, 42]
          }
          diploma_status:"required",


      },
      messages: {
          candidate_photo:{
            filesize:" file size must be less than 200 KB.",
            // accept:"Please upload .jpg or .png of Candidate Photo.",
            required:"Please upload file."
          },
          candidate_name:"Please Enter Full Name",
          candidate_dob:"Please Select Date Of Birth",
          candidate_father_name:"Please Enter Father Name",
          gender:"Please Select Gender",
          marred_status:"Please Marital Status",
          candidate_husband_name:{
             required: "Please Enter Husband Name"          },
          candidate_qualification:"Please Education Information",
          candidate_belongs_cat:"Please Select Category ",
          candidate_certificate_cat:"Please Castes Certificate No",
          applying_status:"Please Select the applying under",
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
          Employment_status:"Please Select This Field",
          Employment_no:{
            required: "Please Enter Recent Employment Card"
          },
          candidate_present_address:"Please Fill Present Address",
          candidate_permanent_address:"Please Fill Permanent Address",
          signature:{
            filesize:" file size must be less than 200 KB.",
            // accept:"Please upload .jpg or .png of Candidate Photo.",
            required:"Please upload file."
          },
          c_age:{
           required:"Please Enter Date Of Birth",
            range: "Your age should be 18-42"
          },
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
       // errorPlacement: function(error, element){
       //      if ( element.is(":radio") ){
       //          error.appendTo( element.parents('.container') );
       //      }else{ // This is the default behavior 
       //          error.insertAfter( element );
       //      }
       //   }
    });
  });
$('#save').click(function() {
        $("#myform_details").valid();
      });
function validate() {
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
        console.log( "ready!" );
         $("#hus").hide();
          $("#sikkim_sub").hide();
             $("#basic_id").hide();
    //       ({
    //   changeMonth: true,
    //   changeYear: true
    // });
           $( "#candidate_dob" ).datepicker({

              onSelect: function(value, ui) {
                  var today = new Date(), 
                      dob = new Date(value), 
                      age = new Date(today - dob).getFullYear() - 1970;
                      //alert(age);
                  document.getElementById("c_age").value=age;
                  document.getElementById("c_age").readOnly = true;
                  //$('#c_age').text(age);
              },
      changeMonth: true,
      changeYear: true
    });
    });
  // function gender_changes() {
  //  var gender_id=$('#gender').val();
  //  var marred_status_id=$('#marred_status').val();
  //  if(gender_id!=""){
  //     if(marred_status_id!=""){
  //       if(($('#gender').val()=='female') && ($('#marred_status').val()=='2')){
  //         $("#hus").show();
  //       }else{
  //         $("#hus").hide();
  //       }

  //     }else{
  //        $("#hus").hide();
  //     }
  //  }else{
  //    $("#hus").hide();
  //  }
  // }
  // function marred_status_changes() {
  //  var gender_id=$('#gender').val();
  //  var marred_status_id=$('#marred_status').val();
  //  if(gender_id!=""){
  //     if(marred_status_id!=""){
  //       if(($('#gender').val()=='female') && ($('#marred_status').val()=='2')){
  //         $("#hus").show();
  //       }else{
  //         $("#hus").hide();
  //       }

  //     }else{
  //        $("#hus").hide();
  //     }
  //  }else{
  //    $("#hus").hide();
  //  }
  // }
  // function Subject_status() {
  //   var subject_de=$('#sikkim_status_subject').val();
  //   if(subject_de=='yes'){
  //     $("#sikkim_sub").show();
  //   }else{
  //     $("#sikkim_sub").hide();
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