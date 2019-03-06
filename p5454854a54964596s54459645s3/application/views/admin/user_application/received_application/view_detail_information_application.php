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
<?php 

 $token_id=$token;

            $data1=array('token_no'=>$token_id);
            $table="pass_detail_form";
            $results1=$this->db->get_where($table,$data1);
           $results11=$results1->num_rows();
            if($results11==0){
                $this->session->set_flashdata('msg1', 'Invalid Application No');
                redirect('admin-dashboard'); exit();
            }else{               
                $query1_detail = $this->db->get_where($table, $data1);
                // foreach ($results1->result() as $query1 ) {
                //    $infos = array('token_no'=>$query1->token_no , 'applicant_name'=>$query1->applicant_name ,'applicant_address'=>$query1->applicant_address,'place_visting'=>$query1->place_visting,'application_mobile'=>$query1->application_mobile,'applicant_id_source'=>$query1->applicant_id_source,'applicant_id_no'=>$query1->applicant_id_no,'dob'=>$query1->dob,'purpose_visting'=>$query1->purpose_visting,'Photo'=>base_url('upload/pic') . '/' .$query1->Photo,'Scan_id_photo'=>base_url('upload/pic') . '/' .$query1->Scan_id_photo,'paid_status'=>$query1->paid_status,'status'=>$query1->status,'date_journey'=>$query1->date_journey);
                  
                // }
            }
          

            ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin View Application Details
            <!-- <small>(Content/Urls)</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin-dashboard"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li ><a href="View-received-Application"> Admin View Received Application</a></li>
            <li class="active">View Application Details </li>
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
            <!-- <div class="col-md-12"> -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#Received" data-toggle="tab"><strong>Application Details</strong></a></li>
                    <!-- <li><a href="#Personal" data-toggle="tab"><strong>Personal Document Pending List  </strong></a></li>
                    <li><a href="#vehicle" data-toggle="tab"><strong>Vehicle Document Pending List</strong></a></li> -->
                </ul>
                <div class="tab-content">
                   <div class="active tab-pane" id="Received">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                           <div class="box box-primary">
                            <div class="box-header with-border"  style="background-color: orange">
                              <h3 class="box-title">Personal Information</h3>
                            </div> 
                            <div role="form" class="form-horizontal" >
                            <?php  foreach ($results1->result() as $query1 ) { ?>
                              <div class="box-body">
                              <div class="col-sm-8"> 
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="Desigination_user">Applicant Name:</label>
                                  <div class="col-sm-5">                                
                                    <?=$query1->applicant_name?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="Desigination_user">Applicant Mobile:</label>
                                  <div class="col-sm-5">                                
                                   <?=$query1->application_mobile?> 
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-3" for="Desigination_user">Applicant Address:</label>
                                  <div class="col-sm-5">                                
                                    <?=$query1->applicant_address?>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label class="control-label col-sm-3" for="Desigination_user">Applicant Date Of Birth:</label>
                                  <div class="col-sm-5">                                
                                    <?=$query1->dob?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-sm-4">     
                                    <div class="pull-right">
                                        
                                      <div class="col-sm-6">                                
                                        <img src="<?=base_url('upload/pic') . '/' .$query1->Photo?>">
                                      </div>

                                    </div>
                                  </div>
                                  </div>
                              <div class="box box-primary">
                                <div class="box-header with-border"  style="background-color: orange">
                                  <h3 class="box-title">Identification Document</h3>
                                </div> 
                                <div class="box-body">
                                <div class="col-sm-8">  
                                   
                                    <div class="form-group">
                                      <label class="control-label col-sm-3" for="Desigination_user">Id Proof:</label>
                                      <div class="col-sm-4">                                
                                       <?=$query1->applicant_id_source?> 
                                      </div>
                                    </div>
                                   <div class="form-group">
                                      <label class="control-label col-sm-3" for="Desigination_user">Id Proof No:</label>
                                      <div class="col-sm-4">                                
                                        <?=$query1->applicant_id_no?>
                                      </div>
                                    </div>
                                    
                                  </div>
                                    <div class="col-sm-4">     
                                    <div class="pull-right">
                                        
                                      <div class="col-sm-6">                                
                                        <img src="<?=base_url('upload/pic') . '/' .$query1->Scan_id_photo?>">
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="box box-primary">
                                <div class="box-header with-border"  style="background-color: orange">
                                  <h3 class="box-title">Journey Details</h3>
                                </div> 
                                <div class="box-body">
                                  
                                    <div class="form-group">
                                      <label class="control-label col-sm-3" for="Desigination_user">Date Od Jouney:</label>
                                      <div class="col-sm-4">                                
                                        <?=$query1->date_journey?>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-3" for="Desigination_user">Purpose:</label>
                                      <div class="col-sm-4">                                
                                        <?=$query1->purpose_visting?>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-3" for="Desigination_user">Place Name:</label>
                                      <div class="col-sm-4">                                
                                        <?=$query1->applicant_name?>
                                      </div>
                                    </div>
                                    
                                  
                                </div>
                              </div>
                             <?php }?>
                              <div class="text-center">
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">Click Here</button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div><!-- /.tab-pane -->


                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                    
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Confirm </h4>
                      </div>
                      <form id="records" action="<?=base_url()?>save-details-conform-personal" method="POST">
                      <div class="modal-body">
                        <label for="1">
                          <input type="radio" id="1" value="2" onclick="show1()" name="verify1"  aria-required="true">Pending
                        </label>
                        <label for="2">
                          <input type="radio" id="2" value="1" onclick="hide1()" name="verify1">Approved
                        </label>
                        <label for="verify1" class="error" style="display:none;">Please Select Any One</label>
                        <textarea rows="2" class="form-control" style="display: none;" class="form-control"  name="verify2" id="verify2"  ></textarea>
                      </div>
                      <input type="hidden" name="token_id" value="<?=$token_id?>">
                      <div class="modal-footer">
                        <input type="submit" id="save" class="btn btn-default" value="save" >
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                    
                  </div>
                </div>

                 
                 
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            <!-- </div> -->
            <!-- /.col -->            
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <br>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
       <!-- <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> -->
      <script type="text/javascript">
       
        $("#records").validate({
            // onfocusout: function(element) {
            //        this.element(element);
            //     },
                rules: {
                  verify1:"required",
                  verify2:{
                        required: {
                            depends: function (element) {
                                return $("input[name='verify1'][value='2']").is(":checked");
                            }
                        }
                    },
                },
                messages: {
                  verify1:"Please Select Any One",
                  verify2:"Please Fill Details",
             
                },
                // submitHandler: function() { alert("Submitted!") }
                  submitHandler: function(form) {
                  $("#records").submit();  
                   
                  }
               
            })
        jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });


     
       

  $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
</script> 
<script type="text/javascript">
        function show() {document.getElementById('data_area').style.display = 'block'; }
        function hide() { document.getElementById('data_area').style.display = 'none'; }
         function show1() {document.getElementById('verify2').style.display = 'block'; }
        function hide1() { document.getElementById('verify2').style.display = 'none'; }
</script>