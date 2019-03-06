<?php
error_reporting(0);
session_start();
include "../config.php";
$qry_hd = $_REQUEST['qry_hd'];

$qry="SELECT * FROM `enquiry_table` WHERE `enq_hdng`='$qry_hd' order by 'DESC'";	$sql=mysqli_query($conn, $qry);
	$res=mysqli_fetch_array($sql);
?>
<div class="tab-content">
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">
<legend><h4>Queries</h4></legend>
<table class="table">
<tr>
<td>From:-</td>
<td><?php echo $res["username"]; ?></td>
</tr>
<tr>
<td>Message:-</td>
<td><?php echo $res["enquiry_text"]; ?></td>
</tr>
</table>
<center><input type="button" id="reply" name="reply" value="Reply" class="btn-primary" onclick="show_reply();" />&nbsp;<input type="button" id="close" name="close" value="Close" class="btn-primary" onclick="close_msg();" /></center>
<form action="save_response.php" id="response" name="response" enctype="multipart/form-data" method="post" role="form" novalidate>
<input type="hidden" id="curr_date" name="curr_date" value="<?php echo date("Y-m-d") ?>" />
<input type="hidden" id="curr_time" name="curr_time" value="<?php echo  date("h:i:s") ?>" />
<input type="hidden" id="rcvr_name" name="rcvr_name" value="<?php echo  $res["username"]; ?>" />
<table id="reply_table" class="table" style="display:none">
<tr>
<td>Heading</td>
<td><input type="text" id="resp_hdng" name="resp_hdng" class="form-control" /></td>
</tr>
<tr>
<td>Message</td>
<td><textarea cols="70" rows="3" id="resp_msg" name="resp_msg" class="form-control"></textarea></td>
</tr>
<tr>
<td colspan="2" style="text-align:center"><input type="submit" id="send" name="send" value="Send" onclick="close_msg();" class="btn-primary"/></td>
</tr>
</table>
</form>
</div>
                               </div>