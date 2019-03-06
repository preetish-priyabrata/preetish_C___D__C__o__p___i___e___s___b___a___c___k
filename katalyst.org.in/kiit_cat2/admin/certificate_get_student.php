<?php 
session_start();
// ob_start();
if (($_SESSION['userId']!="")) {
	
	include 'config.php';
	$course_names=$_POST['course_names'];
	$batch_names=$_POST['batch_names'];
	  $student_query="SELECT * FROM `tbl_enrollment` WHERE `course_batch_id`='$batch_names' and `student_course`='$course_names' and `certificate_status`='0' and `payment_status`='1'";
	$student_sql=mysqli_query($conn,$student_query);
	 $num=mysqli_num_rows($student_sql);
	if($num=='0'){
		?>
		<div class="row">
			<div class="form-group col-lg-12">
		<input type="hidden" name="student" required="">
		<table id="example1" class="display nowrap table-striped" cellspacing="0">
			<thead>
				<tr>
					<th>Roll No</th>
					<th>Merit Certificate </th>
					<th>Program Completation Certificate </th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Roll No</th>
					<th>Merit Certificate </th>
					<th>Program Completation Certificate </th>
				</tr>
			</tfoot>
			<tbody>
				<?php while ($res=mysqli_fetch_assoc($student_sql)) {
			?>
				<tr>
					<td><?=$res['student_roll']?></td>
					<td><?=$res['student_roll']?></td>
					<td><?=$res['student_roll']?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
		<?php
		exit;
	}else{
		?>
		<div class="form-group">
			<label class="control-label col-lg-4 text-right">Merit Certificate Reference </label>
		  	<div class="col-lg-8">
				<input class="form-control" name="mert_Complete_ref" id="demo" placeholder="Enter Merit Certificate Reference" type="text" required="">
		   	</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4 text-right">Program Completion Certificate Reference </label>
		  	<div class="col-lg-8">
				<input class="form-control" name="Complete_ref" id="demo" placeholder="Enter Program Completation Certificate Reference" type="text" required="">
		   	</div>
		</div>
		<div class="row">
			<hr>
			<h3 class="text-center">List Of Student</h3>
			<div class="form-group col-lg-12">
		<table id="example1" class="display nowrap table-striped" cellspacing="0">
			<thead>
				<tr>
					<th>Roll No</th>
					<th>Program Completion Certificate </th>
					<th>Merit Certificate </th>
					
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Roll No</th>
					<th>Program Completion Certificate </th>
					<th>Merit Certificate </th>
					
				</tr>
			</tfoot>
			<tbody>
				<?php while ($res=mysqli_fetch_assoc($student_sql)) {
			?>
				<tr>
					<td><input type="hidden" name="student_roll[]" value="<?=$res['enrollment_id']?>"><?=$res['student_roll']?></td>			
					<td><input checked="checked" class="roomselect" name="complete_cert[]" value="<?=$res['enrollment_id']?>" type="checkbox"><input type="hidden" name="comp[]" value="c"></td>
					<td><input checked="checked" class="roomselect" name="merit_cert[]" value="<?=$res['enrollment_id']?>" type="checkbox"><input type="hidden" name="met[]" value="m"></td>
				</tr>
				<?php }?>
			</tbody>
		</table>

</div>
<hr>
</div>
 <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <!-- <script src="../asserts/myjs/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
   <script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
     <!-- <script src="../asserts/plugins/jquery/jquery.min.js"></script> -->
     <!-- 'copy', 'csv', 'excel', 'pdf', 'print' -->
     <!-- buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ], -->
        <!-- buttons: [
            		'copy', 'csv', 'excel', 'pdf', 'print'    
				] -->
     <script type="text/javascript">
     	$(document).ready(function() {
    		$('#example').DataTable( {
       			dom: 'Bfrtip',
       			buttons: [
            		'copy', 'csv', 'excel', 'pdf', 'print'    
				]
        			           	
    		} );
		} );
		$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#example1 tfoot th').each( function () {
	        var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	 
	    // DataTable
	    var table = $('#example1').DataTable();
	 
	    // Apply the search
	    table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                	// .columns( 0 )
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	    $("#example21").DataTable();
	} );
		
     </script>
		<?php 
		exit;
	}

}else{
	header('Location:logout.php');
    exit;
}
// $contents = ob_get_contents();
// ob_clean();
// include '../template/header.php';