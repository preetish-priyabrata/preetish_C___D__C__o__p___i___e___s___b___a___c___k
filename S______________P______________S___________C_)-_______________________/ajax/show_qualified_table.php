<?php
error_reporting(0);
session_start();
include "../config.php";

//reserved seat data
$exam=$_REQUEST["examname"];
$qry_nosr="SELECT * FROM `reserved_seats_for_categories` WHERE `exam_name`='$exam'";
$sql_nosr=mysqli_query($conn, $qry_nosr);
$res_nosr=mysqli_fetch_array($sql_nosr);

//total_ appeared data
$qry1="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='GEN/UR[unreserved]'";
$sql1=mysqli_query($conn, $qry1);
$total1=mysqli_num_rows($sql1);

$qry2="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='BL'";
$sql2=mysqli_query($conn, $qry2);
$total2=mysqli_num_rows($sql2);

$qry3="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='BL(W)'";
$sql3=mysqli_query($conn, $qry3);
$total3=mysqli_num_rows($sql3);

$qry4="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='BL(BPL)'";
$sql4=mysqli_query($conn, $qry4);
$total4=mysqli_num_rows($sql4);

$qry5="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='OBC(CL)'";
$sql5=mysqli_query($conn, $qry5);
$total5=mysqli_num_rows($sql5);

$qry6="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='OBC(CL)(W)'";
$sql6=mysqli_query($conn, $qry6);
$total6=mysqli_num_rows($sql6);

$qry7="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='OBC(CL)(BPL)'";
$sql7=mysqli_query($conn, $qry7);
$total7=mysqli_num_rows($sql7);

$qry8="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='OBC(SL)'";
$sql8=mysqli_query($conn, $qry8);
$total8=mysqli_num_rows($sql8);

$qry9="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='OBC(SL)(W)'";
$sql9=mysqli_query($conn, $qry9);
$total9=mysqli_num_rows($sql9);

$qry10="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='OBC(SL)(BPL)'";
$sql10=mysqli_query($conn, $qry10);
$total10=mysqli_num_rows($sql10);

$qry11="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='ST'";
$sql11=mysqli_query($conn, $qry11);
$total11=mysqli_num_rows($sql11);

$qry12="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='ST(W)'";
$sql12=mysqli_query($conn, $qry12);
$total12=mysqli_num_rows($sql12);

$qry13="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='ST(BPL)'";
$sql13=mysqli_query($conn, $qry13);
$total13=mysqli_num_rows($sql13);

$qry14="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='SC'";
$sql14=mysqli_query($conn, $qry14);
$total14=mysqli_num_rows($sql14);

$qry15="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='SC(W)'";
$sql15=mysqli_query($conn, $qry15);
$total15=mysqli_num_rows($sql15);

$qry16="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='SC(BPL)'";
$sql16=mysqli_query($conn, $qry16);
$total16=mysqli_num_rows($sql16);

$qry17="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='PT'";
$sql17=mysqli_query($conn, $qry17);
$total17=mysqli_num_rows($sql17);

$qry18="SELECT * FROM `candidate_application_info` WHERE `exam_name`='$exam' AND `attendance_status`='P' AND `category`='PT(w)'";
$sql18=mysqli_query($conn, $qry18);
$total18=mysqli_num_rows($sql18);

//total qualified data
$qry_tq="SELECT * FROM `categorywise_total_qualified_info` WHERE `exam_name`='$exam'";
$sql_tq=mysqli_query($conn, $qry_tq);
$num_tq=mysqli_num_rows($sql_tq);
$res_tq=mysqli_fetch_array($sql_tq);


?>

<style type="text/css">
.tab-content .col-lg-12 #general div table tr td b {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<div class="tab-content">
<div class="col-lg-12">
<?php
if($num_tq==0)
{
?>
<div style="color:#F00; background-color:#CCF; border:2px solid thin #000;">*Result Not Prepared</div>
<?php
}
else
{
?>
<div role="tabpanel" class="well modal-content form-horizontal tab-pane active fade in" id="general">

<table width="97%" border="2" cellspacing="10" cellpadding="10">
    <tr>
    <th width="5%" scope="col">Sl.No.</th>
    <th width="25%" scope="col">Category</th>
    <th width="25%" scope="col">No Of Seats Reserved</th>
    <th width="25%" scope="col">Total Appeared</th>
    <th width="20%" scope="col">Total Qualified</th>
  </tr>
 </table>
   <div style="height:300px; overflow:scroll; ">
  <table width="100%" border="2" cellspacing="10" cellpadding="10">
    <!--<tr>
    <th scope="col">Sl.No.</th>
    <th scope="col">Category</th>
    <th scope="col">Total Appeared</th>
    <th scope="col">Total Qualified</th>
    <th scope="col">Total Not Qualified</th>
    <th scope="col">Total MP</th>
    <th scope="col">No Of Seats Reserved</th>
    <th scope="col">Candidates To Be Called</th>
  </tr>-->
  <tr>
      <th width="7%" scope="row">1.</th>
      <th width="23%" scope="row">UNRESERVED</th>
      <td width="25%"><div align="center"><?php echo $res_nosr["unreserved"]; ?></div></td>
      <td width="25%"><div align="center"><?php echo $total1; ?></div></td>
      <td width="20%"><div align="center"><input type="text" id="ctbc1" readonly="readonly" value="<?php echo $res_tq["unreserved"]; ?>" name="tq_ur" class="form-control"></div></td>
    </tr>
    <!--<tr>
      <th width="6%" scope="row">1.</th>
      <th width="19%" scope="row">UNRESERVED</th>
      <td width="11%">422</td>
      <td width="12%">380</td>
      <td width="12%">36</td>
      <td width="10%">6</td>
      <td width="15%">&nbsp;</td>
      <td width="15%"><input type="text" class="form-control"></td>
    </tr>-->
    <tr>
      <th scope="row">2.</th>
      <th scope="row">BL</th>
      <td><div align="center"><?php echo $res_nosr["bl"]; ?></div></td>
      <td><div align="center"><?php echo $total2; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc2" readonly="readonly" value="<?php echo $res_tq["bl"]; ?>" name="tq_bl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">3.</th>
      <th scope="row">BL(W)</th>
      <td><div align="center"><?php echo $res_nosr["bl(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total3; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc3" readonly="readonly" value="<?php echo $res_tq["bl(w)"]; ?>" name="tq_bl_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">4.</th>
      <th scope="row">BL(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["bl(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total4; ?></div></td>
      <td><div align="center"><input type="text" readonly="readonly" value="<?php echo $res_tq["bl(bpl)"]; ?>" id="ctbc4" onkeyup="sum();" name="tq_bl_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">5.</th>
      <th scope="row">OBC(CL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(cl)"]; ?></div></td>
      <td><div align="center"><?php echo $total5; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc5" readonly="readonly" value="<?php echo $res_tq["obc(cl)"]; ?>" name="tq_obc_cl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">6.</th>
      <th scope="row">OBC(CL)(W)</th>
      <td><div align="center"><?php echo $res_nosr["obc(cl)(w)"]; ?></div></td>
 		<td><div align="center"><?php echo $total6; ?></div></td>
     <td><div align="center"><input type="text" readonly="readonly" value="<?php echo $res_tq["obc(cl)(w)"]; ?>" id="ctbc6" name="tq_obc_cl_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">7.</th>
      <th scope="row">OBC(CL)(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(cl)(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total7; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc7" readonly="readonly" value="<?php echo $res_tq["obc(cl)(bpl)"]; ?>" name="tq_obc_cl_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">8.</th>
      <th scope="row">OBC(SL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(sl)"]; ?></div></td>
      <td><div align="center"><?php echo $total8; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc8" readonly="readonly" value="<?php echo $res_tq["obc(sl)"]; ?>" name="tq_obc_sl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">9.</th>
      <th scope="row">OBC(SL)(W)</th>
      <td><div align="center"><?php echo $res_nosr["obc(sl)(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total9; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc9" readonly="readonly" value="<?php echo $res_tq["obc(sl)(w)"]; ?>" name="tq_obc_sl_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">10.</th>
      <th scope="row">OBC(SL)(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(sl)(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total10; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc10" readonly="readonly" value="<?php echo $res_tq["obc(sl)(bpl)"]; ?>" name="tq_obc_sl_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">11.</th>
      <th scope="row">ST</th>
      <td><div align="center"><?php echo $res_nosr["st"]; ?></div></td>
      <td><div align="center"><?php echo $total11; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc11" readonly="readonly" value="<?php echo $res_tq["st"]; ?>" name="tq_st" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">12.</th>
      <th scope="row">ST(W)</th>
      <td><div align="center"><?php echo $res_nosr["st(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total12; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc12" readonly="readonly" value="<?php echo $res_tq["st(w)"]; ?>" name="tq_st_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">13.</th>
      <th scope="row">ST(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["st(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total13; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc13" readonly="readonly" value="<?php echo $res_tq["st(bpl)"]; ?>" name="tq_st_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">14.</th>
      <th scope="row">SC</th>
      <td><div align="center"><?php echo $res_nosr["sc"]; ?></div></td>
      <td><div align="center"><?php echo $total14; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc14" readonly="readonly" value="<?php echo $res_tq["sc"]; ?>" name="tq_sc" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">15.</th>
      <th scope="row">SC(W)</th>
      <td><div align="center"><?php echo $res_nosr["sc(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total15; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc15" readonly="readonly" value="<?php echo $res_tq["sc(w)"]; ?>" name="tq_sc_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">16.</th>
     <th scope="row">SC(BPL)</th>
     <td><div align="center"><?php echo $res_nosr["sc(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total16; ?></div></td>
      <td><div align="center"><input type="text" id="ctbc16" readonly="readonly" value="<?php echo $res_tq["sc(bpl)"]; ?>" name="tq_sc_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">17.</th>
      <th scope="row">PT</th>
      <td><div align="center"><?php echo $res_nosr["pt"]; ?></div></td>
      <td><div align="center"><?php echo $total17; ?></div></td>
      <td><div align="center"><input type="text" readonly="readonly" value="<?php echo $res_tq["pt"]; ?>" id="ctbc17" name="tq_pt" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">18.</th>
      <th scope="row">PT(W)</th>
      <td><div align="center"><?php echo $res_nosr["pt(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total18; ?></div></td>
      <td><div align="center"><input type="text" readonly="readonly" value="<?php echo $res_tq["pt(w)"]; ?>" id="ctbc18" name="tq_pt_w" class="form-control"></div></td>
    </tr>
    
  </table>
  
  </div>
  
</div>
<?php
$qry_chk="SELECT * FROM `postexam_status` WHERE `exam_name`='$exam'";
$sql_chk=mysqli_query($conn, $qry_chk);
$num_rows=mysqli_num_rows($sql_chk);
if($num_rows==0)
{
	?>
<center><input type="submit" id="publish" name="publish" value="Publish" class="btn-primary"></center>
<?php
}
}
?>
</div>
</div>