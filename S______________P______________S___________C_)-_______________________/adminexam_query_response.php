<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['adminexam_user'])
{
	$qry_enqry="SELECT * FROM `enquiry_table`";
	$sql_enqry=mysqli_query($conn, $qry_enqry);
	
?>
<script>
function close_msg()
{
window.location.href="admin_query_response.php";
}
function show_reply()
{
document.getElementById("reply_table").setAttribute("class","table");	
document.getElementById("reply_table").style.display="block";
document.getElementById("msg").setAttribute("class","form-control");

}
</script>
<div class="col-lg-4"> 
                <div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h4>Queries</h4></legend>
<table class="table">
<?php
while($res_enqry=mysqli_fetch_array($sql_enqry))
{ $i=1;
?>
<tr>
<td><?php echo $i; ?>.</td>
<td><a onclick="show_query('<?php echo $res_enqry["enq_hdng"]; ?>');"><?php echo $res_enqry["enq_hdng"]; ?></a></td>
<td><?php echo $res_enqry["date"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</div>
                               </div>
                               </div>
                               <div class="col-lg-6" id="show_query"> 
                
                               </div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>