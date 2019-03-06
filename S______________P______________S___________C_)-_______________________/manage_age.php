<?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['user']=="admintech@gmail.com")
{
?>
<div class="tab-content">
<div class="col-lg-5">
				
                  <div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
                    
                  
                                 <form action="save_manage_age.php" id="manage_age" enctype="multipart/form-data" method="post" role="form" novalidate>
              <legend><b>Maximum Age Limit Of The Candidates</b></legend>
                  <table class="table">
                  <tr>
                  <td>Inservice Candidates</td>
                  <td><input type="text" id="icage" name="icage" placeholder="e.g: 80" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Temporary Service [MR/Adhoc/WC]</td>
                  <td><input type="text" id="tsage" name="tsage" placeholder="e.g: 80" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Unreserved</td>
                  <td><input type="text" id="urage" name="urage" placeholder="e.g: 80" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Reserved Category</td>
                  <td><input type="text" id="rcage" name="rcage" placeholder="e.g: 80" class="form-control"/></td>
                  </tr>
                  </table>
                  <center><input type="submit" id="submit" name="submit" value="Update" class="btn-primary"></center>
                  	
                         </form>
                                
                              </div>
                              
                              </div>
                              
              </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once'template.php';
?>