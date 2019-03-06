<?php
ob_start();
session_start();
$title="KIIT L&D Student Registration Page";
$menuClass5="active";
include 'admin_final/config.php';
require 'admin_final/FlashMessages.php';
$msg = new \Preetish\FlashMessages\FlashMessages();
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="asserts_new/dist/dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="asserts_new/dist/assets/css/github.min.css">
 
<script type="text/javascript">
    function PreviewImage() {
      alert();
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("c_photo").files[0]); 
      oFReader.onload = function(oFREvent) {
      document.getElementById("photopreview").src = oFREvent.target.result;
      };

      };
</script>

<script type="text/javascript">      
     function PreviewSign() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("sign").files[0]);
      oFReader.onload = function(oFREvent) {
      document.getElementById("signpreview").src = oFREvent.target.result;
      };

      };
</script>
<style type="text/css">
    fieldset {
        padding: .35em .620em .75em;
        margin: 7px 2px;
        border: 1px solid #27892c;
    }
</style>>

<section style="padding-top: 2pc; padding-bottom: 5pc;">
    <div class="demo">
    <div class="container">
      <div class="row" style="margin-top:15%; ">
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-lg-offset-3 col-sm-offset-2 col-md-offset-3" id="stra">
          <form role="form" class="form-horizontal text-center" action="login.php" id="login" method="POST">
            <fieldset>
              <h2>Please Sign In</h2>
              <hr class="colorgraph">
              <div class="clearfix"></div>
              <div class="text-center">
                <?php $msg->display(); ?>
              </div>
              <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                <input type="text" name="userid" id="userid" class="form-control input-sm" placeholder="Please Enter Email/Userid">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                  <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Please Enter Password">
                  </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-sm-6 col-md-offset-3">
                <input type="submit" id="login_button" class="btn btn-md btn-success btn-block" value="Sign In">
                </div>
              </div>
              <hr class="colorgraph">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 ">
                  
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      </div>
      </div>
  
</section>

<?php
$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';

?>

 <script type="text/javascript" src="asserts_new/dist/dist/bootstrap-clockpicker.min.js"></script>
    
    <script type="text/javascript">
    $('.clockpicker').clockpicker({
        autoclose: true,
        twelvehour: true,
        placement: 'top',
        align: 'left',
        donetext: 'Done'
    });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function(e){
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
                .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
  <script>
  $( function() {
    $( "#Birth" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  function get_info_batch() {
    var academic_id=$('#academic_id').val();
    var secure_hash_ps=$('#secure_hash_p').val();
    if(academic_id!=""){
     $.ajax({
            type: "POST",
            url: "ajax/get_branch.php",
            data:'academic_ids='+academic_id+'&pen='+secure_hash_ps,
            success: function(data){
               $('#Branch').html(data);
            }
        });
    }else{
       $('#Branch').html('<option value="">-- Please Select Degree -- </option>');
        // $('#Branch').val('');
    }
  }
    // var helpers ={
    //     buildDropdown: function(result, Branch, emptyMessage){  // Remove current options
    //         Branch.html('');   // Add the empty option with the empty message
    //         //Branch.append('<option value="">' + emptyMessage + '</option>');  // Check result isnt empty
            
    //         if(result != ''){
    //             // Loop through each of the results and append the option to the dropdown
    //             $.each(result, function(k, v) {
    //                 Branch.append('<option value="' + v.id + '">' + v.name + '</option>');

    //             });
    //         }
    //     }
    // }
  </script>