
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Abuse Details
            <small>Answer</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">view</a></li>
            <li class="active">Abuse</li>
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

           <?php 
           $question="";
           $answer_detail="";
           $adats=array('comment_ans_id'=>$id);
              $query1=$this->db->get_where('q_a_comment',$adats);
              if($query1->num_rows()==0){
                echo ('N/A');
              }else{
                foreach ($query1->result() as $key_ssvalue) {
                   $question_posting_id=$key_ssvalue->question_posting_id;
                   $answer_id=$key_ssvalue->answer_id;

                }
              
                $data_question=array('question_posting_id'=>$question_posting_id);
                $query_question=$this->db->get_where('question_post',$data_question);
                foreach ($query_question->result() as $key_question) {
                  $question= $key_question->question;

                  # code...
                }
                $data_answer=array('answer_id'=>$answer_id,'question_posting_id'=>$question_posting_id);
                 $query_question_answer=$this->db->get_where('q_answer',$data_answer);
                 foreach ($query_question_answer->result() as $key_svalue) {
                  $answer_detail=$key_svalue->answer_detail;
                 }
              }
              ?>          <div class="box">
          
            <div class="box-header with-border">
              <h3 class="box-title">

                 Question:  <?=$question?> 
              </h3> <br>
                 <h3 class="box-title">
                 Answer:  <?=$answer_detail?>
                 </h3>         
            </div>     
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       <th>Serial Nos </th>
                        <th>User Name</th>
                        <th>Date</th> 
                        <th>Time</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $x=0;
                     $datas=array('del_status'=>0,'comment_ans_id'=>$id);
                     $this->db->order_by('id', 'DESC');
                      $query=$this->db->get_where('q_a_c_scam',$datas);

                      foreach ($query->result() as $key) {
                        $x++;
                    ?>
                       
                      
                      <tr>
                        <td><?=$x?></td>
                        <?php $ym_user=$key->user_id?>
                        <td>
                        <?php 
                          $data_user=array('user_id'=>$ym_user);
                          $query11=$this->db->get_where('users',$data_user);
                          foreach ($query11->result() as $key11) {
                            echo $key11->first_name;
                          }
                          ?>
                        </td>
                         <td><?=$key->date?></td>
                        <td><?=$key->time?></td>
                        
                      <td>
                                            <?php
                                               if ($key->status == 1) {
                                            ?>
                                                            <a href="<?php echo site_url('update-answerabuse-status/2/' . $key->id.'/'.$id) ?>" name='active' class='badge bg-blue' style='cursor:pointer;'>Active</a>
                                                    <?php
                                                  } else {
                                                   ?>
                                                            <a href='<?php echo site_url('update-answerabuse-status/1/' . $key->id.'/'.$id) ?>' name='inactive' class='badge bg-red' style='cursor:pointer;'>Inactive</a>
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
       <form class="form-horizontal form-label-left" action="<?=base_url()?>deletes-answerabuse" method="POST" role="form">
        <input type="hidden" name="id" value="<?=$key->id?>">
          <input type="hidden" name="comment_id" value="<?=$id?>">
       <label><b>User Name</b> </label>:  <?php 
                          $data_user=array('user_id'=>$ym_user);
                          $query11=$this->db->get_where('users',$data_user);
                          foreach ($query11->result() as $key11) {
                            echo $key11->first_name;
                          }
                          ?>.<br>
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
                        <th>User Name</th>
                        <th>Date</th> 
                        <th>Time</th>                     
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                    <div class="col-md-12">
            <div class="row" style="float: right;">
             <a href="<?=base_url()?>view-comment-question/<?=$answer_id?>" class="btn btn-primary fa fa-caret-left">Back</a>
            </div>
            </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->