<?php
// session_start();
ob_start();
if(1){
?>
<!-- BEGIN RIGHTSIDE -->
        <div class="rightside bg-grey-50">
			<!-- BEGIN PAGE HEADING -->
            <div class="page-head">
				<h1 class="page-title">Blank page1<small>your small text goes here</small></h1>
			</div>
			<!-- END PAGE HEADING -->
			<div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div><!-- /.rightside -->
<?php
}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include '../template/header.php';