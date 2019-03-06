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
<!--   <div class="row"> -->
    <form>
      <div class="card">
        <div class="card-header">Application Form</div>
        <div class="card-body">
          <div class="row row-eq-height">
            
            <div class="col-sm-8">
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Upload Photo *</label>
                <div class="col-sm-6">
                  <input type="file"  class="form-control-plaintext" id="c_photo" onChange="PreviewImage();"  name="candidate_photo">
                </div>
                
              </div>
              <div class="form-group row">
                <label for="candidate_name" class="col-sm-3 col-form-label">Candidate Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_name" name="candidate_name" placeholder="Enter Name">
                </div>
              </div> 
              <div class="form-group row">
                <label for="candidate_father_name" class="col-sm-3 col-form-label">Father Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_father_name" name="candidate_father_name" placeholder="Enter Father Name">
                </div>
              </div> 
              <div class="form-group row">
                
                <label for="gender" class="col-sm-3 col-form-label">Gender * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="gender" name="gender">
                    <option value="">----</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <!-- <option value="transgender">Transgender</option> -->
                  </select>
                </div>
              
              </div> 
              <div class="form-group row">
                <label for="marred_status" class="col-sm-3 col-form-label">Married Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="marred_status" name="marred_status" required="">
                    <option value="">----</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>                  
                  </select>               
                </div>
              </div>
               <div class="form-group row" id="browserother" style="display:none">
                <label for="candidate_husband_name" class="col-sm-3 col-form-label">Husband Name * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_husband_name" name="candidate_husband_name" placeholder="Enter Husband Name">
                </div>
              </div> 
              <!-- <div class="form-group row">
                <label for="marred_status" class="col-sm-3 col-form-label">Married Status * </label>
                <div class="col-sm-6">
                  <select class="form-control" id="marred_status" name="marred_status" required="">
                    <option value="">----</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>                  
                  </select>               
                </div>
              </div> -->
            </div>
            <div class="col-sm-4 pull-right">
                <img src="image/"  width="150"  height="180" id="photopreview" name="photopreview">
              </div>
            </div>

          </div>.
      </div>
        <div class="card-footer">Footer</div>
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

<?php 
}else{
  header('Location:logout.php');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>
<script type="text/javascript">
  $( document ).ready(function() {
        console.log( "ready!" );
         $(".slidingDiv").hide();
          $(".slidingDiv12").hide();
    });
</script>
<script type="text/javascript">
      $(document).ready(function() {
         // $("select").removeClass("form-control show-tick");
    // $('#mycheckbox').change(function() {
    //     $('#mycheckboxdiv').toggle();
    // });
    $('select[name=marred_status]').change(function(e){
      if ($('select[name=marred_status]').val() == 'yes'){
        $('#browserother').show();
         $("#candidate_husband_name").attr('required',true);
      }else{
        $('#browserother').hide();
        document.getElementById("candidate_husband_name").removeAttribute("required");
      }
    });

});
</script>