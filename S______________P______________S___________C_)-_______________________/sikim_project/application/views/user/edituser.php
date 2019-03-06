 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                    Edit User
            <small>Content Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">  Edit User</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Edit User</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
           
            <div class="box-body">
               <form role="form" class="form-horizontal"  action="<?=base_url()?>update-user-details" method="post" enctype="multipart/form-data">
               <input type="hidden" value="<?=$id?>" name="id"></input>
               <?php $data1=array('id'=>$id);
                      $query=$this->db->get_where('users',$data1);
                      foreach ($query->result() as $key_value) ?>
                       
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">First Name</label>                   
                        <div class="col-md-8">
                          <input type="text" name="first_name" required="" value="<?=$key_value->first_name?>" class="form-control"></input>
                        </div>                        
                      </div>
                    <!--    <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Last Name</label>                   
                        <div class="col-md-8">
                          <input type="text" name="last_name" required="" value="<?=$key_value->last_name?>" class="form-control"></input>
                        </div>                        
                      </div> -->
                       <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Email</label>                   
                        <div class="col-md-8">
                          <input type="text" name="email" required="" value="<?=$key_value->email?>" class="form-control"></input>
                        </div>                        
                      </div>
                       <!-- <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Mobile No</label>                   
                        <div class="col-md-8">
                          <input type="text" name="mobile" required="" value="<?=$key_value->mobile?>" class="form-control"></input>
                        </div>                        
                      </div> -->
                     <!--  <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="user">Gender</label>                   
                      <div class="col-md-8">
                      <label class="radio-inline"><input type="radio" name="gender" value="2" <?php if($key_value->gender==2) echo "checked"?> /> Male</label>
                      <label class="radio-inline"><input type="radio" name="gender" value="3" <?php if($key_value->gender==3) echo "checked"?> /> Female</label>
                       </div>                        
                      </div> -->
                       <div class="box-footer" style="float:right;">
                    <button type="submit" class="btn btn-primary">Save</button>

                  </div>
                    </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
        