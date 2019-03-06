<?php 
 include  '../config.php';
// print_r($_POST);
// [pay_id] => 1
$pay_id=$_POST['pay_id'];
switch ($pay_id) {
    case '1':
        $query_sql="SELECT sum(`amount_to`) FROM `ilab_payment_info` WHERE `payment_status`='1'";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_fetch_row($sql_exe);
        // print_r($fetch);
        echo $fetch[0];
        break;
    case '2':
        $query_sql="SELECT * FROM `ilab_payment_info` WHERE `payment_status`='1'";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_num_rows($sql_exe);
        // print_r($fetch);
        echo $fetch;
        break;
    case '3':
        $query_sql="SELECT * FROM `ilab_login` WHERE `status`='1' and `complete_status`='1'";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_num_rows($sql_exe);
        // print_r($fetch);
        echo $fetch;
        break;
    case '4':
        $query_sql="SELECT * FROM `ilab_login` WHERE `status`='1' and `complete_status`='0' and `basic_status`='1'";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_num_rows($sql_exe);
        // print_r($fetch);
        echo $fetch;
        break;
    case '5':
        $query_sql="SELECT * FROM `ilab_login` WHERE `status`='1' and `complete_status`='0' and `basic_status`='1'";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_num_rows($sql_exe);
        // print_r($fetch);
        echo $fetch;
        break;
    case '6':
        $query_sql="SELECT * FROM `ilab_login` WHERE `status`='1' and `complete_status`='0' and `basic_status`='0'";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_num_rows($sql_exe);
        // print_r($fetch);
        echo $fetch;
        break;
    case '7':
        $query_sql="SELECT * FROM `ilab_login` where `status`='1' ";
        $sql_exe=mysqli_query($conn,$query_sql);
        $fetch=mysqli_num_rows($sql_exe);
        // print_r($fetch);
        echo $fetch;
        break;
        case '8':
                $query_sql="SELECT * FROM `ilab_payment_info` WHERE `payment_status`='1' and `group_id_slno`='1'";
                $sql_exe=mysqli_query($conn,$query_sql);
                $fetch=mysqli_num_rows($sql_exe);
                // print_r($fetch);
                echo $fetch;
                break;
        case '9':
                $query_sql="SELECT * FROM `ilab_payment_info` WHERE `payment_status`='1' and `group_id_slno`='2'";
                $sql_exe=mysqli_query($conn,$query_sql);
                $fetch=mysqli_num_rows($sql_exe);
                // print_r($fetch);
                echo $fetch;
                break;
         case '10':
                $query_sql="SELECT sum(`amount_to`) FROM `ilab_payment_info` WHERE `group_id_slno`='1' and `payment_status`='1'";
                $sql_exe=mysqli_query($conn,$query_sql);
                $fetch=mysqli_fetch_row($sql_exe);
                // print_r($fetch);
                echo $fetch[0];
                break;
         case '11':
               $query_sql="SELECT sum(`amount_to`) FROM `ilab_payment_info` WHERE `group_id_slno`='2' and `payment_status`='1'";
                $sql_exe=mysqli_query($conn,$query_sql);
                $fetch=mysqli_fetch_row($sql_exe);
                // print_r($fetch);
                echo $fetch[0];
                break;

        
        default:
                # code...
                break;
}