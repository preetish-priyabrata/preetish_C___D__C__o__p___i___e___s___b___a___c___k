
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin View
            <small>(Posting/Questions)</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">files</a></li>
            <li class="active">Question</li>
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
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#Personal" data-toggle="tab"><strong>View Qusetions</strong></a></li>
                    <li><a href="#Note" data-toggle="tab"><strong>View Files</strong></a></li>
                  <!--   <li><a href="#Reservation" data-toggle="tab"><strong>Reservation Date</strong></a></li> -->
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="Personal">
                       <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
<section class="content">
          <div class="box">
               <!--  <div class="box-header">
                  <h3 class="box-title">Category Details</h3>
                </div> --><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         <th>Serial Nos </th>
                        <th>Question</th>
                        <th>Question Details</th> 
                        <th>Category</th> 
                        <th>Date</th> 
                        <th>Time</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $x=0;
                      $data=array('del_status'=>0);
                      $this->db->order_by('id', 'DESC');
                      $query=$this->db->get_where('question_post',$data);
                      foreach ($query->result() as $key) {
                        $x++;
                    ?>
                       
                      
                      <tr>
                        <td><?=$x?></td>
                        <td><?=$key->question?></td>
                        <td><?=$key->description?></td>
                        <td><?=$key->category?></td>
                        <td><?=$key->date?></td>
                        <td><?=$key->time?></td>
                      <td>
                                            <?php
                                               if ($key->status == 1) {
                                            ?>
                                                            <a href="<?php echo site_url('update-question-status/2/' . $key->id) ?>" name='active' class='badge bg-blue' style='cursor:pointer;'>Active</a>
                                                    <?php
                                                  } else {
                                                   ?>
                                                            <a href='<?php echo site_url('update-question-status/1/' . $key->id) ?>' name='inactive' class='badge bg-red' style='cursor:pointer;'>Inactive</a>
                                                    <?php
}
  ?>

                                          
                                           </td>
                                           <td>
                        <a href="<?php echo site_url('view-edit-form/' . $key->id) ?>" class="fa fa-pencil-square-o fa-2x" style="color:green" title="Edit"></a> || 
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
       <form class="form-horizontal form-label-left" action="<?=base_url()?>deletes-question" method="POST" role="form">
        <input type="hidden" name="id" value="<?=$key->id?>">
       <label><b>Question</b> </label>: <?php echo $key->question ?>.<br>
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
                        <th>Question</th>
                        <th>Question Details</th> 
                        <th>Category</th> 
                        <th>Date</th> 
                        <th>Time</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

                              </div>
                            </div>
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
      </div>
                         