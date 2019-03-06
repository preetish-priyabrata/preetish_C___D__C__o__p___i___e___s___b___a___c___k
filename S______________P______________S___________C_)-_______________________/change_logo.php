<?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['user']=="admin@gmail.com")
{
	
?>
<div class="col-lg-5"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h3>Change Logo</h3></legend>
                               	<form action="save_logo.php" id="chng_logo" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  
                  <tr>
                  <td style="width:30%">Upload Logo</td>
                  <td style="width:40%"><input type="file" id="logo" class="form-control" name="logo"></td>
                  <td style="width:30%"><input type="submit" id="upload" name="upload" value="Upload" class="btn-primary"></td>
                  </tr>
                  
                  </table>
                  	
                         </form>
                                
                               </div>
                               </div>
                               </div>
                              
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>