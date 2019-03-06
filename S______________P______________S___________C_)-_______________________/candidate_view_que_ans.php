<?php
error_reporting(0);
ob_start();
session_start();
include "config.php";
if($_SESSION['cand_user'])
{
?>
<script>
function show_download()
{
	document.getElementById("download").style.display="block";
	
}
</script>
<div class="container">
  <h2>Upload Answer Key </h2>
  
</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Exam Name</th>
        <th>View</th>
       
      </tr>
    </thead>
    <tbody>
    <?php 
      $qry_answer="SELECT * FROM `post_exam_upload_answer_key` where `status`='1'";
      $sql_answer=mysqli_query($conn,$qry_answer);
      $x=0;
      while ($res_answer=mysqli_fetch_array($sql_answer)) {
        $x++;
        ?>
        <td><?=$res_answer['exam_name']?></td>
        <td><a  href="uploads/answerkey/<?php  echo $res_answer["file_name"]; ?>">Click View</a>
       </td>
        
        
   <?php   

   } ?>

    </tbody>
  </table>
</div>
<?php
}
$contents = ob_get_contents();
ob_clean();

include_once 'template.php';
?>