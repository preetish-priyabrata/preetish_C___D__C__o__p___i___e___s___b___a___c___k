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
<legend><h3>Change Footer Name</h3></legend>
                               	<form action="save_footer_name.php" id="chng_footer" name="chng_footer" enctype="multipart/form-data" method="post" role="form" novalidate>
              
                  <table class="table">
                  
                  <tr>
                  <td style="width:30%">Footer Name</td>
                  <td style="width:40%"><input type="text" style="text-transform:uppercase" id="ftr" class="form-control" name="ftr"></td>
                  <td style="width:30%"><input type="submit" id="submit" name="submit" value="Submit" class="btn-primary"></td>
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