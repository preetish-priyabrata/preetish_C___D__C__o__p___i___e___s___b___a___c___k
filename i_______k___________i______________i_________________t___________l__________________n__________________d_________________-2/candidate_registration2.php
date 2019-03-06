<?php
ob_start();
session_start();
$title="KIIT L&D Student Registration Page";
$menuClass6="active";
include 'admin_final/config.php';
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
</style>

<section style="padding-top: 8pc; padding-bottom: 5pc;">
    <div class="container" >
        <div class="row">
            <form class="form-horizontal">
                <div class="row">
                    <div class="panel-group">
                        <div class="panel panel-primary">
                            <form name="" method="POST" action="candidate_registration_save.php" enctype="multipart/form-data">
                                 <div class="panel-heading text-center">Personal Information</div>

                                   <div class="panel-body" style="border: 1px solid red">
                                   <div class="col-md-4" style="border: 1px solid red; padding: 1pc !important;background-color: ghostwhite;">

                                    <div class="form-group">
                                        <label class="control-label col-sm-4 pull-left" for="email">Email<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="First">First Name<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="First_name" class="form-control" id="First" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Middle">Middle Name</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Middle_name" class="form-control" id="Middle" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Last">Last Name<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Last_name" class="form-control" id="Last" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="gender">Gender</label>
                                        <div class="col-sm-8">
                                            <label class="radio-inline"><input type="radio" name="gender" value="M" checked>Male</label>
                                            <label class="radio-inline"><input type="radio" name="gender" value="F" >Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Birth">Birth Date<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Birth"  class="form-control" id="Birth" placeholder="Enter Birth Date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4 pull-left" for="Mobile">Mobile No<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Mobile"  class="form-control" id="Mobile" placeholder="Enter Mobile No">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Alternative">Alternative No</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Alternative" class="form-control" id="Alternative" placeholder="Enter Alternative No">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4  pull-left" for="landlineNo">Land-line No (If any)</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="landlineNo" data-validation="custom" maxlength="14"  class="form-control" id="landlineNo" placeholder="Enter Land-line No">
                                        </div>
                                    </div>
                                </div>
                                <!-- col end -->
                                <div class="col-md-4" style="border: 1px solid red; padding: 1pc !important;background-color: ghostwhite;">
                                  
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="City">City  <font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="City" class="form-control" id="City" placeholder="Enter City Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="District">District Name</label>
                                        <div class="col-sm-8">
                                          <input type="text" name="District" class="form-control" id="District" placeholder="Enter District Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="State">State Name<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="State" class="form-control" id="State" placeholder="Enter State Name">
                                        </div>
                                    </div>
                                    <fieldset><label>Preferred time to attend a call </label>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" name="prefered_mng_time" for="gender">Morning</label>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <label class="control-label col-sm-4" name="prefered_mng_time" for="gender">From</label>
                                                    <div class="col-sm-8">    
                                                         <div class="input-group clockpicker">
                                                            <input type="text" class="form-control"  data-language='en' placeholder="Morning Calling Hour" required="">
                                                            <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-sm-4" name="prefered_mng_time" for="gender">TO</label>
                                                    <div class="col-sm-8">    
                                                         <div class="input-group clockpicker">
                                                            <input type="text" class="form-control"  data-language='en' placeholder="Morning Calling Hour" required="">
                                                            <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                            
                                        <!-- <select name="mornFromHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>:
                                        <select name="mornFromMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> &nbsp; - &nbsp;
                                        <select name="mornToHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>:
                                        <select name="mornToMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> -->
                                     </div>
                                </div>
                                       
                                <div class="form-group">
                                            <label class="control-label col-sm-4" 
                                            name="prefered_eveng_time" for="gender">Evenging</label>
                                            <div class="col-sm-8">
                                         <!-- <select name="mornFromHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>  -->
                              <!--<div class="input-group clockpicker">
                                        <input type="text" class="form-control"  data-language='en' value="09:30">
                                        <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-time"></span>
                                   </span>
                                </div> -->
                                        
                                       <!--  <select name="mornFromMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> &nbsp; - &nbsp;
                                        <select name="mornToHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>:
                                        <select name="mornToMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> -->
                                         <div class="row">
                                                    <label class="control-label col-sm-4" name="prefered_mng_time" for="gender">From</label>
                                                    <div class="col-sm-8">    
                                                         <div class="input-group clockpicker">
                                                            <input type="text" class="form-control"  data-language='en' placeholder="Evenging Calling Hour" required="">
                                                            <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-sm-4" name="prefered_mng_time" for="gender">TO</label>
                                                    <div class="col-sm-8">    
                                                         <div class="input-group clockpicker">
                                                            <input type="text" class="form-control"  data-language='en' placeholder="Evenging Calling Hour" required="">
                                                            <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                     </div>
                                  </div>
                               </fieldset>
                               
                               <div class="form-group">
                                        <label class="control-label col-sm-4" for="State">Photo <font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                         <input type="file" name="c_photo" id="c_photo" required="" onChange="PreviewImage();" >
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="email">Photo Previous :<span style="color: red"> *</span></label>
                                        <div class="col-sm-8">
                                            <img src=""  width="150"  height="150" id="photopreview" name="photopreview"><br>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">Academic Information</div>
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="College">Name Of The College <font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="College" class="form-control"  id="College" placeholder="Enter College Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Board">Board<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Board" class="form-control"  id="Board" placeholder="Enter Board Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="pass_year">Year of Passing<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="pass_year" class="form-control"  id="pass_year" placeholder="Enter Passing Year">
                                        </div>
                                    </div>
                                         
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Academic">Degree<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                            <select name="Academic" class="form-control" required="">
                                                <option>--Select Degree--</option>
                                                <?php 
                                                $query_specilalization="SELECT * FROM `kiit_accademy` WHERE `A_Status`='1'";
                                                $sql_specil=mysqli_query($conn,$query_specilalization);
                                                while ($res_spec=mysqli_fetch_assoc($sql_specil)) {
                                                    ?>
                                                    <option value="<?=$res_spec['A_slno']?>"><?=$res_spec['A_name']?></option>
                                                    <?php
                                                }

                                                ?>
                                            </select>
                                          <!-- <input type="text" name="Academic" class="form-control"  id="Academic" placeholder="Enter Academic Name"> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4" for="Branch">Branch<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="text" name="Branch" class="form-control"  id="Branch" placeholder="Enter Your Branch">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-sm-4" for="attach_Id">Attach Id<font color="red"><sup><b> * </b></sup> </font></label>
                                        <div class="col-sm-8">
                                          <input type="file" name="attach_Id" class="form-control"  id="attach_Id" placeholder="Enter Your ID">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">Mark Details</div>
                            <div class="panel-body">       
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Marks</th>
                                                <th>Degree</th>
                                                <th>Year Of Passing</th>
                                                <th>Name Of The Institution</th>
                                                <th>Board</th>
                                                <th>Expload MarkSheet (Attachments)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10<sup>th</sup></td>
                                                <td> <input type="text" name="10th_Marks" class="form-control"  id="10th_Marks" placeholder="Enter Your 10th Marks"></td>
                                                <td><select name="10_specialization" class="form-control" required="">
                                                    <option value="">--Please Select--</option>
                                                    <option value="All">All</option>
                                                </select> </td>
                                                <td> <input type="text" name="10th_pass_year" class="form-control"  id="10th_pass_year" placeholder="Enter Your 10th Passing Year"></td>
                                                <td><input type="text" name="school_name" class="form-control"  id="school_name" placeholder="Enter School Name "></td>
                                                <td><input type="text" name="Board" class="form-control"  id="Board" placeholder="Enter Your Board"></td>
                                                <td><input type="file" name="10th_attach_file" class="form-control" id="10th_attach_file"></td>
                                            </tr>
                                            <tr>
                                                <td>ITI</td>
                                                <td>  <input type="text" name="ITI_marks" class="form-control"  id="ITI_marks" placeholder="Enter Your ITI Marks"></td>
                                                <td> 
                                                    <select name="ITI_specializaton" class="form-control" required="">
                                                    <option value="">--Please Select--</option>
                                                    <?php 
                                                    
                                                    $get_branch="SELECT * FROM `kiit_branch` WHERE `B_academy_id`='2'";
                                                    $sql_branch=mysqli_query($conn,$get_branch);
                                                    while($res=mysqli_fetch_assoc($sql_branch)){
                                                      //  print_r($res);
                                                    ?>
                                                    <option value="<?=strtoupper($res['B_slno'])?>"><?=strtoupper($res['B_branch']);?></option>
                                                        <?php }?>
                                                </select> 
                                                   
                                                </td>
                                                <td> <input type="text" name="ITI_pass_year" class="form-control"  id="ITI_pass_year" placeholder="Enter Your ITI Passing Year"></td>
                                                <td><input type="text" name="ITI_school_name" class="form-control"  id="ITI_school_name" placeholder="Enter Your ITI School Name"></td>
                                                <td><input type="text" name="ITI_Board" class="form-control"  id="ITI_Board" placeholder="Enter Your ITI Board"></td>
                                                <td><input type="file" name="Attach_ITI_Marks" class="form-control"  id="Attach_ITI_Marks" ></td>
                                            </tr>
                                            <tr>
                                                <td>Diploma</td>
                                                <td><input type="text" name="Diploma_Marks" class="form-control"  id="Diploma_Marks" placeholder="Enter Your Diploma Marks"></td>
                                                <td><select name="Diploma_Specialization" class="form-control" required="">
                                                    <option value="">--Please Select--</option>
                                                    <?php 
                                                   // include 'admin_final/config.php';
                                                    $get_branc01h="SELECT * FROM `kiit_branch` WHERE `B_academy_id`='1'";
                                                    $sql_branch1=mysqli_query($conn,$get_branc01h);
                                                    while($res1=mysqli_fetch_assoc($sql_branch1)){
                                                        //print_r($res);
                                                    ?>
                                                    <option value="<?=strtoupper($res1['B_slno'])?>"><?=strtoupper($res1['B_branch']);?></option>
                                                        <?php }?>
                                                    </select>
                                                    </td>
                                                <td>
                                                    <input type="text" name="diploma_pass_year" class="form-control"  id="diploma_pass_year" placeholder="Enter Your Diploma Passing Year">
                                                </td>
                                                    
                                                <td> <input type="text" name="diploma_school_name" class="form-control"  id="diploma_school_name" placeholder="Enter Your Diploma School Name"></td>
                                                <td> <input type="text" name="diploma_board" class="form-control"  id="diploma_board" placeholder="Enter Your Diploma Board"></td>
                                                
                                                <td><input type="file" name="diploma_attach_file" class="form-control"  id="diploma_attach_file" ></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">Work Expience Information</div>
                            <div class="panel-body">    
                               <div class="form-group">
                                    <label class="control-label col-sm-2" for="Toatal_Experience">Total Experience <font color="red"><sup><b> * </b></sup> </font></label>
                                    <div class="col-sm-8">
                                      <input type="text" name="Toatal_Experience" class="form-control"  id="Toatal_Experience" placeholder="Enter Your Toatal Experience">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="exp_summery">Experience Summery<font color="red"><sup><b> * </b></sup> </font></label>
                                   <div class="col-sm-8">
                                    <textarea name="exp_summery" class="form-control"  id="exp_summery" placeholder="Enter Your Experience Summery"></textarea>
                                   </div>
                                </div>
                            </div>
                        </div>
                            </form>
                        <center><input type="submit" value="Submit" name="submit"></center>
                     </div>
                </div>          
            </form> 
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
  </script>