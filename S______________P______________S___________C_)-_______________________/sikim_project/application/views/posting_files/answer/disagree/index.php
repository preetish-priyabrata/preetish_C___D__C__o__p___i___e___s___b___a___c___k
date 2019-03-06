
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Disagree Details
            <small>Answer</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">view</a></li>
            <li class="active">disagree</li>
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
          <?php $adats=array('answer_id'=>$id);
              $query1=$this->db->get_where('q_answer',$adats);
              if($query1->num_rows()==0){
                echo('N/A');
              }else{
                foreach ($query1->result() as $key_ssvalue) {
                   $question_posting_id=$key_ssvalue->question_posting_id;
                   $answer_detail=$key_ssvalue->answer_detail;
                }
              }
                $data_question=array('question_posting_id'=>$question_posting_id);
                $query_question=$this->db->get_where('question_post',$data_question);
                foreach ($query_question->result() as $key_question) {
                  $question= $key_question->question;

                  # code...
                }
              ?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
                Question:  <?=$question?>
              </h3> <br>
              <h3 class="box-title">
                 Answer:<?=$answer_detail?>
              </h3>         
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Serial Nos </th>
                        <th>No Of Users</th>
                        <th>Date</th>
                        <th>Time</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $x=0;
                      $datas=array('del_status'=>0,'answer_id'=>$id,'like_value'=>$disagree);
                      $this->db->order_by('id', 'DESC');
                      $query=$this->db->get_where('like_answer',$datas);

                      foreach ($query->result() as $key) {
                        $x++;
                    ?>
                       
                      
                      <tr>
                        <td><?=$x?></td>
                      <td><?php $data_users1=array('user_id'=>$key->user_id);
                $query_email12=$this->db->get_where('users',$data_users1);
                foreach ($query_email12->result() as $key_value12) {
                 echo $user_name1=$key_value12->first_name." ".$key_value12->last_name;
                }?> </td>
                 <td><?=$key->date?></td>
                 <td><?=$key->time?></td>
                      <td>
                                            <?php
                                               if ($key->status == 1) {
                                            ?>
                                                            <a href="<?php echo site_url('update-disagree-status/2/' . $key->id.'/'.$id.'/'.$disagree) ?>" name='active' class='badge bg-blue' style='cursor:pointer;'>Active</a>
                                                    <?php
                                                  } else {
                                                   ?>
                                                            <a href='<?php echo site_url('update-disagree-status/1/' . $key->id.'/'.$id.'/'.$disagree) ?>' name='inactive' class='badge bg-red' style='cursor:pointer;'>Inactive</a>
                                                    <?php
}
  ?>

                                          
                                           </td>
                                           <td>
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
       <form class="form-horizontal form-label-left" action="<?=base_url()?>deletes-disagree" method="POST" role="form">
        <input type="hidden" name="id" value="<?=$key->id?>">
        <input type="hidden" name="id" value="<?=$key->id?>">
         <input type="hidden" name="answer_id" value="<?=$id?>">
          <input type="hidden" name="disagree" value="<?=$disagree?>">
       <label><b>User Id</b> </label>: <?php echo $key->user_id ?>.<br>
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
                        <th>No Of Users</th>
                        <th>Date</th>
                        <th>Time</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                    <div class="col-md-12">
            <div class="row" style="float: right;">
            <a href="<?=base_url()?>view-answer-question/<?=$question_posting_id?>" class="btn btn-primary fa fa-caret-left">Back</a>
            </div>
            </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->