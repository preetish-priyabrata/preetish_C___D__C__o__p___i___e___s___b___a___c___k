<?php
error_reporting(0);
ob_start();
session_start();
if($_SESSION['user']=="admin@gmail.com")
{
?>
<div class="col-lg-4"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h3>Change Password</h3></legend>
                               	<table class="table">
                                <tr>
                                <td>Old Password</td>
                                <td><input type="password" id="oldpass" name="oldpass" class="form-control" /></td>
                                </tr>
                                <tr>
                                <td>New Password</td>
                                <td><input type="password" id="newpass" name="newpass" class="form-control" /></td>
                                </tr>
                                <tr>
                                <td>Confirm New Password</td>
                                <td><input type="password" id="confnewpass" name="confnewpass" class="form-control" /></td>
                                </tr>
                                </table>
                                <center><input type="submit" name="submit" id="submit" value="Submit" class="btn-primary" /></center>
                               </div>
                               </div>
                               </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>