<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['postexam_user'])
{
$examname=$_REQUEST["exam2"];

$co_ur=$_REQUEST["co_ur"];
$co_bl=$_REQUEST["co_bl"];
$co_bl_w=$_REQUEST["co_bl_w"];
$co_bl_bpl=$_REQUEST["co_bl_bpl"];
$co_obc_cl=$_REQUEST["co_obc_cl"];
$co_obc_cl_w=$_REQUEST["co_obc_cl_w"];
$co_obc_cl_bpl=$_REQUEST["co_obc_cl_bpl"];
$co_obc_sl=$_REQUEST["co_obc_sl"];
$co_obc_sl_w=$_REQUEST["co_obc_sl_w"];
$co_obc_sl_bpl=$_REQUEST["co_obc_sl_bpl"];
$co_st=$_REQUEST["co_st"];
$co_st_w=$_REQUEST["co_st_w"];
$co_st_bpl=$_REQUEST["co_st_bpl"];
$co_sc=$_REQUEST["co_sc"];
$co_sc_w=$_REQUEST["co_sc_w"];
$co_sc_bpl=$_REQUEST["co_sc_bpl"];
$co_pt=$_REQUEST["co_pt"];
$co_pt_w=$_REQUEST["co_pt_w"];

$qry_co="INSERT INTO `exam_cutoff_marks`(`slno`, `exam_name`, `unreserved`, `bl`, `bl(w)`, `bl(bpl)`, `obc(cl)`, `obc(cl)(w)`, `obc(cl)(bpl)`, `obc(sl)`, `obc(sl)(w)`, `obc(sl)(bpl)`, `st`, `st(w)`, `st(bpl)`, `sc`, `sc(w)`, `sc(bpl)`, `pt`, `pt(w)`) VALUES (NULL, '$examname', '$co_ur', '$co_bl', '$co_bl_w', '$co_bl_bpl', '$co_obc_cl', '$co_obc_cl_w', '$co_obc_cl_bpl', '$co_obc_sl', '$co_obc_sl_w', '$co_obc_sl_bpl', '$co_st', '$co_st_w', '$co_st_bpl', '$co_sc', '$co_sc_w', '$co_sc_bpl', '$co_pt', '$co_pt_w')";
$sql_co=mysqli_query($conn, $qry_co);

$tq_ur=$_REQUEST["tq_ur"];
$tq_bl=$_REQUEST["tq_bl"];
$tq_bl_w=$_REQUEST["tq_bl_w"];
$tq_bl_bpl=$_REQUEST["tq_bl_bpl"];
$tq_obc_cl=$_REQUEST["tq_obc_cl"];
$tq_obc_cl_w=$_REQUEST["tq_obc_cl_w"];
$tq_obc_cl_bpl=$_REQUEST["tq_obc_cl_bpl"];
$tq_obc_sl=$_REQUEST["tq_obc_sl"];
$tq_obc_sl_w=$_REQUEST["tq_obc_sl_w"];
$tq_obc_sl_bpl=$_REQUEST["tq_obc_sl_bpl"];
$tq_st=$_REQUEST["tq_st"];
$tq_st_w=$_REQUEST["tq_st_w"];
$tq_st_bpl=$_REQUEST["tq_st_bpl"];
$tq_sc=$_REQUEST["tq_sc"];
$tq_sc_w=$_REQUEST["tq_sc_w"];
$tq_sc_bpl=$_REQUEST["tq_sc_bpl"];
$tq_pt=$_REQUEST["tq_pt"];
$tq_pt_w=$_REQUEST["tq_pt_w"];


$qry_tq="INSERT INTO `categorywise_total_qualified_info`(`slno`, `exam_name`, `unreserved`, `bl`, `bl(w)`, `bl(bpl)`, `obc(cl)`, `obc(cl)(w)`, `obc(cl)(bpl)`, `obc(sl)`, `obc(sl)(w)`, `obc(sl)(bpl)`, `st`, `st(w)`, `st(bpl)`, `sc`, `sc(w)`, `sc(bpl)`, `pt`, `pt(w)`) VALUES (NULL, '$examname', '$tq_ur', '$tq_bl', '$tq_bl_w', '$tq_bl_bpl', '$tq_obc_cl', '$tq_obc_cl_w', '$tq_obc_cl_bpl', '$tq_obc_sl', '$tq_obc_sl_w', '$tq_obc_sl_bpl', '$tq_st', '$tq_st_w', '$tq_st_bpl', '$tq_sc', '$tq_sc_w', '$tq_sc_bpl', '$tq_pt', '$tq_pt_w')";
$sql_tq=mysqli_query($conn, $qry_tq);

if($sql_co && $sql_tq)
{
header("location:postexm_result_preparation.php?msg=success");
}
else
{
header("location:postexm_result_preparation.php?msg=error1");
}
}
ob_clean();
?>