  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                    Edit Content
            <small>Content Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">  Edit Content</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Edit Content</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
           
            <div class="box-body">
               <form role="form" class="form-horizontal"  action="<?=base_url()?>update-url-details" method="post" enctype="multipart/form-data">
               <input type="hidden" value="<?=$id?>" name="id"></input>
               <?php $data1=array('id'=>$id);
                      $query=$this->db->get_where('blog_posting',$data1);
                      foreach ($query->result() as $key_value) ?>
                       
                      <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Tittle</label>                   
                        <div class="col-md-8">
                          <input type="text" name="tittle" required="" value="<?=$key_value->content_title?>" class="form-control"></input>
                        </div>                        
                      </div>
                         <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Category</label>                   
                        <div class="col-md-8">
                          
                          <select name="category" class="form-control">
                            <option value="">-Select Category-</option>
                            <?php 
                            $query_category=$this->db->get_where('categories');
                            foreach ($query_category->result() as $key_value1) {                           ?>
                            <option value="<?php echo $key_value1->id;?>" <?php  if($key_value1->id==$key_value->category_id){ echo "selected"; }?>><?php  echo $key_value1->category;?></option>
                            <?php }?>
                          </select>
                        </div>                        
                      </div>

                        <div class="form-group">                       
                         <label class="col-sm-2 control-label" for="Employee">Url Link</label>                   
                        <div class="col-md-8">
                          <input type="text" name="url" required="" value="<?=$key_value->url_link?>" class="form-control"></input>
                        </div>                        
                      </div>
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
