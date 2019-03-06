<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
$exam=$_REQUEST["exam"];

//candidate to be called data
	$ctbc_ur=$_REQUEST["ur"];
	$ctbc_bl=$_REQUEST["bl"];
	$ctbc_bl_w=$_REQUEST["bl_w"];
	$ctbc_bl_bpl=$_REQUEST["bl_bpl"];
	$ctbc_obc_cl=$_REQUEST["obc_cl"];
	$ctbc_obc_cl_w=$_REQUEST["obc_cl_w"];
	$ctbc_obc_cl_bpl=$_REQUEST["obc_cl_bpl"];
	$ctbc_obc_sl=$_REQUEST["obc_sl"];
	$ctbc_obc_sl_w=$_REQUEST["obc_sl_w"];
	$ctbc_obc_sl_bpl=$_REQUEST["obc_sl_bpl"];
	$ctbc_st=$_REQUEST["st"];
	$ctbc_st_w=$_REQUEST["st_w"];
	$ctbc_st_bpl=$_REQUEST["st_bpl"];
	$ctbc_sc=$_REQUEST["sc"];
	$ctbc_sc_w=$_REQUEST["sc_w"];
	$ctbc_sc_bpl=$_REQUEST["sc_bpl"];
	$ctbc_pt=$_REQUEST["pt"];
	$ctbc_pt_w=$_REQUEST["pt_w"];
	
//insert into candidate_selected_for_interview table	
	$qry_ctbc="INSERT INTO `candidate_selected_for_interview`(`slno`, `exam_name`, `unreserved`, `bl`, `bl(w)`, `bl(bpl)`, `obc(cl)`, `obc(cl)(w)`, `obc(cl)(bpl)`, `obc(sl)`, `obc(sl)(w)`, `obc(sl)(bpl)`, `st`, `st(w)`, `st(bpl)`, `sc`, `sc(w)`, `sc(bpl)`, `pt`, `pt(w)`) VALUES (NULL, '$exam', '$ctbc_ur', '$ctbc_bl', '$ctbc_bl_w', '$ctbc_bl_bpl', '$ctbc_obc_cl', '$ctbc_obc_cl_w', '$ctbc_obc_cl_bpl', '$ctbc_obc_sl', '$ctbc_obc_sl_w', '$ctbc_obc_sl_bpl', '$ctbc_st', '$ctbc_st_w', '$ctbc_st_bpl', '$ctbc_sc', '$ctbc_sc_w', '$ctbc_sc_bpl', '$ctbc_pt', '$ctbc_pt_w')";
	$sql_ctbc=mysqli_query($conn, $qry_ctbc);	


//cutoff data
$qry_co="SELECT * FROM `exam_cutoff_marks` WHERE `exam_name`='$exam'";
$sql_co=mysqli_query($conn, $qry_co);
$num_co=mysqli_num_rows($sql_co);
$res_co=mysqli_fetch_array($sql_co);
	
	$c_ur=$res_co["unreserved"];
	$c_bl=$res_co["bl"];
	$c_bl_w=$res_co["bl(w)"];
	$c_bl_bpl=$res_co["bl(bpl)"];
	$c_obc_cl=$res_co["obc(cl)"];
	$c_obc_cl_w=$res_co["obc(cl)(w)"];
	$c_obc_cl_bpl=$res_co["obc(cl)(bpl)"];
	$c_obc_sl=$res_co["obc(sl)"];
	$c_obc_sl_w=$res_co["obc(sl)(w)"];
	$c_obc_sl_bpl=$res_co["obc(sl)(bpl)"];
	$c_st=$res_co["st"];
	$c_st_w=$res_co["st(w)"];
	$c_st_bpl=$res_co["st(bpl)"];
	$c_sc=$res_co["sc"];
	$c_sc_w=$res_co["sc(w)"];
	$c_sc_bpl=$res_co["sc(bpl)"];
	$c_pt=$res_co["pt"];
	$c_pt_w=$res_co["pt(w)"];

//total qualified
$qry_tq1="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='GEN/UR[unreserved]' AND b.secured_mark>='$c_ur' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq1=mysqli_query($conn, $qry_tq1);
$num_tq1=mysqli_num_rows($sql_tq1);
if($num_tq1!=0)
{	$i = 1;
	while($res_tq1=mysqli_fetch_array($sql_tq1) && $i <= $ctbc_ur)
	{
		$rl_no1=$res_tq1["roll_no"];
		$qry_status1="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no1'";
		$sql_status1=mysqli_query($conn, $qry_status1);
		$i++;
	}
}

$qry_tq2="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL' AND b.secured_mark>='$c_bl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq2=mysqli_query($conn, $qry_tq2);
$num_tq2=mysqli_num_rows($sql_tq2);
if($num_tq2!=0)
{	$i = 1;
	while($res_tq2=mysqli_fetch_array($sql_tq2) && $i <= $ctbc_bl)
	{
		$rl_no2=$res_tq2["roll_no"];
		$qry_status2="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no2'";
		$sql_status2=mysqli_query($conn, $qry_status2);
		$i++;
	}
}

$qry_tq3="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL(W)' AND b.secured_mark>='$c_bl_w' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq3=mysqli_query($conn, $qry_tq3);
$num_tq3=mysqli_num_rows($sql_tq3);
if($num_tq3!=0)
{	$i = 1;
	while($res_tq3=mysqli_fetch_array($sql_tq3) && $i<=$ctbc_bl_w)
	{
		$rl_no3=$res_tq3["roll_no"];
		$qry_status3="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no3'";
		$sql_status3=mysqli_query($conn, $qry_status3);
		$i++;
	}
}

$qry_tq4="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL(BPL)' AND b.secured_mark>='$c_bl_bpl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq4=mysqli_query($conn, $qry_tq4);
$num_tq4=mysqli_num_rows($sql_tq4);
if($num_tq4!=0)
{	$i = 1;
	while($res_tq4=mysqli_fetch_array($sql_tq4) && $i<=$ctbc_bl_bpl)
	{
		$rl_no4=$res_tq4["roll_no"];
		$qry_status4="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no4'";
		$sql_status4=mysqli_query($conn, $qry_status4);
		$i++;
	}
}

$qry_tq5="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)' AND b.secured_mark>='$c_obc_cl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq5=mysqli_query($conn, $qry_tq5);
$num_tq5=mysqli_num_rows($sql_tq5);
if($num_tq5!=0)
{	$i = 1;
	while($res_tq5=mysqli_fetch_array($sql_tq5) && $i<=$ctbc_obc_cl)
	{
		$rl_no5=$res_tq5["roll_no"];
		$qry_status5="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no5'";
		$sql_status5=mysqli_query($conn, $qry_status5);
		$i++;
	}
}

$qry_tq6="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)(W)' AND b.secured_mark>='$c_obc_cl_w' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq6=mysqli_query($conn, $qry_tq6);
$num_tq6=mysqli_num_rows($sql_tq6);
if($num_tq6!=0)
{	$i = 1;
	while($res_tq6=mysqli_fetch_array($sql_tq6) && $i<=$ctbc_obc_cl_w)
	{
		$rl_no6=$res_tq6["roll_no"];
		$qry_status6="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no6'";
		$sql_status6=mysqli_query($conn, $qry_status6);
		$i++;
	}
}

$qry_tq7="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)(BPL)' AND b.secured_mark>='$c_obc_cl_bpl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq7=mysqli_query($conn, $qry_tq7);
$num_tq7=mysqli_num_rows($sql_tq7);
if($num_tq7!=0)
{	$i = 1;
	while($res_tq7=mysqli_fetch_array($sql_tq7) && $i<=$ctbc_obc_cl_bpl)
	{
		$rl_no7=$res_tq7["roll_no"];
		$qry_status7="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no7'";
		$sql_status7=mysqli_query($conn, $qry_status7);
		$i++;
	}
}

$qry_tq8="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)' AND b.secured_mark>='$c_obc_sl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq8=mysqli_query($conn, $qry_tq8);
$num_tq8=mysqli_num_rows($sql_tq8);
if($num_tq8!=0)
{	$i = 1;
	while($res_tq8=mysqli_fetch_array($sql_tq8) && $i<=$ctbc_obc_sl)
	{
		$rl_no8=$res_tq8["roll_no"];
		$qry_status8="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no8'";
		$sql_status8=mysqli_query($conn, $qry_status8);
		$i++;
	}
}

$qry_tq9="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)(W)' AND b.secured_mark>='$c_obc_sl_w' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq9=mysqli_query($conn, $qry_tq9);
$num_tq9=mysqli_num_rows($sql_tq9);
if($num_tq9!=0)
{	$i = 1;
	while($res_tq9=mysqli_fetch_array($sql_tq9) && $i<=$ctbc_obc_sl_w)
	{
		$rl_no9=$res_tq9["roll_no"];
		$qry_status9="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no9'";
		$sql_status9=mysqli_query($conn, $qry_status9);
		$i++;
	}
}

$qry_tq10="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)(BPL)' AND b.secured_mark>='$c_obc_sl_bpl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq10=mysqli_query($conn, $qry_tq10);
$num_tq10=mysqli_num_rows($sql_tq10);
if($num_tq10!=0)
{	$i = 1;
	while($res_tq10=mysqli_fetch_array($sql_tq10) && $i<=$ctbc_obc_sl_bpl)
	{
		$rl_no10=$res_tq10["roll_no"];
		$qry_status10="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no10'";
		$sql_status10=mysqli_query($conn, $qry_status10);
		$i++;
	}
}

$qry_tq11="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST' AND b.secured_mark>='$c_st' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq11=mysqli_query($conn, $qry_tq11);
$num_tq11=mysqli_num_rows($sql_tq11);
if($num_tq11!=0)
{	$i = 1;
	while($res_tq11=mysqli_fetch_array($sql_tq11) && $i<=$ctbc_st)
	{
		$rl_no11=$res_tq11["roll_no"];
		$qry_status11="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no11'";
		$sql_status11=mysqli_query($conn, $qry_status11);
		$i++;
	}
}

$qry_tq12="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST(W)' AND b.secured_mark>='$c_st_w' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq12=mysqli_query($conn, $qry_tq12);
$num_tq12=mysqli_num_rows($sql_tq12);
if($num_tq12!=0)
{	$i = 1;
	while($res_tq12=mysqli_fetch_array($sql_tq12) && $i<=$ctbc_st_w)
	{
		$rl_no12=$res_tq12["roll_no"];
		$qry_status12="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no12'";
		$sql_status12=mysqli_query($conn, $qry_status12);
		$i++;
	}
}

$qry_tq13="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST(BPL)' AND b.secured_mark>='$c_st_bpl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq13=mysqli_query($conn, $qry_tq13);
$num_tq13=mysqli_num_rows($sql_tq13);
if($num_tq13!=0)
{	$i = 1;
	while($res_tq13=mysqli_fetch_array($sql_tq13) && $i<=$ctbc_st_bpl)
	{
		$rl_no13=$res_tq13["roll_no"];
		$qry_status13="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no13'";
		$sql_status13=mysqli_query($conn, $qry_status13);
		$i++;
	}
}

$qry_tq14="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC' AND b.secured_mark>='$c_sc' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq14=mysqli_query($conn, $qry_tq14);
$num_tq14=mysqli_num_rows($sql_tq14);
if($num_tq14!=0)
{	$i = 1;
	while($res_tq14=mysqli_fetch_array($sql_tq14) && $i<=$ctbc_sc)
	{
		$rl_no14=$res_tq14["roll_no"];
		$qry_status14="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no14'";
		$sql_status14=mysqli_query($conn, $qry_status14);
		$i++;
	}
}

$qry_tq15="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC(W)' AND b.secured_mark>='$c_sc_w' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq15=mysqli_query($conn, $qry_tq15);
$num_tq15=mysqli_num_rows($sql_tq15);
if($num_tq15!=0)
{	$i = 1;
	while($res_tq15=mysqli_fetch_array($sql_tq15) && $i<=$ctbc_sc_w)
	{
		$rl_no15=$res_tq15["roll_no"];
		$qry_status15="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no15'";
		$sql_status15=mysqli_query($conn, $qry_status15);
		$i++;
	}
}

$qry_tq16="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC(BPL)' AND b.secured_mark>='$c_sc_bpl' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq16=mysqli_query($conn, $qry_tq16);
$num_tq16=mysqli_num_rows($sql_tq16);
if($num_tq16!=0)
{	$i = 1;
	while($res_tq16=mysqli_fetch_array($sql_tq16) && $i<=$ctbc_sc_bpl)
	{
		$rl_no16=$res_tq16["roll_no"];
		$qry_status16="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no16'";
		$sql_status16=mysqli_query($conn, $qry_status16);
		$i++;
	}
}

$qry_tq17="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='PT' AND b.secured_mark>='$c_pt' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq17=mysqli_query($conn, $qry_tq17);
$num_tq17=mysqli_num_rows($sql_tq17);
if($num_tq17!=0)
{	$i = 1;
	while($res_tq17=mysqli_fetch_array($sql_tq17) && $i<=$ctbc_pt)
	{
		$rl_no17=$res_tq17["roll_no"];
		$qry_status17="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no17'";
		$sql_status17=mysqli_query($conn, $qry_status17);
		$i++;
	}
}

$qry_tq18="SELECT a.roll_no, b.secured_mark FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='PT(W)' AND b.secured_mark>='$c_pt_w' AND a.roll_no=b.roll_no ORDER BY b.secured_mark DESC";
$sql_tq18=mysqli_query($conn, $qry_tq18);
$num_tq18=mysqli_num_rows($sql_tq18);
if($num_tq18!=0)
{	$i = 1;
	while($res_tq18=mysqli_fetch_array($sql_tq18) && $i<=$ctbc_pt_w)
	{
		$rl_no18=$res_tq18["roll_no"];
		$qry_status18="UPDATE `candidate_exam_mark` SET `intimation_status`='selected' WHERE `roll_no`='$rl_no18'";
		$sql_status18=mysqli_query($conn, $qry_status18);
		$i++;
	}
}

$qry_examstatus="UPDATE `postexam_status` SET `intimation_status`='sent' WHERE `exam_name`='$exam'";
$sql_examstatus=mysqli_query($conn, $qry_examstatus);

if($sql_examstatus)
{
header("location:postexm_intimation.php");
}
}
ob_clean();
?>