<?php
      error_reporting(0);
      ob_start();
      session_start();
      include "config.php";
      if($_SESSION['verification_exam']){
?>
        <div class="col-lg-12">
          <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <?php include'application_form_exam.php';?>
            </div>
          <div class="col-lg-4"></div>
        </div>
<?php
      }
      $contents = ob_get_contents();
      ob_clean();

      include_once 'template_data_table.php';
?>

<?php   
      if(!empty($_SESSION['exam_selected'])){
        $exam=$_SESSION['exam_selected'];
        // no of applied application
        $qry_new="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes'";
        $sql_new=mysqli_query($conn, $qry_new);
        $num_row_new=mysqli_num_rows($sql_new);
        //no of approved appliction
        $qry_verified="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='4' ";
        $sql_verified=mysqli_query($conn, $qry_verified);
        $num_row_verified=mysqli_num_rows($sql_verified);
        //no of appliction inadepquate
        $qry_inadequad="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='2' ";
        $sql_inadequad=mysqli_query($conn, $qry_inadequad);
        $num_row_inadequad=mysqli_num_rows($sql_inadequad);
        //no of rejected application
        $qry_rejected="SELECT * FROM `candidate_application_info` INNER JOIN `candidate_personal_details` on candidate_personal_details.application_no = candidate_application_info.application_no WHERE candidate_application_info.exam_name='$exam' AND candidate_application_info.application_submitted='yes' AND candidate_application_info.application_verification_officer='3' ";
        $sql_rejected=mysqli_query($conn, $qry_rejected);
        $num_row_rejected=mysqli_num_rows($sql_rejected);


?>
        <div class="container">
          <div class="panel panel-default ">
            <div class = "panel-body">
              <div class="row">
              <div class="bs-example">              
                <ul class="nav nav-pills nav-justified" id="myTab">
                  <li class="active"><a data-toggle="pill" href="#Applied">Applied Application<span class="badge badge-primary"><?=$num_row_new?></span></a></li>
                  <li><a data-toggle="pill" href="#Verified">Verified Application<span class="badge badge-success"><?=$num_row_verified?></span></a></li>
                  <li><a data-toggle="pill" href="#Adequate">In-Adequate Application<span class="badge badge-warning"><?=$num_row_inadequad?></span></a></li>
                  <li><a data-toggle="pill" href="#Rejected">Rejected Application<span class="badge badge-danger"><?=$num_row_rejected?></span></a></li>
                </ul>
    
                <div class="tab-content">
                  <div id="Applied" class="tab-pane fade in active">
                    <div class="col-md-12">
                      <div class="box clearfix">
                        <h3>List Of Applied For <?=$exam;?> Application</h3>
                        <!--<p>Easily turn your tables into datatables.</p>-->
                        <div class="table-responsive">           
                          <table id="myTable" class="table">  
                            <thead>  
                              <tr>  
                                <th>Name Candidate</th>  
                                <th>Date Of Submited</th>  
                                <th>Application No</th>  
                                <th>View</th>  
                              </tr>  
                            </thead>  
                            <tbody>  
                               <?php
                                  while($res=mysqli_fetch_array($sql_new)){
                                      if($res['application_verification_officer']==0){
                                          $class="info";
                                      }
                                       if($res['application_verification_officer']==4){
                                           $class="success";
                                      }
                                       if($res['application_verification_officer']==2){
                                         $class="warning";
                                      }
                                       if($res['application_verification_officer']==3){
                                           $class="danger";
                                      }
                                    ?>

                                  <tr class="<?=$class?>">
                                    <td><?=$res['candidate_name']?></td>
                                    <td><?=date("d-m-Y", strtotime($res['date_of_submit']));?></td>
                                    <td><?=$res['application_no']?></td>
                                    <td><a class="fa fa-eye fa-2x" target="_self" href="view_applications.php?appno=<?php echo $res["application_no"];?>"></a></td>
                                  </tr>
                          <?php }?>
                            </tbody>  
                          </table>                          
                        </div>
<br>
                         <div class="col-lg-3"> 
                        <div class="alert alert-success"><strong>Approved Application</strong> 
                                </div>
                                </div>
                                <div class="col-lg-3"> 
                        <div class="alert alert-info"><strong>New Application </strong> 
                                </div>
                                </div>
                                  <div class="col-lg-3"> 
                        <div class="alert alert-warning"><strong>In-Adequate Application </strong> 
                                </div>
                                </div>
                                 <div class="col-lg-3"> 
                        <div class="alert alert-danger"><strong>Rejected Application </strong> 
                                </div>
                                </div>

                      </div>
                    </div>
                  </div>
                  <div id="Verified" class="tab-pane fade">
                       <div class="col-md-12">
                        <div class="box clearfix">
                          <h3>List Of Verified User For <?=$exam;?> Application</h3>
                          <!--<p>Easily turn your tables into datatables.</p>-->
                          <div class="table-responsive">
                            <table id="myTable2">  
                              <thead>  
                                <tr>  
                                  <th>Name Candidate</th>  
                                  <th>Application No</th>  
                                  <th>Date Of Submited</th>  
                                  <th>View</th>
                                </tr>  
                              </thead>  
                              <tbody>  
                                <?php
                                  while($res_verified=mysqli_fetch_array($sql_verified))
                                {?>
                                  <tr>
                                    <td><?=$res_verified['candidate_name']?></td>
                                   
                                    <td><?=$res_verified['application_no']?></td>
                                     <td><?=date("d-m-Y", strtotime($res_verified['date_of_submit']));?></td>
                                    <td><a target="_self" class="fa fa-eye fa-2x" href="view_applications.php?appno=<?php echo $res_verified["application_no"];?>"></a></td>
                                  </tr>
                          <?php }?>
                              </tbody>  
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div id="Adequate" class="tab-pane fade">
                    <div class="col-md-12">  
                      <div class="box clearfix">
                        <h3>List Of In-Adequate Info For <?=$exam?> Application</h3>
                        <!--<p>Easily turn your tables into datatables.</p>-->
                        <div class="table-responsive">
                          <table id="myTable1" class="table table-hover">  
                            <thead>
                                <tr>
                                    <th>Name Candidate</th>
                                    <th>Application No:</th>
                                    <th>Date Of Submited</th>
                                    <th>Remark Note</th>
                                    <th>Verify</th>
                                   <!-- <th></th>
                                    <th></th>-->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>Name Candidate</th>
                                    <th>Application No:</th>
                                    <th>Date Of Submited</th>
                                    <th>Remark Note</th>
                                    <th>Verify</th>
                                   <!-- <th></th>
                                    <th></th>-->
                                </tr>
                            </tfoot>
                            <tbody>
                              <?php
                                while($res_inadequad=mysqli_fetch_array($sql_inadequad))
                              {?>
                                <tr>
                                  <td><?=$res_inadequad['candidate_name']?></td>
                                  <td><?=$res_inadequad['application_no']?></td>
                                  <td><?=date("d-m-Y", strtotime($res_inadequad['date_of_submit']));?></td>
                                  <td>
                                  <?php $section=unserialize($res_inadequad['section']);
                                        $days=unserialize($res_inadequad['days']);
                                        $reason=unserialize($res_inadequad['reason_inadequte']);
                                        $last_date=unserialize($res_inadequad['dead_line_date']);
                                        $counts=count($section);
                                        for ($i=0; $i <$counts ; $i++) {                            
                                       
                                        switch ($section[$i]) {
                                          case '0':
                                            $exam_info_str="Personal Info";
                                            break;
                                           case '1':
                                             $exam_info_str="Eduction Info";
                                            break;
                                           case '2':
                                            $exam_info_str="Employment Info";
                                            break;
                                           case '3':
                                             $exam_info_str="Upload Certificate Info";
                                            break;
                                           case '4':
                                             $exam_info_str="Payment Info";
                                            break;    
                                          default:
                                             $exam_info_str="Declaration";
                                            break;
                                        }       
                                        
                                  
                                 echo 'Section :<span style="color:orange">'.$exam_info_str.'</span><br>';
                                    echo 'Reason :<span style="color:orange">'.$reason[$i].'</span><br>';
                                    echo 'Day :<span style="color:orange">'.$days[$i].'</span><br>';
                                    echo 'Last Day :<span style="color:orange">'.$last_date[$i].'</span><br>';
                                }?></td>
                                  <td><a target="_self" class="fa fa-eye fa-2x" href="view_application.php?appno=<?php echo $res_inadequad["application_no"];?>"></a></td>
                                </tr>
                        <?php }?>
                            </tbody> 
                          </table> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="Rejected" class="tab-pane fade">
                    <div class="col-md-12">  
                          <div class="box clearfix">
                          <h3>List Of Rejection Info For <?=$exam?> Application</h3>
                         <!--<p>Easily turn your tables into datatables.</p>-->
                         <div class="table-responsive">
                          <table id="myTable3">  
                            <thead>
                                <tr>
                                    <th>Name Candidate</th>
                                    <th>Application No:</th>
                                    <th>Remark Note</th>
                                    <th>view</th>
                                    <!--<th>Start date</th>
                                    <th>Salary</th>-->
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name Candidate</th>
                                    <th>Application No:</th>
                                    <th>Remark Note</th>
                                    <th>view</th>
                                    <!--<th>Start date</th>
                                    <th>Salary</th>-->
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php
                                while($res_rejected=mysqli_fetch_array($sql_rejected))
                              {?>
                                <tr>
                                  <td><?=$res_rejected['candidate_name']?></td>
                                  <td><?=$res_rejected['application_no']?></td>                                   
                                  <td><p style="color:red"><?=$res_rejected['rejected_reason']?></p></td> 
                                  <td><a target="_self" class="fa fa-eye fa-2x" href="view_applications.php?appno=<?php echo $res_rejected["application_no"];?>"></a></td>                    
                                </tr>
                        <?php }?>
                            </tbody> 
                          </table>
                        </div>
                      </div>
                    </div> 
                  </div>

                </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
<?php }else{
?>
       <div class="col-md-12">
        <div class="alert alert-success text-center">
          <strong > Please Select The Exam </strong>
        </div>
      </div>
<?php }

?>

<script type="text/javascript">
  function show_application(){
    var xyz=$('#exam').val();
    if(xyz!=""){
    // alert(xyz);
   
      $.ajax({
        type: "POST",
        url: "select_exam_application.php",
        data: {exam_type:xyz},
        success: function(result)   {
          if(result==1){
            // alert('hi');
            location.reload();
          }
        }
      });
    }   
  }
  </script>
  <script>
$(document).ready(function() {
    if(location.hash) {
     
        $('a[href=' + location.hash + ']').tab('show');
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {

        location.hash = this.getAttribute("href");

    });
});
$(window).on('popstate', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
   
    $('a[href=' + anchor + ']').tab('show');
});


</script>
<!-- <script type="text/javascript">
$(document).ready(function(){
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
  });
  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab a[href="' + activeTab + '"]').tab('show');
  }
});
</script> -->