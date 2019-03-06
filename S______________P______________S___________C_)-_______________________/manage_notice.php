<?php
error_reporting(0);
ob_start();
include "config.php";
session_start();
if($_SESSION['user']=="admintech@gmail.com")
{
	date_default_timezone_set('Asia/Calcutta');	
?>
<div class="col-lg-12">
<legend><h3>Manage Notice</h3></legend>
                <div class="tab-content">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                      <div align="center" id="txtHint">
                      <div class="row">
                        <div class="col-md-12">
                          
    <ul id="tabs">
      <li><a id="current" href="#" name="#add_notice">Add Notice</a></li>
      <li><a id="" href="#" name="#archieve">Archieve</a></li>
    </ul>

                          <div id="content">
                              <div style="display: none;" id="add_notice">
                               <div class="col-md-6">
                                 <form action="save_manage_notice.php" id="addnotice" enctype="multipart/form-data" method="post" role="form" novalidate>
              <input type="hidden" id="notice_dt" name="notice_dt" value="<?php echo date("Y-m-d") ?>" />
              <input type="hidden" id="notice_time" name="notice_time" value="<?php echo date("h:i:s") ?>" />
                  <table class="table">
                  <tr>
                  <td>Notice Heading</td>
                  <td><textarea id="nothd" name="nothd" class="form-control"></textarea></td>
                  </tr>
                  <tr>
                  <td>Notice Content</td>
                  <td><textarea id="notcont" name="notcont" class="form-control"></textarea></td>
                  <td width="40%"><input type="file" id="ncupld" name="ncupld" class="form-control"></td>
                  </tr>
                  
                  </table>
                  <center><input type="submit" id="save" name="save" value="Save" class="btn-primary"></center>
                  	
                         </form>
                                
                              </div>
                              
                              </div>
                              
                              <div style="display: none;" id="archieve">
                               <div class="col-md-6">
                         <?php
						 $qry="SELECT * FROM `notice_master_data` ORDER BY `slno` DESC limit 0,1";
						 $sql=mysqli_query($conn, $qry);
						 $res=mysqli_fetch_array($sql);
						 ?>        
              
                 <table class="table">
                 <tr>
                 <th>Notice Date</th>
                 <td><?php echo $res["date"]; ?></td>
                 </tr>
                  <tr>
                  <th>Notice Heading</th>
                  <td><?php echo $res["heading"]; ?></td>
                  </tr>
                  <tr>
                  <th width="30%">Notice Content</th>
                  <td width="50%"><?php echo $res["notice_txt"]; ?></td>
                  <td width="20%"><a target="_blank" href="uploads/notices/<?php echo $res["notice_attachment"]; ?>">Download</a></td>
                  </tr>
                  
                  </table>
                          
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