   <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View page
            <small>Users</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">View User</a></li>
            
          </ol>
        </section>

          <?php if ($this->session->flashdata('msg1')) {?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata('msg1'); ?></h4>
                   
                  </div>
                    <?php }
?>
                     <?php if ($this->session->flashdata('msg')) {?>
 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('msg'); ?></h4>
                  
                  </div>
                   <?php }
?>

        <!-- Main content -->
        <section class="content">
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">User List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         <th>Serial Nos </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Profile</th>
                        <th>User Id</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

<?php  $x = 0;
$data = array('del_status' => 0);
$query = $this->db->get_where('users', $data);
foreach ($query->result() as $key) {
  $x++;
  ?>
                       
                      
                      <tr>
                        <td><?=$x?></td>
                        <td><?php echo  $key->first_name.' '. $key->last_name?></td> 
                        <td><?=$key->email?></td>
                        <td><?php $imag=$key->image;
                        if(empty($imag)){?>
                          <div class="wrapper size">
                                  <img src="<?=base_url()?>asset/profile.jpg" class="img-circle" alt="example"/>
                          </div>
                    <?php    }else{?>
                             <div class="wrapper size">
                                  <img src="<?=base_url()?>uploads/user_profile/<?=$imag?>" class="img-circle" alt="example"/>
                          </div>
                       <?php }
                        ?></td>
                        <td><?=$key->user_id?></td>
                        <td><?=$key->date?></td>
                        <td><?=$key->time?></td>
                          <td>
                                            <?php
                                               if ($key->status == 1) {
                                            ?>
                                                            <a href="<?php echo site_url('update-user-status/2/' . $key->id) ?>" name='active' class='badge bg-blue' style='cursor:pointer;'>Active</a>
                                                    <?php
                                                  } else {
                                                   ?>
                                                            <a href='<?php echo site_url('update-user-status/1/' . $key->id) ?>' name='inactive' class='badge bg-red' style='cursor:pointer;'>Inactive</a>
                                                    <?php
}
  ?>

                                           </td>
                                           <td><!-- <a href="<?php echo site_url('view-user-detail/' . $key->id) ?>" class="fa fa-desktop fa-1x" style="color:blue" data-toggle="modal"  title="View user"></a> || --> <a href="" class="fa fa-close fa-1x" style="color:red" data-toggle="modal" data-target="#myModal<?=$key->id?>" title="Delete"></a>
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
       <form class="form-horizontal form-label-left" action="<?=base_url()?>deletes-user" method="POST" role="form">
        <input type="hidden" name="id" value="<?=$key->id?>">
       <label> <b>User Name</b> </label>: <?php echo  $key->first_name.' '. $key->last_name?>.<br>
       <label> <b>User Id</b> </label>: <?php echo $key->user_id ?>.<br>
       <label> <b>User Email</b> </label>: <?php echo $key->email ?>.<br>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Profile</th>
                        <th>User Id</th>
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
      <style type="text/css">
        .size {
    width: 100px;
    height: 100px;
}
img {
    width: 100%;
    height: 100%;
}

      </style>