
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          view
            <small>Users</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">View Users</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> View Users</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
           
            <div class="box-body">
               <form role="form" class="form-horizontal">
               <input type="hidden" value="<?=$id?>" name="id"></input>
               <?php $data1=array('id'=>$id);
                      $query=$this->db->get_where('users',$data1);
                      foreach ($query->result() as $key_value) ?>
                       
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">First Name:</label>                   
                        <div class="col-md-2">
                          <?=$key_value->first_name?>
                        </div>                        
                      </div>
                       <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Last Name:</label>                   
                        <div class="col-md-2">
                          <?=$key_value->last_name?>
                        </div>                        
                      </div>
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for=" Degination">Email:</label>                   
                        <div class="col-md-8">
                         <?=$key_value->email?>
                        </div>                        
                      </div>
                       <div class="form-group">                       
                         <label class="col-sm-2 control-label" for=" Degination">Mobile No:</label>                   
                        <div class="col-md-8">
                         <?=$key_value->mobile?>
                        </div>                        
                      </div>
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for=" Degination">Gender:</label>                   
                        <div class="col-md-8">
                          <?php
                            if ($key_value->gender == 2) {
                            ?>Male
                          <?php
                          }else{
                            ?>Female
                          <?php
                          }
                          ?>
                        </div>                        
                      </div>
                       <div class="form-group">                       
                         <label class="col-sm-2 control-label" for=" Degination">Date of birth:</label>                   
                        <div class="col-md-8">
                         <?=$key_value->dob?>
                        </div>                        
                      </div>
                       </form>
                     <div class="box-footer" style="float:right;">
                    <a href="<?=base_url()?>view-user-list" type="submit" class="btn btn-primary">back</a>
                  </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
