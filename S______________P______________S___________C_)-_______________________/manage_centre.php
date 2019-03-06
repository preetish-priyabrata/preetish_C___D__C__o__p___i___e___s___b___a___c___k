<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
?>
<!--<script>
            $(function () {
                $("#doe1").datepicker({
                     changeMonth: true,
                    changeYear: true,
					yearRange: "1980:2020",
					dateFormat: "yy-mm-dd" 
                });
				 $("#doe2").datepicker({
                     changeMonth: true,
                    changeYear: true,
					yearRange: "1980:2020",
					dateFormat: "yy-mm-dd" 
                });
				$("#doe3").datepicker({
                     changeMonth: true,
                    changeYear: true,
					yearRange: "1980:2020",
					dateFormat: "yy-mm-dd" 
                });
				
            });
        </script>-->
        
<div class="col-lg-12">
<legend><h3>Manage Centre</h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
    <ul id="tabs">
      <li><a id="current" href="#" name="#add_centre">Add Centre</a></li>
      <li><a id="" href="#" name="#update_centre">Update Centre</a></li>
      <li><a id="" href="#" name="#delete_centre">Delete Centre</a></li>
      <li><a id="" href="#" name="#archieve">Archieve</a></li>
    </ul>

                          <div id="content">
                              <div style="display: none;" id="add_centre">
                               <div class="col-md-6">
                                 <form action="save_manage_center.php" id="addcentre" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <td>Exam Name</td>
                  <td><select id="ename1" onchange="show_exam_date(this.value);" name="ename1" class="form-control">
                  <option value="">--Select Exam--</option>
                  <?php
				  $qry_exam="SELECT * FROM `exam_master_data`";
				  $sql_exam=mysqli_query($conn, $qry_exam);
				  while($res_exam=mysqli_fetch_array($sql_exam))
				  {
                  ?>
                  <option value="<?php echo $res_exam["examname"]; ?>"><?php echo $res_exam["examname"]; ?></option>
                  <?php
				  }
				  ?>
                  </select></td>
                  </tr>
                  
                  </table>
                  <table class="table" id="centre_data">
                  </table>
                  <center><input type="submit" id="save" name="save" value="Save" class="btn-primary"></center>
                  	
                         </form>
                                
                              </div>
                              
                              </div>
                              <div style="display: none;" id="update_centre">
                               <div class="col-md-6">
                                 <form action="" id="updatecentre" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                   <table class="table">
                  <tr>
                  <td>Exam Name</td>
                  <td><select id="ename2" name="ename2" class="form-control">
                  <option value="">--select exam name--</option>
                  <option>state IT officer</option></select></td>
                  </tr>
                  <tr>
                  <td>Date Of Exam</td>
                  <td><input type="text" id="doe2" name="doe2" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Exam Centre</td>
                  <td><select id="cen2" name="cen2" class="form-control" onChange="show_centre_details(this.value);">
                  <option value="">--select exam centre--</option></select></td>
                  </tr>
                  </table>
                  <table id="centre_details" class="table">
                  
                  </table>
                                           </form>
 
                         </div>
                              </div>
                              <div style="display: none;" id="delete_centre">
                               <div class="col-md-6">
                                 <form action="" id="deletecentre" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <td>Exam Name</td>
                  <td><select id="ename3" name="ename3" class="form-control">
                  <option value="">--select exam name--</option>
                  <option>state IT officer</option></select></td>
                  </tr>
                  <tr>
                  <td>Date Of Exam</td>
                  <td><input type="text" id="doe3" name="doe3" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Exam Centre</td>
                  <td><select id="cen3" name="cen3" class="form-control">
                  <option value="">--select exam centre--</option></select></td>
                  </tr>
                  
                  </table>
                  	<center><input type="button" id="delete" name="delete" value="Delete" class="btn-primary"></center>
                         </form> 
                              </div>
                              </div>
                              <div style="display: none;" id="archieve">
                               <div class="col-md-6">
                                 <form action="" id="archv" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  
                  </table>
                  	
                         </form> 
                              </div>
                              </div>
                                      
                                                     </div>
                          
                          
                          
                        </div>
                        
                      </div>
                      
                      </div>
                  
                  </div>
                </div>
              </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>