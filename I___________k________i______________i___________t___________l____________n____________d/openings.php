<?php
ob_start();
include './class/DbConnection.php';
include './class/Message.php';
$msg = new Message();
?>
<a href="candidateregistration.php">Register yourself for future opening</a>
<br/>
<a href="career.php">Apply to work with us and be a part of our esteemed organization</a>
<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "";
$menuClass3 = "";
$menuClass4 = "active";
$menuClass5 = "";
$menuClass6 = "";
$header = "Career";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>