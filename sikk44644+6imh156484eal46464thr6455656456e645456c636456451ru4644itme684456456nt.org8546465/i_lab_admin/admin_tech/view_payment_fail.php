<?php

session_start();
ob_start();
if($_SESSION['admin_tech']){
    include  '../config.php';
    require 'FlashMessages.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 $title="Welcome To Dashboard Of Admin Officer";
?>
    <!--Page Header-->
    <div class="header">
        <div class="header-content">
            <div class="page-title"><i class="icon-display4"></i>view Fail List </div>
            <ul class="breadcrumb">
                <li><a href="#">Manage Payment</a></li>
                <li class="active">View Fail List</li>
            </ul>
        </div>
    </div>
    <!-- /Page Header-->
    <div class="container-fluid page-content">
        <div class="row">
        <?php $msg->display(); ?>
            
        </div>
             <table id="example21" class="display nowrap" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>Slno</th>
                                        <th>Candidate Mobile</th>
                                        <th>Candidate Name</th>                                       
                                        <th>Candidate Application</th>
                                        <th>Reference No</th>
                                        <th>Group</th>
                                        <!-- <th>Job Applied</th> -->
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $x=0;
                                        $query_sql="SELECT * FROM `ilab_payment_info` WHERE `payment_status`='2'";
                                        $sql_exe=mysqli_query($conn,$query_sql);
                                        while ($result=mysqli_fetch_assoc($sql_exe)) {
                                            $x++;
                                            // `payment_reference_no`, `mobile_no`, `application_no`, `candidate_name`, `amount_to`, `group_id_slno`, `post_name`, `payment_date`, `payment_time`, `ErrorDescription`
                                            // `application_no`, `candidate_mobile`
                                            ?>
                                      <tr style="text-align: center;">
                                        <td><?=$x?></td>
                                         <td><?=$mobile_no=$result['mobile_no']?></td>
                                        <td><?php
                                            $get_name="SELECT * FROM `application_form` WHERE `candidate_mobile`='$mobile_no'";
                                             $get_name_sql_exe=mysqli_query($conn,$get_name);
                                             $get_name_fetch=mysqli_fetch_assoc($get_name_sql_exe);
                                        echo $get_name_fetch['candidate_name']?></td>
                                        <td><?=$result['application_no']?></td>
                                        <td><?=$result['payment_reference_no']?></td>
                                        <td>
                                            <?php 
                                                if($result['group_id_slno']==1){
                                                    echo "Driver";
                                                }else{
                                                    echo "Group D";
                                                }
                                            ?>
                                                
                                        </td>
                                        <!-- <td>
                                            <?php 
                                                $post_name=json_decode($result['post_name']);
                                                $price_list=json_decode($result['price_list']);
                                                for ($i=0; $i <count($post_name) ; $i++) { 
                                                    echo $post_name[$i]."=".$price_list[$i]."<br>";
                                                }
                                            ?>
                                                
                                        </td> -->
                                        <td><?=$result['amount_to']?></td>
                                         <td><?=$result['ErrorDescription']?></td>
                                        <td><?=$result['payment_date']?></td>
                                        <td><?=$result['payment_time']?></td>
                                       
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
            
        </div>
    </div>


<?php
}else{
    header('Location:logout');
    exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';

?>

