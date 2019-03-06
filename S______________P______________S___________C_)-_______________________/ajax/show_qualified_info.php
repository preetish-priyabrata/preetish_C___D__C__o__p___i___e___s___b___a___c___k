<?php
error_reporting(0);
session_start();
include "../config.php";

$c_ur=$_REQUEST["c_ur"];
$c_bl=$_REQUEST["c_bl"];
$c_bl_w=$_REQUEST["c_bl_w"];
$c_bl_bpl=$_REQUEST["c_bl_bpl"];
$c_obc_cl=$_REQUEST["c_obc_cl"];
$c_obc_cl_w=$_REQUEST["c_obc_cl_w"];
$c_obc_cl_bpl=$_REQUEST["c_obc_cl_bpl"];
$c_obc_sl=$_REQUEST["c_obc_sl"];
$c_obc_sl_w=$_REQUEST["c_obc_sl_w"];
$c_obc_sl_bpl=$_REQUEST["c_obc_sl_bpl"];
$c_st=$_REQUEST["c_st"];
$c_st_w=$_REQUEST["c_st_w"];
$c_st_bpl=$_REQUEST["c_st_bpl"];
$c_sc=$_REQUEST["c_sc"];
$c_sc_w=$_REQUEST["c_sc_w"];
$c_sc_bpl=$_REQUEST["c_sc_bpl"];
$c_pt=$_REQUEST["c_pt"];
$c_pt_w=$_REQUEST["c_pt_w"];
$exam=$_REQUEST["exm1"];

//total qualified
$qry_tq1="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='GEN/UR[unreserved]' AND b.secured_mark>='$c_ur' AND a.roll_no=b.roll_no";
$sql_tq1=mysqli_query($conn, $qry_tq1);
$res_tq1=mysqli_num_rows($sql_tq1);

$qry_tq2="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL' AND b.secured_mark>='$c_bl' AND a.roll_no=b.roll_no";
$sql_tq2=mysqli_query($conn, $qry_tq2);
$res_tq2=mysqli_num_rows($sql_tq2);

$qry_tq3="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL(W)' AND b.secured_mark>='$c_bl_w' AND a.roll_no=b.roll_no";
$sql_tq3=mysqli_query($conn, $qry_tq3);
$res_tq3=mysqli_num_rows($sql_tq3);

$qry_tq4="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL(BPL)' AND b.secured_mark>='$c_bl_bpl' AND a.roll_no=b.roll_no";
$sql_tq4=mysqli_query($conn, $qry_tq4);
$res_tq4=mysqli_num_rows($sql_tq4);

$qry_tq5="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)' AND b.secured_mark>='$c_obc_cl' AND a.roll_no=b.roll_no";
$sql_tq5=mysqli_query($conn, $qry_tq5);
$res_tq5=mysqli_num_rows($sql_tq5);

$qry_tq6="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)(W)' AND b.secured_mark>='$c_obc_cl_w' AND a.roll_no=b.roll_no";
$sql_tq6=mysqli_query($conn, $qry_tq6);
$res_tq6=mysqli_num_rows($sql_tq6);

$qry_tq7="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)(BPL)' AND b.secured_mark>='$c_obc_cl_bpl' AND a.roll_no=b.roll_no";
$sql_tq7=mysqli_query($conn, $qry_tq7);
$res_tq7=mysqli_num_rows($sql_tq7);

$qry_tq8="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)' AND b.secured_mark>='$c_obc_sl' AND a.roll_no=b.roll_no";
$sql_tq8=mysqli_query($conn, $qry_tq8);
$res_tq8=mysqli_num_rows($sql_tq8);

$qry_tq9="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)(W)' AND b.secured_mark>='$c_obc_sl_w' AND a.roll_no=b.roll_no";
$sql_tq9=mysqli_query($conn, $qry_tq9);
$res_tq9=mysqli_num_rows($sql_tq9);

$qry_tq10="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)(BPL)' AND b.secured_mark>='$c_obc_sl_bpl' AND a.roll_no=b.roll_no";
$sql_tq10=mysqli_query($conn, $qry_tq10);
$res_tq10=mysqli_num_rows($sql_tq10);

$qry_tq11="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST' AND b.secured_mark>='$c_st' AND a.roll_no=b.roll_no";
$sql_tq11=mysqli_query($conn, $qry_tq11);
$res_tq11=mysqli_num_rows($sql_tq11);

$qry_tq12="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST(W)' AND b.secured_mark>='$c_st_w' AND a.roll_no=b.roll_no";
$sql_tq12=mysqli_query($conn, $qry_tq12);
$res_tq12=mysqli_num_rows($sql_tq12);

$qry_tq13="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST(BPL)' AND b.secured_mark>='$c_st_bpl' AND a.roll_no=b.roll_no";
$sql_tq13=mysqli_query($conn, $qry_tq13);
$res_tq13=mysqli_num_rows($sql_tq13);

$qry_tq14="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC' AND b.secured_mark>='$c_sc' AND a.roll_no=b.roll_no";
$sql_tq14=mysqli_query($conn, $qry_tq14);
$res_tq14=mysqli_num_rows($sql_tq14);

$qry_tq15="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC(W)' AND b.secured_mark>='$c_sc_w' AND a.roll_no=b.roll_no";
$sql_tq15=mysqli_query($conn, $qry_tq15);
$res_tq15=mysqli_num_rows($sql_tq15);

$qry_tq16="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC(BPL)' AND b.secured_mark>='$c_sc_bpl' AND a.roll_no=b.roll_no";
$sql_tq16=mysqli_query($conn, $qry_tq16);
$res_tq16=mysqli_num_rows($sql_tq16);

$qry_tq17="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='PT' AND b.secured_mark>='$c_pt' AND a.roll_no=b.roll_no";
$sql_tq17=mysqli_query($conn, $qry_tq17);
$res_tq17=mysqli_num_rows($sql_tq17);

$qry_tq18="SELECT * FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='PT(W)' AND b.secured_mark>='$c_pt_w' AND a.roll_no=b.roll_no";
$sql_tq18=mysqli_query($conn, $qry_tq18);
$res_tq18=mysqli_num_rows($sql_tq18);

//seat reservation data
$qry_nosr="SELECT * FROM `reserved_seats_for_categories` WHERE `exam_name`='$exam'";
$sql_nosr=mysqli_query($conn, $qry_nosr);
$res_nosr=mysqli_fetch_array($sql_nosr);

//total appeared
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


?>
<input type="hidden" value="<?php echo $exam; ?>" id="exam2" name="exam2" />
<table width="97%" border="2" cellspacing="10" cellpadding="10">
    <tr>
    <th width="10%" scope="col">Sl.No.</th>
    <th width="20%" scope="col">Category</th>
    <th width="20%" scope="col">No Of Seats Reserved</th>
    <th width="20%" scope="col">Total Appeared</th>
    <th width="15%" scope="col">Cutoff</th>
    <th width="15%" scope="col">Total Qualified</th>
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
      <th width="10%" scope="row">1.</th>
      <th width="20%" scope="row">UNRESERVED</th>
      <td width="20%"><div align="center"><?php echo $res_nosr["unreserved"]; ?></div></td>
      <td width="20%"><div align="center"><?php echo $total1; ?></div></td>
      <td width="15%"><div align="center"><input type="text" id="co_ur" value="<?php echo $c_ur; ?>" name="co_ur" class="form-control"></div></td>
      <td width="15%"><div align="center"><input type="text" id="ctbc1" value="<?php echo $res_tq1; ?>" name="tq_ur" class="form-control"></div></td>
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
      <td><div align="center"><input type="text" id="co_bl" value="<?php echo $c_bl; ?>" name="co_bl" class="form-control"></div></td>
      <td><div align="center"><input type="text" value="<?php echo $res_tq2; ?>" id="ctbc2" name="tq_bl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">3.</th>
      <th scope="row">BL(W)</th>
      <td><div align="center"><?php echo $res_nosr["bl(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total3; ?></div></td>
      <td><div align="center"><input type="text" id="co_bl_w" value="<?php echo $c_bl_w; ?>" name="co_bl_w" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc3" value="<?php echo $res_tq3; ?>" name="tq_bl_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">4.</th>
      <th scope="row">BL(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["bl(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total4; ?></div></td>
      <td><div align="center"><input type="text" id="co_bl_bpl" value="<?php echo $c_bl_bpl; ?>" name="co_bl_bpl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc4" value="<?php echo $res_tq4; ?>" name="tq_bl_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">5.</th>
      <th scope="row">OBC(CL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(cl)"]; ?></div></td>
      <td><div align="center"><?php echo $total5; ?></div></td>
      <td><div align="center"><input type="text" id="co_obc_cl" value="<?php echo $c_obc_cl; ?>" name="co_obc_cl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc5" value="<?php echo $res_tq5; ?>" name="tq_obc_cl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">6.</th>
      <th scope="row">OBC(CL)(W)</th>
      <td><div align="center"><?php echo $res_nosr["obc(cl)(w)"]; ?></div></td>
 		<td><div align="center"><?php echo $total6; ?></div></td>
     <td><div align="center"><input type="text" id="co_obc_cl_w" value="<?php echo $c_obc_cl_w; ?>" name="co_obc_cl_w" class="form-control"></div></td>
      <td><div align="center"><input type="text" value="<?php echo $res_tq6; ?>" id="ctbc6" name="tq_obc_cl_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">7.</th>
      <th scope="row">OBC(CL)(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(cl)(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total7; ?></div></td>
      <td><div align="center"><input type="text" id="co_obc_cl_bpl" value="<?php echo $c_obc_cl_bpl; ?>" name="co_obc_cl_bpl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc7" value="<?php echo $res_tq7; ?>" name="tq_obc_cl_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">8.</th>
      <th scope="row">OBC(SL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(sl)"]; ?></div></td>
      <td><div align="center"><?php echo $total8; ?></div></td>
      <td><div align="center"><input type="text" id="co_obc_sl" value="<?php echo $c_obc_sl; ?>" name="co_obc_sl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc8" value="<?php echo $res_tq8; ?>" name="tq_obc_sl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">9.</th>
      <th scope="row">OBC(SL)(W)</th>
      <td><div align="center"><?php echo $res_nosr["obc(sl)(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total9; ?></div></td>
      <td><div align="center"><input type="text" id="co_obc_sl_w" value="<?php echo $c_obc_sl_w; ?>" name="co_obc_sl_w" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc9" value="<?php echo $res_tq9; ?>" name="tq_obc_sl_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">10.</th>
      <th scope="row">OBC(SL)(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["obc(sl)(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total10; ?></div></td>
      <td><div align="center"><input type="text" id="co_obc_sl_bpl" value="<?php echo $c_obc_sl_bpl; ?>" name="co_obc_sl_bpl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc10" value="<?php echo $res_tq10; ?>" name="tq_obc_sl_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">11.</th>
      <th scope="row">ST</th>
      <td><div align="center"><?php echo $res_nosr["st"]; ?></div></td>
      <td><div align="center"><?php echo $total11; ?></div></td>
      <td><div align="center"><input type="text" id="co_st" value="<?php echo $c_st; ?>" name="co_st" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc11" value="<?php echo $res_tq11; ?>" name="tq_st" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">12.</th>
      <th scope="row">ST(W)</th>
      <td><div align="center"><?php echo $res_nosr["st(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total12; ?></div></td>
      <td><div align="center"><input type="text" id="co_st_w" value="<?php echo $c_st_w; ?>" name="co_st_w" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc12" value="<?php echo $res_tq12; ?>" name="tq_st_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">13.</th>
      <th scope="row">ST(BPL)</th>
      <td><div align="center"><?php echo $res_nosr["st(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total13; ?></div></td>
      <td><div align="center"><input type="text" id="co_st_bpl" value="<?php echo $c_st_bpl; ?>" name="co_st_bpl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc13" value="<?php echo $res_tq13; ?>" name="tq_st_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">14.</th>
      <th scope="row">SC</th>
      <td><div align="center"><?php echo $res_nosr["sc"]; ?></div></td>
      <td><div align="center"><?php echo $total14; ?></div></td>
      <td><div align="center"><input type="text" id="co_sc" value="<?php echo $c_sc; ?>" name="co_sc" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc14" value="<?php echo $res_tq14; ?>" name="tq_sc" class="form-control"></div></td>
    </tr>
    <tr>
      <th height="31" scope="row">15.</th>
      <th scope="row">SC(W)</th>
      <td><div align="center"><?php echo $res_nosr["sc(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total15; ?></div></td>
      <td><div align="center"><input type="text" id="co_sc_w" value="<?php echo $c_sc_w; ?>" name="co_sc_w" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc15" value="<?php echo $res_tq15; ?>" name="tq_sc_w" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">16.</th>
     <th scope="row">SC(BPL)</th>
     <td><div align="center"><?php echo $res_nosr["sc(bpl)"]; ?></div></td>
      <td><div align="center"><?php echo $total16; ?></div></td>
      <td><div align="center"><input type="text" id="co_sc_bpl" value="<?php echo $c_sc_bpl; ?>" name="co_sc_bpl" class="form-control"></div></td>
      <td><div align="center"><input type="text" id="ctbc16" value="<?php echo $res_tq16; ?>" name="tq_sc_bpl" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">17.</th>
      <th scope="row">PT</th>
      <td><div align="center"><?php echo $res_nosr["pt"]; ?></div></td>
      <td><div align="center"><?php echo $total17; ?></div></td>
      <td><div align="center"><input type="text" name="co_pt" value="<?php echo $c_pt; ?>" id="co_pt" class="form-control"></div></td>
      <td><div align="center"><input type="text" value="<?php echo $res_tq17; ?>" id="ctbc17" name="tq_pt" class="form-control"></div></td>
    </tr>
    <tr>
      <th scope="row">18.</th>
      <th scope="row">PT(W)</th>
      <td><div align="center"><?php echo $res_nosr["pt(w)"]; ?></div></td>
      <td><div align="center"><?php echo $total18; ?></div></td>
      <td><div align="center"><input type="text" name="co_pt_w" value="<?php echo $c_pt_w; ?>" id="co_pt_w" class="form-control"></div></td>
      <td><div align="center"><input type="text" value="<?php echo $res_tq18; ?>" id="ctbc18" name="tq_pt_w" class="form-control"></div></td>
    </tr>
    <tr>
    <td colspan="2" style="text-align:center"><b>Total Seats</b></td>
    <td><div align="center"><?php echo $res_nosr["total_seat_reserved"]; ?></div></td>
    <td colspan="2" style="text-align:center"><b>Total</b></td>
    <td><div align="center"><input type="text" id="total" class="form-control" readonly style="background-color:#FFF; border:none;"></div></td>
    </tr>
  </table>
  
 </div>
 