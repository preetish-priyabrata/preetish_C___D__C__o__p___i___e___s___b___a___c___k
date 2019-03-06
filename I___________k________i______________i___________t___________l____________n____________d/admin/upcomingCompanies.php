<?php

include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg= new Message();
$adm= new Admin();

ob_start();

$title="upcomgingCompanies";

?>
<script src="../js/ajaxCall.js"></script>
<div class="row">
  <div class="col-lg-12">
    <h1>List <small>Upcoming Companies</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="fa fa-edit"></i> Upcoming Company List</li>
    </ol>
  </div>
</div>

<div class="row jumbotron" style="padding-bottom:0px">
<div class="col-lg-12">
<?php

$resComp= $adm->generateUpcomingCompanyList();
$i=0;
$rows= mysqli_num_rows($resComp);
if($rows){
    while ($rowComp = mysqli_fetch_array($resComp)) {

        
        ?>
            
            
        <div class="col-lg-3" style="padding-bottom:45px">
            <a style="display: block" href="#reg" onclick="viewRegStudList(<?php echo $rowComp['visi_id'];?>);">
                <img title="Click me to get detailed list " src="../content/company_logo/<?php echo $rowComp['comp_logo'] ?>" height="160" width="160" class="imgframe"/>
            </a>
        </div>

        <?php
        $i++;
    }
}  else {
    $msg->errorMessage("No Upcoming Company Found");
}
?>
</div>
</div>
<div id="studentList" style="clear: both"></div>

<?php $pageContent= ob_get_contents();
ob_get_clean();
include 'forms_template.php'; ?>