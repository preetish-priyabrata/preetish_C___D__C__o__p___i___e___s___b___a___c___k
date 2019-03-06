<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['user']=="admintech@gmail.com")
{
?>
<script>
            $(function () {
                $("#doe1").datepicker({
                     changeMonth: true,
                    changeYear: true,
					yearRange: "1980:2020",
					dateFormat: "yy-mm-dd" 
                });
			 });
        </script>
<div class="col-lg-12">
<legend><h3>Manage Exam</h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
    <ul id="tabs">
      <li><a id="current" href="#" name="#add_exam">Add Exam</a></li>
      <li><a id="" href="#" name="#update_exam">Update Exam</a></li>
      <li><a id="" href="#" name="#archieve">Archieve</a></li>
    </ul>

                          <div id="content">
                              <div style="display: none;" id="add_exam">
                               <div class="col-md-6">
                                 <form action="save_manage_exam.php" id="addexam" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <td>Exam Name</td>
                  <td><input type="text" id="ename1" name="ename1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Department</td>
                  <td><select id="dep1" name="dep1" class="form-control">
                  <option value="">--select department--</option>
                  <option>department-1</option>
                  <option>department-2</option>
                  <option>department-3</option>
                  <option>department-4</option></select>
                  </td>
                  </tr>
                  <tr>
                  <td>Date Of Exam</td>
                  <td><input type="text" id="doe1" name="doe1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Venue</td>
                  <td><input type="text" id="ven1" name="ven1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Instructions</td>
                  <td><textarea id="ins1" name="ins1" class="form-control"></textarea></td>
                  <td><input type="file" id="insupld1" name="insupld1" class="form-control"></td>
                  </tr>
                  <tr>
                  <td>Documents To Be Submited</td>
                  <td><textarea id="dtbs1" name="dtbs1" class="form-control"></textarea></td>
                  <td><input type="file" id="dtbsupld1" name="dtbsupld1" class="form-control"></td>
                  </tr>
                  <tr>
                  <td>Eligibility Criteria</td>
                  <td><textarea id="ec1" name="ec1" class="form-control"></textarea></td>
                  <td><input type="file" id="ecupld1" name="ecupld1" class="form-control"></td>
                  </tr>
                  </table>
                  <center><input type="submit" id="save" name="save" value="Save" class="btn-primary"></center>
                  	
                         </form>
                                
                              </div>
                              
                              </div>
                              <div style="display: none;" id="update_exam">
                               <div class="col-md-6">
                                 <form action="update_manage_exam.php" id="updateexam" enctype="multipart/form-data" method="post" role="form" novalidate>
              <?php
			  $qry_updt="SELECT * FROM `exam_master_data`";
			  $sql_updt=mysqli_query($conn, $qry_updt);
			  ?>
                  <table class="table">
                  <tr>
                  <td>Exam Name</td>
                  <td><select id="ename2" onchange="show_manage_exam_updt_dep(this.value);"  name="ename2" class="form-control">
                  <option value="">--Select Exam--</option>
                  <?php
				  while($res_updt=mysqli_fetch_array($sql_updt))
				  {
				  ?>
                  <option value="<?php echo $res_updt["examname"]; ?>"><?php echo $res_updt["examname"]; ?></option>
                  <?php
				  }
				  ?>
                  </select></td>
                  </tr>
                  <tr>
                  <td>Department</td>
                  <td><select id="dep2" onchange="show_manage_exam_updt_info(this.value);" name="dep2" class="form-control">
                  <option value="">--Select Department--</option>
                  </select></td>
                  </tr>
                  </table>
                  <table class="table" id="show_date_venue">
                  </table>
                  <center><input type="submit" id="update" disabled="disabled" name="update" value="Update" class="btn-primary"></center>
                  	
                         </form>
 
                         </div>
                              </div>
                              <div style="display: none;" id="archieve">
                               <div class="col-md-6">
                                 <form action="" id="archv" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  <tr>
                  <th>Exam Name</th>
                  <td>State IT Officer</td>
                  </tr>
                  <tr>
                  <th>Department</th>
                  <td>department-1</td>
                  </tr>
                  <tr>
                  <th>Date Of Exam</th>
                  <td>2016-01-01</td>
                  </tr>
                  <tr>
                  <th>Venue</th>
                  <td>Tadong</td>
                  </tr>
                  <tr>
                  <th>Instructions</th>
                  <td>download the attachment</td>
                  <td><a>Download</a></td>
                  </tr>
                  <tr>
                  <th>Documents To Be Submited</th>
                  <td>download the attachment</td>
                  <td><a>Download</a></td>
                  </tr>
                  <tr>
                  <th>Eligibility Criteria</th>
                  <td>download the attachment</td>
                  <td><a>Download</a></td>
                  </tr>
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