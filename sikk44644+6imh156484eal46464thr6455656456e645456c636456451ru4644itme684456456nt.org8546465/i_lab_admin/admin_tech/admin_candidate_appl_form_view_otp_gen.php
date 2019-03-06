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
            <div class="page-title"><i class="icon-display4"></i>List Of Generated OTP Not Submit</div>
            <ul class="breadcrumb">
                <li><a href="#">Manage Candidate</a></li>
                <li class="active">View Generated OTP Not Submit</li>
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
                                        <th>Date</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $date=date('Y-m-d');
                                        $x=0;
                                        $query_sql="SELECT c.mobile_no,c.slno_R,c.status,c.date FROM ilab_registration c left JOIN ilab_login a on a.mobile_no_L=c.mobile_no and a.status='1' WHERE  c.date BETWEEN '2018-02-16' AND '$date' and  a.mobile_no_L is NULL";
                                        $sql_exe=mysqli_query($conn,$query_sql);
                                        while ($result=mysqli_fetch_assoc($sql_exe)) {
                                            
                                            $x++;
                                            
                                            ?>
                                      <tr style="text-align: center;">
                                        <td><?=$x?></td>
                                        <td><?=$mobile_no=$result['mobile_no']?></td>                                       
                                        <td><?=$result['date']?></td>
                                        
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

