<?php if (isset($this->session->userdata['session'])) {
  if ($this->session->userdata['session']['username']) {
    $id = $this->session->userdata['session']['admin_id'];
    $name = $this->session->userdata['session']['username'];
    $image_name = $this->session->userdata['session']['image'];
  } else {
    redirect('logout');
  }
} else {
  redirect('logout');
}
?>
<style type="text/css">
  .error{
    color: red;
  }
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin View List Of Pending
            <!-- <small>(Content/Urls)</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin-dashboard"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active"> Admin View List Of Pending </li>
          </ol>
        </section>

          <?php if ($this->session->flashdata('msg1')) {?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata('msg1'); ?></h4>
                   
                  </div>
          <?php }
          ?>
          <?php if ($this->session->flashdata('msg')) {?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg'); ?></h4>
                   
                  </div>
          <?php }
          ?>
          <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#Paynent" data-toggle="tab"><strong>Paynent Pending List</strong></a></li>
                  <li><a href="#Personal" data-toggle="tab"><strong>Personal Document Pending List  </strong></a></li>
                    <li><a href="#vehicle" data-toggle="tab"><strong>Vehicle Document Pending List</strong></a></li>
                </ul>
                <div class="tab-content">
                   <div class="active tab-pane" id="Paynent">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                          <div class="table-responsive">
                            <table class="table" id="example3">
                              <thead>
                                <tr>
                                  <th>Slno</th>
                                  <th>Appliction Id</th>
                                  <th>Appliction Name </th>
                                  <th>Appliction Mobile </th>
                                  <th>Payment Id </th>
                                  <th>Status</th>
                                  <th>Date OF Journey</th>
                                  <th>Date/Time Applied</th>
                                  <!-- <th>Date/Time Applied</th> -->
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $date=date('Y-m-d');
                                $table="pass_detail_form";
                                $data2=array('date_journey >='=>$date ,'paid_status !='=>'1');
                                $x=1;
                                $query1 = $this->db->get_where($table, $data2);
                                foreach ($query1->result() as $application_details ) {?>              
                                  <tr>
                                    <td><?=$x;?></td>
                                    <td><?=ucwords($application_details->token_no);?></td>
                                    <td><?=ucwords($application_details->applicant_name);?></td>
                                    <td><?=ucwords($application_details->application_mobile);?></td>
                                    <td><?=ucwords($application_details->transaction_id);?></td>
                                   
                                    <td>
                                        <?php
                                          if ($application_details->paid_status == 2) {
                                        ?>
                                          <a href="<?php echo site_url('update-payment-fail-status/2/' . $application_details->token_no.'/'.$application_details->transaction_id) ?>" name='active'  class="btn btn-danger btn-xs">Failed</a>
                                         <?php
                                          } else {
                                        ?>
                                          <a href='#' name='inactive' class="btn btn-warning btn-xs">Payment In Process</a>
                                        <?php } ?>
                                      
                                    </td>
                                    <td><?=date('d-m-Y',strtotime($application_details->date_journey));?></td>
                                 <td><?=date('d-m-Y',strtotime($application_details->date));?> / <?=date('h:i:s a',strtotime($application_details->time));?></td>
                                  </tr>
                                <?php 
                                $x++;
                                }?>
                              </tbody>
                            </table>
                          </div> 
                        </div>
                      </div>
                    </div> 
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="Personal">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                          <div class="table-responsive">
                            <table class="table" id="example4">
                              <thead>
                                <tr>
                                  <th>Slno</th>
                                  <th>Appliction Id</th>
                                  <th>Appliction Name </th>
                                  <th>Appliction Mobile </th>
                                  <th>Payment Id </th>
                                  <th>Remark</th>
                                  <th>Date OF Journey</th>
                                  <th>Date/Time Applied</th>
                                  <!-- <th>Date/Time Applied</th> -->
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $date=date('Y-m-d');
                                $table1="pass_detail_form";
                                $data21=array('date_journey >='=>$date ,'pending_status'=>'2','paid_status'=>'1');
                                $x=1;
                                $query11 = $this->db->get_where($table1, $data21);
                                foreach ($query11->result() as $application_details1 ) {?>              
                                  <tr>
                                    <td><?=$x;?></td>
                                    <td><?=ucwords($application_details1->token_no);?></td>
                                    <td><?=ucwords($application_details1->applicant_name);?></td>
                                    <td><?=ucwords($application_details1->application_mobile);?></td>
                                    <td><?=ucwords($application_details1->transaction_id);?></td>  
                                    <td><?=ucwords($application_details1->remarks);?></td>                   

                                    <td><?=date('d-m-Y',strtotime($application_details1->date_journey));?></td>
                                 <td><?=date('d-m-Y',strtotime($application_details1->date));?> / <?=date('h:i:s a',strtotime($application_details1->time));?></td>
                                  </tr>
                                <?php 
                                $x++;
                                }?>
                              </tbody>
                            </table>
                          </div> 
                        </div>
                      </div>
                    </div> 
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="vehicle">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                          <div class="table-responsive">
                            <table class="table" id="example1">
                              <thead>
                                <tr>
                                  <th>Slno</th>
                                  <th>Appliction Id</th>
                                  <th>Appliction Name </th>
                                  <th>Appliction Mobile </th>
                                  <th>Payment Id </th>
                                  <th>Remark</th>
                                  <th>Date OF Journey</th>
                                  <th>Date/Time Applied</th>
                                  <!-- <th>Date/Time Applied</th> -->
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $date=date('Y-m-d');
                                $table2="pass_detail_form";
                                $data22=array('date_journey >='=>$date ,'pending_status'=>'3','paid_status'=>'1');
                                $x=1;
                                $query12 = $this->db->get_where($table2, $data22);
                                foreach ($query12->result() as $application_details2 ) {?>              
                                  <tr>
                                    <td><?=$x;?></td>
                                    <td><?=ucwords($application_details2->token_no);?></td>
                                    <td><?=ucwords($application_details2->applicant_name);?></td>
                                    <td><?=ucwords($application_details2->application_mobile);?></td>
                                    <td><?=ucwords($application_details2->transaction_id);?></td>
                                    <td><?=ucwords($application_details2->remarks);?></td>
                                    
                                    <td><?=date('d-m-Y',strtotime($application_details->date_journey));?></td>
                                 <td><?=date('d-m-Y',strtotime($application_details->date));?> / <?=date('h:i:s a',strtotime($application_details->time));?></td>
                                  </tr>
                                <?php 
                                $x++;
                                }?>
                              </tbody>
                            </table>
                          </div> 
                        </div>
                      </div>
                    </div> 
                  </div><!-- /.tab-pane -->
                 
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->            
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">
       
        $("#myForm").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {
                  location:"required",              
                  price:{
                    required:true,
                    number:true
                  },
                  schedule_price:{
                    required:true,
                    number:true
                  },
                  check_points:{
                    required:true,
                    number:true
                  },
                },
                messages: {
                  location:"Please Enter Place or Location Name",                 
                  price:{
                    required:"Please Enter Price  ",
                    number:"Please Enter Numbers"               
                  },
                   schedule_price:{
                    required:"Please Enter Price  ",
                    number:"Please Enter Numbers"               
                  },
                  check_points:{
                    required:"Please Enter Check Point Number  ",
                    number:"Please Enter Numbers"               
                  },
             
                },
          //         submitHandler: function(form) {
          //   form.submit();
          // }
               
            })
        jQuery.validator.setDefaults({
          debug: true,
          // success: "valid"
        });

        </script>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#save").hide();
          });
        </script>
        <script type="text/javascript">
          function check_place() {
            // alert();
            var location_name=$('#location').val();
              if(location_name!=""){
                $.ajax({
                  type:'POST',
                  url:'location_checks',
                  data:'location_name='+location_name,
                  success:function(html){
                    
                    if(html==1){
                      document.getElementById("errornews").innerHTML = "";                     
                      $("#save").show();
                    }else{
                      if(html==2){
                      document.getElementById("errornews").innerHTML = "This Place Name  Is Present In Our Record ,"+location_name;
                      $("#save").hide();
                      return false;
                    }else{
                       document.getElementById("errornews").innerHTML = "Please Check If It Is Blank";
                        $("#save").hide();
                      return false;
                    }
                  }
                }
              });
            }
          }
        </script>
<script type="text/javascript">
  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 