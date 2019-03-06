<?php
require 'config.php';
$total=0;
 $year_one='2017';
 $year_two='2018';
 if($_POST['Status']==1){
$query_list_level1="SELECT * FROM `rhc_master_district_indent` where `status`!='0' and  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level1=mysqli_query($conn,$query_list_level1);
$num_rows_level1=mysqli_num_rows($sql_exe_list_level1);

$query_list_level2="SELECT * FROM `rhc_master_dh_block_indent` where `status`!='0' and  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two'  ORDER BY `slno` DESC";
$sql_exe_list_level2=mysqli_query($conn,$query_list_level2);
$num_rows_level2=mysqli_num_rows($sql_exe_list_level2);

$query_list_level3="SELECT * FROM `rhc_master_phc_aphc_indent` where `status`!='0' and  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level3=mysqli_query($conn,$query_list_level3);
$num_rows_level3=mysqli_num_rows($sql_exe_list_level3);

$query_list_level4="SELECT * FROM `rhc_master_phc_asha_indent` where `status`!='0' and  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level4=mysqli_query($conn,$query_list_level4);
$num_rows_level4=mysqli_num_rows($sql_exe_list_level4);

$query_list_level5="SELECT * FROM `rhc_master_aphc_asha_indent` where `status`!='0' and  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level5=mysqli_query($conn,$query_list_level5);
$num_rows_level5=mysqli_num_rows($sql_exe_list_level5);

echo $total=$num_rows_level5+$num_rows_level4+$num_rows_level3+$num_rows_level2+$num_rows_level1;
exit;
}else if($_POST['Status']==2){

$query_list_level1="SELECT * FROM `rhc_master_district_item_details_challan_no` where  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level1=mysqli_query($conn,$query_list_level1);
$num_rows_level1=mysqli_num_rows($sql_exe_list_level1);

$query_list_level2="SELECT * FROM `rhc_master_dh_block_item_details_challan_no` where  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two'  ORDER BY `slno` DESC";
$sql_exe_list_level2=mysqli_query($conn,$query_list_level2);
$num_rows_level2=mysqli_num_rows($sql_exe_list_level2);

$query_list_level3="SELECT * FROM `rhc_master_phc_aphc_item_details_challan_no` where  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level3=mysqli_query($conn,$query_list_level3);
$num_rows_level3=mysqli_num_rows($sql_exe_list_level3);

$query_list_level4="SELECT * FROM `rhc_master_phc_asha_item_details_challan_no` where  YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level4=mysqli_query($conn,$query_list_level4);
$num_rows_level4=mysqli_num_rows($sql_exe_list_level4);

$query_list_level5="SELECT * FROM `rhc_master_aphc_asha_item_details_challan_no` where YEAR(`date_creation`) BETWEEN '$year_one' AND '$year_two' ORDER BY `slno` DESC ";
$sql_exe_list_level5=mysqli_query($conn,$query_list_level5);
$num_rows_level5=mysqli_num_rows($sql_exe_list_level5);

echo $total=$num_rows_level5+$num_rows_level4+$num_rows_level3+$num_rows_level2+$num_rows_level1;
exit;
}else{

$query_list_level1="SELECT * FROM `rhc_master_stock_block_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level1=mysqli_query($conn,$query_list_level1);
$num_rows_level1=mysqli_num_rows($sql_exe_list_level1);

$query_list_level2="SELECT * FROM `rhc_master_stock_aphc_items` where `item_quantity`='0'   ORDER BY `slno` DESC";
$sql_exe_list_level2=mysqli_query($conn,$query_list_level2);
$num_rows_level2=mysqli_num_rows($sql_exe_list_level2);

$query_list_level3="SELECT * FROM `rhc_master_stock_aphc_subcenter_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level3=mysqli_query($conn,$query_list_level3);
$num_rows_level3=mysqli_num_rows($sql_exe_list_level3);

$query_list_level4="SELECT * FROM `rhc_master_stock_phc_subcenter_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level4=mysqli_query($conn,$query_list_level4);
$num_rows_level4=mysqli_num_rows($sql_exe_list_level4);

$query_list_level5="SELECT * FROM `rhc_master_stock_phc_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level5=mysqli_query($conn,$query_list_level5);
$num_rows_level5=mysqli_num_rows($sql_exe_list_level5);

$query_list_level11="SELECT * FROM `rhc_master_stock_asha_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level11=mysqli_query($conn,$query_list_level11);
$num_rows_level11=mysqli_num_rows($sql_exe_list_level11);

$query_list_level21="SELECT * FROM `rhc_master_stock_district_items` where `item_quantity`='0'   ORDER BY `slno` DESC";
$sql_exe_list_level21=mysqli_query($conn,$query_list_level21);
$num_rows_level21=mysqli_num_rows($sql_exe_list_level21);

$query_list_level31="SELECT * FROM `rhc_master_stock_district_hospital_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level31=mysqli_query($conn,$query_list_level31);
$num_rows_level31=mysqli_num_rows($sql_exe_list_level31);

$query_list_level41="SELECT * FROM `rhc_master_stock_uphc_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level41=mysqli_query($conn,$query_list_level41);
$num_rows_level41=mysqli_num_rows($sql_exe_list_level41);

$query_list_level51="SELECT * FROM `rhc_master_stock_state_items` where `item_quantity`='0'  ORDER BY `slno` DESC ";
$sql_exe_list_level51=mysqli_query($conn,$query_list_level51);
$num_rows_level51=mysqli_num_rows($sql_exe_list_level51);

echo $total=$num_rows_level5+$num_rows_level4+$num_rows_level3+$num_rows_level2+$num_rows_level1+$num_rows_level51+$num_rows_level41+$num_rows_level31+$num_rows_level21+$num_rows_level11;
exit;
}