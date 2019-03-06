
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View page
            <small>Category</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">View Category</a></li>
            
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
                  <h3 class="box-title">Category Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>
                        <th>Category Type</th> 
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
                      $query=$this->db->get_where('categories',$data);
                      foreach ($query->result() as $key) {
                        $x++;
                    ?>
                       
                      
                      <tr>
                        <td><?=$x?></td>
                        <td><?=$key->category?></td>
                         <td><?=$key->date?></td>
                         <td><?=$key->time?></td>
                      <td>
                                            <?php
                                               if ($key->status == 1) {
                                            ?>
                                                            <a href="<?php echo site_url('update-category-status/2/' . $key->id) ?>" name='active' class='badge bg-blue' style='cursor:pointer;'>Active</a>
                                                    <?php
                                                  } else {
                                                   ?>
                                                            <a href='<?php echo site_url('update-category-status/1/' . $key->id) ?>' name='inactive' class='badge bg-red' style='cursor:pointer;'>Inactive</a>
                                                    <?php
}
  ?>

                                           </td>
                                           <td>
                                            <a href="" class="fa fa-pencil-square-o fa-2x" style="color:green" data-toggle="modal" data-target="#myeditmodal<?=$key->id?>"></a> || 
                                            <a href="" class="fa fa-close fa-2x" style="color:red" data-toggle="modal" data-target="#myModal<?=$key->id?>" title="Delete"></a>
                                           </td>
                                           </tr>
                                           <!-- edit Modal -->
<div id="myeditmodal<?=$key->id?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span style="color:blue">Edit Category</span></h4>
      </div>   
        <form id="preevender<?=$key->id?>" class="form-horizontal form-label-left" action="<?=base_url()?>update-category" method="POST" role="form" enctype="multipart/form-data">
            <div class="modal-body" style="overflow: auto;">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Category-name">Category: <span style="color:red">*</span></label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="hidden" name="cat_id" value="<?=$key->id?>" id="cat_id<?=$key->id?>">
                        <input size="20" class="form-control col-md-7 col-xs-12" type="text" value="<?=$key->category?>" name="category" id="cat<?=$key->id?>" Placeholder="Enter Category Name"  required  >
                        <span id="errornews<?=$key->id?>" style="color:red" ></span>
                    </div>
                                                                  
              </div>
            </div>
          <!-- <div class="modal-footer"> -->
            <div class="modal-footer">
                <button type="button" onclick="mycategory(<?=$key->id?>)" class="btn btn-primary" >Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
       
    </div>

  </div>
</div>
<!--edit modal -->
<!-- delete -->
  <div id="myModal<?=$key->id?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span style="color:red">Do You Want To Delete ...</span></h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal form-label-left" action="<?=base_url()?>deletes-category" method="POST" role="form">
        <input type="hidden" name="id" value="<?=$key->id?>">
        <input type="hidden" name="category" value="<?=$key->category?>">
       <label> <b>Category Name</b> </label>: <?php echo $key->category ?>.<br>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-round btn-danger"  >Delete</button>

      </div>
    </div>
    </form>

  </div>
</div>
<!-- end Delete -->



<?php }
?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Serial Nos </th>
                        <th>Category Type</th> 
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

      <script type="text/javascript">
    function mycategory(id){
        var cat=$('#cat'+id).val();
        var catid=$('#cat_id'+id).val();
        if(cat!=""){            
                $.ajax({
                    type: "POST",
                    url: "<?=base_url();?>index.php/mesgcontroller/checkcat/",
                     data: {cat:cat,catid:catid},
                    success: function(result)   {
                        if(result==1){
                             document.getElementById("errornews"+id).innerHTML = "";
                            $("#preevender"+id).submit(); 
                        }else{
                          document.getElementById("errornews"+id).innerHTML = "Category Is Used In Our List "+cat;
                          return false;
                        }
                    }
                });           
        }else{
            document.getElementById("errornews"+id).innerHTML = "Category Should Not Left Blank";
            return false;

        }
        

    }
    </script>