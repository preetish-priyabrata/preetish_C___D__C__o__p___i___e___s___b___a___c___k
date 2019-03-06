 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                    Edit Admin Setting
            <small>Content Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Edit Admin</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Admin</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
           <?php $query = $this->db->get('admin');
            foreach ($query->result() as $key_value) {
              ;
            }
            ?>
            <div class="box-body">
               <form role="form" class="form-horizontal"  action="<?=base_url()?>admin-mars" method="post" enctype="multipart/form-data">
               <input type="hidden" value="<?=$key_value->id;?>" name="id"></input>
                       
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Admin Name</label>                   
                        <div class="col-md-8">
                          <input type="text" name="admin_name" required="" value="<?=$key_value->admin_name?>" class="form-control"></input>
                        </div>                        
                      </div>
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for=" Degination">Login Id</label>                   
                        <div class="col-md-8">
                          <input type="text" name="userid"  required="" value="<?=$key_value->userid?>"class="form-control" placeholder="userid"></input>
                        </div>                        
                      </div>
                       <div class="form-group">                       
                         <label class="col-sm-2 control-label" for=" Degination">Password</label>                   
                        <div class="col-md-8">
                          <input type="text" name="pass"  required="" value="<?=$key_value->pass?>"class="form-control" placeholder="Password"></input>
                        </div>                        
                      </div>
                      <div>
                        <div class="form-group"> 
                          <label class="col-sm-2 control-label" for=" image">Admin Image</label>
                          <div class="col-md-8">  
                            <input type='file' name="image" />
                                <img id="myImg" class="img-thumbnail" src="<?=base_url('uploads/admin/') . '/' . $key_value->image;?>" alt="your image" style="height: 20%;width: 15%;" />
                            
                            </div>
                      </div>

                       <div class="box-footer" style="float:right;">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                    </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">      
  $(function () {
    $(":file").change(function () {
     if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
      }
    });
  });
  function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result) .width(150).height(200);
  };
</script>