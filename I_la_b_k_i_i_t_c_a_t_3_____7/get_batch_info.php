<?php 
ini_set('display_errors', 1);
include './conf.php';
 $stud_courses=$_POST['stud_courses'];
 $batch_query="SELECT * FROM `tbl_batch` WHERE `course_id`='$stud_courses' and `status`='1'";
$batch_sql_exe=mysqli_query($con,$batch_query);
 $num=mysqli_num_rows($batch_sql_exe);
	if($num=="0"){
		?>
			<div class="form-group col-lg-12">
				<table class="table table-striped" >
					<thead>
						<tr>
							<th>Batch Name</th>
							<th>Information</th>
							<th>Seat Remain</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($res=mysqli_fetch_assoc($batch_sql_exe)) {?>					
						<tr>
							<td><?php echo $res['sl_no']?><input type="hidden" name="radios" required=""></td>
							<td><?php echo $res['sl_no']?></td>
							<td><?php echo $res['sl_no']?></td>
							<td><?php echo $res['sl_no']?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		<?php 
		exit;
	}else{
		$course_info_detail="SELECT * FROM `tbl_course` WHERE `sl_no`='$stud_courses'";
			$course_info_detail_exe=mysqli_query($con,$course_info_detail);
			$course_details_info=mysqli_fetch_assoc($course_info_detail_exe);
		?>
		<div class="row"><!-- starts row -->
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="stud_phone"><span class="required">*</span>Course Fee</label>
                <input type="text" aria-required="true"  value="<?php echo $course_details_info['price']?>" name="fee" id="fee" class="form-control requiredField" readonly />
            </div>                                            
        </div>
        <div class="row">
			<div class="form-group col-lg-12">
				<table class="table table-striped" >
					<thead>
						<tr>
							<th>Batch Name</th>
							<th>Information</th>
							<th>Seat Remain</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($res_list=mysqli_fetch_assoc($batch_sql_exe)) {
							if($res_list['seat_status']==0){

							?>					
						<tr>
							<td><?php echo $res_list['batch_name']?></td>
							<td>
								<label ><strong>Timing </strong></label> : <b><?php echo $res_list['start_time']?> - <?php echo $res_list['end_time']?></b><br>
								<label ><strong>Days</strong> </label> : <?php 
															$days=unserialize($res_list['days']); 
						  									for ($i=0; $i < count($days); $i++) { ?>
						  										<b ><?php echo $days[$i]?></b>
						  								<?php	
						  									}
						  								?>
						  								<br>
						  		<label ><strong>Venue</strong> </label> : <b><?php echo $res_list['venue']?></b><br>
							</td>
							<td><?php echo $res_list['remain_seat']?></td>
							<td>
								<label class="checkbox-inline checkbox-right">
											<input  class="roomselect" name="batch_id" value="<?php echo $res_list['sl_no']?>" type="checkbox">
												<?php echo $res_list['batch_name']?>
								</label>
							</td>
						</tr>
						<?php
						} 
					}?>
					</tbody>
				</table>
			</div>
		</div>
		<script type="text/javascript">
		$( document ).ready(function() {
                $(".roomselect").change(function(){
                                      $(".roomselect").prop('checked',false);
                                      $(this).prop('checked',true);
                  });
             });
	</script>
		<?php
		exit();

	}
		?>
	<!-- <script type="text/javascript">
		$( document ).ready(function() {
                $(".roomselect").change(function(){
                                      $(".roomselect").prop('checked',false);
                                      $(this).prop('checked',true);
             });
	</script> -->