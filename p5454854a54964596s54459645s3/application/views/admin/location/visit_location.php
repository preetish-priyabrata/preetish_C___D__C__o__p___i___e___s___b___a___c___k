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
            Admin View & Add Location
            <!-- <small>(Content/Urls)</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin-dashboard"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">View & Add Location</li>
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
                  <li class="active"><a href="#View" data-toggle="tab"><strong>View Visiting Places List</strong></a></li>
                  <li><a href="#Add" data-toggle="tab"><strong>Add Visiting Place Name </strong></a></li>
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
                                  <th>Location Name</th>
                                   <th>Status</th>
                                  <th>Prices</th>
                                  <th>Re-Schedule Prices</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                $table="master_places";
                                $data2=array('status !='=>"0");
                                $x=1;
                                $query1 = $this->db->get_where($table, $data2);
                                foreach ($query1->result() as $place_details ) {?>              
                                  <tr>
                                    <td><?=$x;?></td>
                                    <td><?=ucwords($place_details->place_name);?></td>
                                    <td>
                                        <?php
                                          if ($place_details->status == 1) {
                                        ?>
                                          <a href="<?php echo site_url('update-location-status/2/' . $place_details->place_id) ?>" name='active'  class="btn btn-primary btn-xs">Active</a>
                                         <?php
                                          } else {
                                        ?>
                                          <a href='<?php echo site_url('update-location-status/1/' . $place_details->place_id) ?>' name='inactive' class="btn btn-warning btn-xs">In-Active</a>
                                        <?php } ?>
                                      
                                    </td>
                                    <td> &#x20B9; <?=$place_details->price_detail;?> /-</td>
                                    <td> &#x20B9; <?=$place_details->reschedule_price;?> /-</td>
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
                         <form class="form-horizontal" id="myForm"  method="POST" enctype="multipart/form-data" action="<?=base_url()?>Add-Location">
                            <div class="form-group">
                              <label for="location" class="col-sm-2 control-label">Location Name : </label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" onkeyup="check_place()" name="location" id="location" placeholder="Location Name" required="">
                                <span id="errornews" style="color: red"></span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="price" class="col-sm-2 control-label">Price :</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="schedule_price" class="col-sm-2 control-label">Re-schedule Price :</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="schedule_price" id="schedule_price" placeholder="Enter Re-schedule Price" required="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="check_points" class="col-sm-2 control-label">No Of Check Points :</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="check_points" id="check_points" placeholder="Enter Values For Check Points" required="">
                              </div>
                            </div>
                            <div class="form-group text-right">
                              <input type="submit"  value="Submit" id="save" name="add_palce" value="add_location" class="btn btn-primary" ></input>
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