 <?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['user']=="candidate@gmail.com")
{
?>
<div class="col-lg-4"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h3>View Notice</h3></legend>
					<table class="table">
                  <tr>
                  <th style="text-align:center">Date</th>
                  <th style="text-align:center">Notice</th>
                  </tr>
                  <tr>
                  <td>01/12/2015</td>
                  <td align="justify">sdhdfg sdgfudgf sfdsudyasdue urfrf irnv nfj  e if e ffffffjrf fiirt  gridr jirgr  jgrig gjigperg fjdfd ncds erw ret vcxvxcvvf e fsef fdsfu osidf ereiufrdiof efr ehurf fd fdfheur rferer huyua fhvvxvresvs rferu</td>
                  </tr>
                  <tr>
                  <td>30/11/2015</td>
                  <td align="justify">gridr jirgr  jgrig gjigperg fjdfd ncds erw ret vcxvxcvvf ereiu  frdiof efr ehurf fd fdfheur rferer huyua fhvvxvresvs rferu  e fsef sdhdfg sdgfudgf sfdsudyasdue urfrf irnv nfj  e if e ffffffjrf fiirt   fdsfu osidf </td>
                  </tr>
                  </table>
                
                              </div>
                               </div>
                               </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>