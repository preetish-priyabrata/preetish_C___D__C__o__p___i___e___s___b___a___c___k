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
            Admin View & Add Gate To Location
            <!-- <small>(Content/Urls)</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin-dashboard"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">View & Add Late To Location</li>
          </ol>
        </section>

          <?php if ($this->session->flashdata('msg1')) {?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i>   <?php echo $this->session->flashdata('msg1'); ?></h4>
                  </div>
          <?php }
          ?>
          <?php if ($this->session->flashdata('msg')) {?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i>  <?php echo $this->session->flashdata('msg'); ?></h4>
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
                  <li class="active"><a href="#View" data-toggle="tab"><strong>View Visiting Places Gate List </strong></a></li>
                  <li><a href="#Add" data-toggle="tab"><strong>Add Gate Name To Visiting Place </strong></a></li>
                  <!--   <li><a href="#Reservation" data-toggle="tab"><strong>Reservation Date</strong></a></li> -->
                </ul>
                <div class="tab-content">
                   <div class="active tab-pane" id="View">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Slno</th>
                                  <th>Gate Name</th>
                                  <th>Location Name</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $tables="master_gate_name";
                                $data21=array('status !='=>"0");
                                $x=1;
                                $query1 = $this->db->get_where($tables, $data21);
                                foreach ($query1->result() as $place_gate_details ) {?>              
                                  <tr>
                                    <td><?=$x;?></td>
                                    <td><?=ucwords($place_gate_details->gate_name);?></td>
                                    <td>
                                      <?php $location_id=$place_gate_details->place_id;
                                        $data21=array('place_id'=>$location_id);                                
                                        $table2="master_places";
                                        $query_location1 = $this->db->get_where($table2, $data21);
                                        foreach ($query_location1->result() as $location_details1 ) {
                                          $location=$location_details1->place_name;
                                        }
                                        echo ucwords($location);?>
                                    </td>
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
                  <div class=" tab-pane" id="Add">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                         <form class="form-horizontal" id="myForm"  method="POST" enctype="multipart/form-data" action="<?=base_url()?>Add-Gate">
                            <div class="form-group">
                              <label for="location" class="col-sm-2 control-label">Location Name : </label>
                              <div class="col-sm-10">
                              <select class="form-control" onchange="get_assign_gate_no()" name="location" id="location" required="">
                              <option value="">--Select Location --</option>
                              <?php $data2=array('status'=>"1");
                                
                                $table="master_places";
                                $query_location = $this->db->get_where($table, $data2);
                                foreach ($query_location->result() as $location_details ) {
                                  $no_gates=$location_details->no_gates;
                                  $assigned_gate_place=$location_details->assigned_gate_place;
                                  if($no_gates>$assigned_gate_place){

                                  
                                  ?>  
                                <option value="<?=$location_details->place_id?>"><?=ucwords($location_details->place_name);?></option>
                                <?php } }?>
                              </select>
                              
                                
                                <span id="errornews" style="color: red"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="check_point" class="col-sm-2 control-label">Check Point Name :</label>
                              <div class="col-sm-10">
                               <input type="text" class="form-control" onkeyup="check_place()" name="check_point" id="check_point" placeholder="Check Point Name" required="">
                              </div>
                            </div>
                            <!-- <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">No Of Check Points :</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="check_points" id="check_points" placeholder="Enter Values For Check Points" required="">
                              </div>
                            </div> -->
                            <div class="form-group" style="float: right;">
                              <button type="submit"   id="save" name="add_palce" value="add_location" class="btn btn-primary" >Submit</button>
                            </div>       
                          </form>
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
                  check_point:"required",
                    
                  
                },
                messages: {
                  location:"Please Select Place or Location Name",
                  check_point:"Please Enter Gate Name",                 
             
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
            var check_point_name=$('#check_point').val();
              if(location_name!=""){
                $.ajax({
                  type:'POST',
                  url:'gate-checks',
                  data:'location_name='+location_name+'&check_point_name='+check_point_name,
                  success:function(html){
                    
                    if(html==1){
                      document.getElementById("errornews").innerHTML = "";                     
                      $("#save").show();
                    }else{
                      if(html==2){
                      document.getElementById("errornews").innerHTML = "This Gate Name  Is Present In Our Record ,"+location_name;
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
