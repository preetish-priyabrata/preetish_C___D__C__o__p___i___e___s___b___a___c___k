
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Url Details
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">view</a></li>
            <li class="active">Url</li>
          </ol>
        </section>

          <?php if ($this->session->flashdata('msg1')) {?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i></h4>
                   <?php echo $this->session->flashdata('msg1'); ?>
                  </div>
                    <?php }
?>
                     <?php if ($this->session->flashdata('msg')) {?>
 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i></h4>
                   <?php echo $this->session->flashdata('msg'); ?>
                  </div>
                   <?php }
?>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View Urls Details</h3>             
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>
                        <th>Title</th>
                       <th>Url</th>
                        <th>Category</th> 
                        <th>Like</th> 
                        <th>Comment</th>                                              
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $x=0;
                      $data=array('del_status'=>0,'type_posting'=>2);
                            $this->db->order_by('id', 'DESC');
                      $query=$this->db->get_where('blog_posting',$data);
                      foreach ($query->result() as $key) {
                        $x++;
                    ?>
                       
                      
                      <tr>
                        <td><?=$x?></td>
                        <td><?=$key->content_title?></td>
                        <td> <iframe src="<?=$key->url_link?>" class="webviews"></iframe> </td>
                        <td><?php $category=$key->category_id;
                            $data=array('id'=>$category);
                            $query_category=$this->db->get_where('categories',$data);
                            foreach ($query_category->result() as $key_value) {
                              if($key_value->id==$category){
                                echo $key_value->category;
                              }
                            }
                        ?></td>
                        <td> <a class="btn btn-success"  href="<?=base_url()?>view-like-url/<?=$key->blog_posting_id?>"><?=$key->like_no?></a></td>
                         <td> <a class="btn btn-success"  href="<?=base_url()?>view-comment-url/<?=$key->blog_posting_id?>"><?=$key->comment_no?></a></td>
                        
                      <td>
                                            <?php
                                               if ($key->status == 1) {
                                            ?>
                                                            <a href="<?php echo site_url('update-url-status/2/' . $key->id) ?>" name='active' class='badge bg-blue' style='cursor:pointer;'>Active</a>
                                                    <?php
                                                  } else {
                                                   ?>
                                                            <a href='<?php echo site_url('update-url-status/1/' . $key->id) ?>' name='inactive' class='badge bg-red' style='cursor:pointer;'>Inactive</a>
                                                    <?php
}
  ?>

                                          
                                           </td>
                                           <td>
                        <a href="<?php echo site_url('view-edit-url/' . $key->id) ?>" class="fa fa-pencil-square-o fa-2x" style="color:green" title="Edit"></a> || 
                                            <a href="" class="fa fa-close fa-2x" style="color:red" data-toggle="modal" data-target="#myModal<?=$key->id?>" title="Delete"></a>
                                           </td>
                                           </tr><div id="myModal<?=$key->id?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span style="color:red">Do You Want To Delete ...</span></h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal form-label-left" action="<?=base_url()?>deletes-url" method="POST" role="form">
        <input type="hidden" name="id" value="<?=$key->id?>">
       <label><b>Title Of Url</b> </label>: <?php echo $key->content_title ?>.<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-round btn-danger"  >Delete</button>

      </div>
    </div>
    </form>

  </div>
</div>




<?php }
?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Serial Nos </th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Category</th> 
                        <th>Like</th> 
                        <th>Comment</th>                                              
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <style type="text/css">
      .webviews{
    width: 100%;
    height: 314px;
  }
      </style>