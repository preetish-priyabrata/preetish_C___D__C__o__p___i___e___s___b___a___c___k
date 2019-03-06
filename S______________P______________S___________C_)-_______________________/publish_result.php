<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
$exam=$_REQUEST["exam"];

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
$qry_tq1="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='GEN/UR[unreserved]' AND b.secured_mark>='$c_ur' AND a.roll_no=b.roll_no";
$sql_tq1=mysqli_query($conn, $qry_tq1);
$num_tq1=mysqli_num_rows($sql_tq1);
if($num_tq1!=0)
{
	while($res_tq1=mysqli_fetch_array($sql_tq1))
	{
		$rl_no1=$res_tq1["roll_no"];
		$qry_status1="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no1'";
		$sql_status1=mysqli_query($conn, $qry_status1);
	}
}

$qry_tq2="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL' AND b.secured_mark>='$c_bl' AND a.roll_no=b.roll_no";
$sql_tq2=mysqli_query($conn, $qry_tq2);
$num_tq2=mysqli_num_rows($sql_tq2);
if($num_tq2!=0)
{
	while($res_tq2=mysqli_fetch_array($sql_tq2))
	{
		$rl_no2=$res_tq2["roll_no"];
		$qry_status2="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no2'";
		$sql_status2=mysqli_query($conn, $qry_status2);
	}
}

$qry_tq3="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL(W)' AND b.secured_mark>='$c_bl_w' AND a.roll_no=b.roll_no";
$sql_tq3=mysqli_query($conn, $qry_tq3);
$num_tq3=mysqli_num_rows($sql_tq3);
if($num_tq3!=0)
{
	while($res_tq3=mysqli_fetch_array($sql_tq3))
	{
		$rl_no3=$res_tq3["roll_no"];
		$qry_status3="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no3'";
		$sql_status3=mysqli_query($conn, $qry_status3);
	}
}

$qry_tq4="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='BL(BPL)' AND b.secured_mark>='$c_bl_bpl' AND a.roll_no=b.roll_no";
$sql_tq4=mysqli_query($conn, $qry_tq4);
$num_tq4=mysqli_num_rows($sql_tq4);
if($num_tq4!=0)
{
	while($res_tq4=mysqli_fetch_array($sql_tq4))
	{
		$rl_no4=$res_tq4["roll_no"];
		$qry_status4="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no4'";
		$sql_status4=mysqli_query($conn, $qry_status4);
	}
}

$qry_tq5="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)' AND b.secured_mark>='$c_obc_cl' AND a.roll_no=b.roll_no";
$sql_tq5=mysqli_query($conn, $qry_tq5);
$num_tq5=mysqli_num_rows($sql_tq5);
if($num_tq5!=0)
{
	while($res_tq5=mysqli_fetch_array($sql_tq5))
	{
		$rl_no5=$res_tq5["roll_no"];
		$qry_status5="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no5'";
		$sql_status5=mysqli_query($conn, $qry_status5);
	}
}

$qry_tq6="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)(W)' AND b.secured_mark>='$c_obc_cl_w' AND a.roll_no=b.roll_no";
$sql_tq6=mysqli_query($conn, $qry_tq6);
$num_tq6=mysqli_num_rows($sql_tq6);
if($num_tq6!=0)
{
	while($res_tq6=mysqli_fetch_array($sql_tq6))
	{
		$rl_no6=$res_tq6["roll_no"];
		$qry_status6="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no6'";
		$sql_status6=mysqli_query($conn, $qry_status6);
	}
}

$qry_tq7="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(CL)(BPL)' AND b.secured_mark>='$c_obc_cl_bpl' AND a.roll_no=b.roll_no";
$sql_tq7=mysqli_query($conn, $qry_tq7);
$num_tq7=mysqli_num_rows($sql_tq7);
if($num_tq7!=0)
{
	while($res_tq7=mysqli_fetch_array($sql_tq7))
	{
		$rl_no7=$res_tq7["roll_no"];
		$qry_status7="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no7'";
		$sql_status7=mysqli_query($conn, $qry_status7);
	}
}

$qry_tq8="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)' AND b.secured_mark>='$c_obc_sl' AND a.roll_no=b.roll_no";
$sql_tq8=mysqli_query($conn, $qry_tq8);
$num_tq8=mysqli_num_rows($sql_tq8);
if($num_tq8!=0)
{
	while($res_tq8=mysqli_fetch_array($sql_tq8))
	{
		$rl_no8=$res_tq8["roll_no"];
		$qry_status8="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no8'";
		$sql_status8=mysqli_query($conn, $qry_status8);
	}
}

$qry_tq9="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)(W)' AND b.secured_mark>='$c_obc_sl_w' AND a.roll_no=b.roll_no";
$sql_tq9=mysqli_query($conn, $qry_tq9);
$num_tq9=mysqli_num_rows($sql_tq9);
if($num_tq9!=0)
{
	while($res_tq9=mysqli_fetch_array($sql_tq9))
	{
		$rl_no9=$res_tq9["roll_no"];
		$qry_status9="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no9'";
		$sql_status9=mysqli_query($conn, $qry_status9);
	}
}

$qry_tq10="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='OBC(SL)(BPL)' AND b.secured_mark>='$c_obc_sl_bpl' AND a.roll_no=b.roll_no";
$sql_tq10=mysqli_query($conn, $qry_tq10);
$num_tq10=mysqli_num_rows($sql_tq10);
if($num_tq10!=0)
{
	while($res_tq10=mysqli_fetch_array($sql_tq10))
	{
		$rl_no10=$res_tq10["roll_no"];
		$qry_status10="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no10'";
		$sql_status10=mysqli_query($conn, $qry_status10);
	}
}

$qry_tq11="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST' AND b.secured_mark>='$c_st' AND a.roll_no=b.roll_no";
$sql_tq11=mysqli_query($conn, $qry_tq11);
$num_tq11=mysqli_num_rows($sql_tq11);
if($num_tq11!=0)
{
	while($res_tq11=mysqli_fetch_array($sql_tq11))
	{
		$rl_no11=$res_tq11["roll_no"];
		$qry_status11="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no11'";
		$sql_status11=mysqli_query($conn, $qry_status11);
	}
}

$qry_tq12="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST(W)' AND b.secured_mark>='$c_st_w' AND a.roll_no=b.roll_no";
$sql_tq12=mysqli_query($conn, $qry_tq12);
$num_tq12=mysqli_num_rows($sql_tq12);
if($num_tq12!=0)
{
	while($res_tq12=mysqli_fetch_array($sql_tq12))
	{
		$rl_no12=$res_tq12["roll_no"];
		$qry_status12="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no12'";
		$sql_status12=mysqli_query($conn, $qry_status12);
	}
}

$qry_tq13="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='ST(BPL)' AND b.secured_mark>='$c_st_bpl' AND a.roll_no=b.roll_no";
$sql_tq13=mysqli_query($conn, $qry_tq13);
$num_tq13=mysqli_num_rows($sql_tq13);
if($num_tq13!=0)
{
	while($res_tq13=mysqli_fetch_array($sql_tq13))
	{
		$rl_no13=$res_tq13["roll_no"];
		$qry_status13="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no13'";
		$sql_status13=mysqli_query($conn, $qry_status13);
	}
}

$qry_tq14="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC' AND b.secured_mark>='$c_sc' AND a.roll_no=b.roll_no";
$sql_tq14=mysqli_query($conn, $qry_tq14);
$num_tq14=mysqli_num_rows($sql_tq14);
if($num_tq14!=0)
{
	while($res_tq14=mysqli_fetch_array($sql_tq14))
	{
		$rl_no14=$res_tq14["roll_no"];
		$qry_status14="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no14'";
		$sql_status14=mysqli_query($conn, $qry_status14);
	}
}

$qry_tq15="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC(W)' AND b.secured_mark>='$c_sc_w' AND a.roll_no=b.roll_no";
$sql_tq15=mysqli_query($conn, $qry_tq15);
$num_tq15=mysqli_num_rows($sql_tq15);
if($num_tq15!=0)
{
	while($res_tq15=mysqli_fetch_array($sql_tq15))
	{
		$rl_no15=$res_tq15["roll_no"];
		$qry_status15="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no15'";
		$sql_status15=mysqli_query($conn, $qry_status15);
	}
}

$qry_tq16="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='SC(BPL)' AND b.secured_mark>='$c_sc_bpl' AND a.roll_no=b.roll_no";
$sql_tq16=mysqli_query($conn, $qry_tq16);
$num_tq16=mysqli_num_rows($sql_tq16);
if($num_tq16!=0)
{
	while($res_tq16=mysqli_fetch_array($sql_tq16))
	{
		$rl_no16=$res_tq16["roll_no"];
		$qry_status16="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no16'";
		$sql_status16=mysqli_query($conn, $qry_status16);
	}
}

$qry_tq17="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='PT' AND b.secured_mark>='$c_pt' AND a.roll_no=b.roll_no";
$sql_tq17=mysqli_query($conn, $qry_tq17);
$num_tq17=mysqli_num_rows($sql_tq17);
if($num_tq17!=0)
{
	while($res_tq17=mysqli_fetch_array($sql_tq17))
	{
		$rl_no17=$res_tq17["roll_no"];
		$qry_status17="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no17'";
		$sql_status17=mysqli_query($conn, $qry_status17);
	}
}

$qry_tq18="SELECT a.roll_no FROM `candidate_application_info` a, `candidate_exam_mark` b WHERE a.exam_name='$exam' AND a.attendance_status='P' AND a.category='PT(W)' AND b.secured_mark>='$c_pt_w' AND a.roll_no=b.roll_no";
$sql_tq18=mysqli_query($conn, $qry_tq18);
$num_tq18=mysqli_num_rows($sql_tq18);
if($num_tq18!=0)
{
	while($res_tq18=mysqli_fetch_array($sql_tq18))
	{
		$rl_no18=$res_tq18["roll_no"];
		$qry_status18="UPDATE `candidate_exam_mark` SET `status`='qualified' WHERE `roll_no`='$rl_no18'";
		$sql_status18=mysqli_query($conn, $qry_status18);
	}
}

$qry_examstatus="INSERT INTO `postexam_status`(`slno`, `exam_name`, `result_status`) VALUES (NULL, '$exam', 'published')";
$sql_examstatus=mysqli_query($conn, $qry_examstatus);

if($sql_examstatus)
{
header("location:postexm_publication.php");
}
}
ob_clean();
?>