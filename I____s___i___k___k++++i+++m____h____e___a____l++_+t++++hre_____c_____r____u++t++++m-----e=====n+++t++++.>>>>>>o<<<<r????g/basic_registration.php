<?php 
// exit;
ob_start();
include 'config.php';
session_start();
if($_SESSION['user_no']){
  // if((time() - $_SESSION['last_login_timestamp']) > 300){  // 900 = 15 * 60 
  //     session_destroy();
  // }else{
  //     $_SESSION['last_login_timestamp'] = time();
  // }
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
  <div class="text-center">
      <?php $msg->display(); ?>
    </div>
<!--   <div class="row"> -->
    <form id="myform" action="save_appliaction" method="POST">
      <div class="card">
        <div class="card-header">Application Form</div>
        <div class="card-body">
          <div class="row row-eq-height">
            
            <div class="col-sm-8">
           
            <fieldset style="border: 1px solid lightblue; padding: 6px; margin-bottom: 11px;"><legend>Sikkim Subject Information</legend>
              <input type="hidden" name="sikkim_status_subject" value="1">
              
              <div class="form-group row">
                <label for="sikkim_subject_no" class="col-sm-4 col-form-label">Sikkim Subject Certificate Id * </label>
                <div class="col-sm-6">
                 <input type="text" class="form-control" id="sikkim_subject_no" name="sikkim_subject_no" placeholder="Sikkim Subject Certificate Identification" required="true" autocomplete="off">      
                </div>
              </div>
              <div class="form-group row">
                <label for="candidate_dob" class="col-sm-4 col-form-label">Date Of Birth * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="candidate_dob" name="candidate_dob" placeholder="MM/DD/YYYY" required="" autocomplete="off">
                </div>
              </div>
              <div class="form-group row">
                <label for="c_age" class="col-sm-4 col-form-label">Age * </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="c_age" name="c_age" placeholder="" required="">
                </div>
              </div>

            </fieldset>
          
            </fieldset>
            </div>
              <div class="col-sm-4 pull-right">
               
              </div>
            </div>
          </div>
      </div>
        <div class="card-footer" id="footer_id">
          <div class="col-sm-offset-8 col-sm-12 text-center">
             <input type="submit" name="submit" class="btn btn-outline-primary" value="Submit">
         </div>
       </div>
      </div>
    </form>
    
  <!-- </div> -->
</div>


<?php 
}else{
  header('Location:logout');
  exit;
}
$content_details = ob_get_contents();
ob_clean();
include 'template1.php';

?>
<script src="date_picker/js/zebra_datepicker.js"></script>
<script src="assert/js/moment.js"></script>
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
               minDate: '02/01/1978',
              onSelect: function(selectedDate) {
              var option = this.id == "from" ? "minDate" : "maxDate",
              instance = $(this).data("datepicker"),
              date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
              // dates.not(this).datepicker("option", option, date);

                // var isoDate = new Date($(this).val()).toISOString();
                // setAge(moment(isoDate));
                  var today = new Date(), 
                      dob = new Date(selectedDate), 
                      age2 = new Date(today - dob).getFullYear() - 1978;
                       age = moment().diff(dob, 'years',false);
                        // console.log(years);
                      //alert(age);
                      console.log(today);
                      console.log(dob);
                      console.log(new Date(today - dob).getFullYear() - 1978);
                      console.log(age);
                      var y=Math.abs(age);
                      console.log(y);
                      if(y>=42){
                         document.getElementById("c_age").readOnly = false;
                        document.getElementById("c_age").value="";
                        alert('Your age should be 18-40');
                       
                      }else if(17>y){
                        
                        document.getElementById("c_age").readOnly = false;
                        document.getElementById("c_age").value="";
                        alert('Your age should be 18-40');  
                      }else{
                         document.getElementById("c_age").readOnly = true;
                        document.getElementById("c_age").value=age;
                      }
                  
                  //$('#c_age').text(age);
              },
              startDate: '1978-01-01',
              endDate: '2018-02-01',
              // startDate: "1978-02-01",
              yearRange: "1978:2018",
      changeMonth: true,
      changeYear: true
    });
    });
  function setAge(d)
{
  var age = moment().diff(d, 'years', true);
  $('#c_age').val(age);
  
}
</script>
