<?php if($_SESSION['exam_selected']!=""){?>

<table class="table">
<tr>
<th>Select Exam</th>
<td><select id="exam" onchange="show_application();" name="exam" class="form-control">
                  <option value="">--Select Exam--</option>
                  <?php
				  $qry_exam="SELECT * FROM `exam_master_data` where `status`='1'";
				 $sql_exam=mysqli_query($conn, $qry_exam);
				 while($res_exam=mysqli_fetch_array($sql_exam))
                  {
				  ?>
                  <option value="<?php echo $res_exam["examname"]; ?>" <?php if($_SESSION['exam_selected']==$res_exam['examname']){echo "selected";}?>><?php echo $res_exam["examname"]; ?></option>
                  <?php
				  }
				  ?></select></td>
</tr>
</table>
<?php }else{?>
	<?php	echo $_SESSION['exam_selected'];?>
	<table class="table">
<tr>
<th>Select Exam</th>
<td><select id="exam" onchange="show_application();" name="exam" class="form-control">
                  <option value="">--Select Exam--</option>
                  <?php
				  $qry_exam="SELECT * FROM `exam_master_data` where `status`='1'";
				 $sql_exam=mysqli_query($conn, $qry_exam);
				 while($res_exam=mysqli_fetch_array($sql_exam))
                  {
				  ?>
                  <option value="<?php echo $res_exam["examname"]; ?>"><?php echo $res_exam["examname"]; ?></option>
                  <?php
				  }
				  ?></select></td>
</tr>
</table>

<?php }?>