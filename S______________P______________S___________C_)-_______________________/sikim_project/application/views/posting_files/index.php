
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add 
            <small>(Posting/Questions)</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
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
                    <li class="active"><a href="#Personal" data-toggle="tab"><strong>Post Files</strong></a></li>
                    <li><a href="#Note" data-toggle="tab"><strong>Post A Qusetions</strong></a></li>
                  <!--   <li><a href="#Reservation" data-toggle="tab"><strong>Reservation Date</strong></a></li> -->
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="Personal">
                       <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
                              <form class="form-horizontal" id="myForm" method="POST" enctype="multipart/form-data" action="<?=base_url()?>Add-file-form">
                                <!-- <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                  </div>
                                </div> -->
                                <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">File</label>
                                  <div class="col-sm-10">
                                   <input id="input-1" type="file" class="file" name="fisles" required>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label for="comment" class="col-sm-2 control-label">Description:</label>
                                   <div class="col-sm-10">
                                  <textarea class="form-control" rows="5" id="comment" name="description" required=""></textarea>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <label for="sel1" class="col-sm-2 control-label">Category:</label>
                                  <div class="col-sm-10">
                                 <?php  $data=array('del_status'=>0,'status'=>1);
                                        $query=$this->db->get_where('categories',$data);
                                       ?>
                                  <select class="form-control" name="cat" id="sel1" required="">
                                  <option value="">-Select Category</option>
                                  <?php  foreach ($query->result() as $key) {?>
                                    <option value="<?=$key->id?>"><?=$key->category?></option>
                                   <?php }?>
                                  </select>
                                  </div>
                                </div>
                                <div class="form-group" style="float: right;">
                                 <input type="submit" value="Submit" class="btn btn-primary" ></input>
                                </div>
                              </form>
                                

                              </div>
                            </div>
                        </div> 
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="Note">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
                                <!-- Example row of columns -->
                                <form class="form-horizontal" id="myForm" method="POST" enctype="multipart/form-data" action="<?=base_url()?>Add-post-questions-form">
                                <!-- <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                  </div>
                                </div> -->
                                
                                 <div class="form-group">
                                  <label for="comment" class="col-sm-2 control-label">Ask a Question</label>
                                   <div class="col-sm-10">
                                  <textarea class="form-control" rows="5" id="comment" name="questions" placeholder="Ask a Question" required=""></textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                   <div class="span4 collapse-group"> 
                                    <div class="col-sm-2"></div>                  
                                      <p class="collapse col-sm-10">                                   
                                        <textarea class="form-control" rows="5" id="comment" name="desc" placeholder="Giving Brief About The Questions"></textarea>                                   
                                      </p>                                 
                                      <p><a class="btns fa fa-align-justify col-sm-2" href="#"> Detail </a></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="sel1" class="col-sm-2 control-label">Category:</label>
                                  <div class="col-sm-10">
                                 <?php  $data=array('del_status'=>0,'status'=>1);
                                        $query=$this->db->get_where('categories',$data);
                                       ?>
                                  <select class="form-control" name="cat" id="sel1" required="">
                                  <option value="">-Select Category</option>
                                  <?php  foreach ($query->result() as $key) {?>
                                    <option value="<?=$key->id?>"><?=$key->category?></option>
                                   <?php }?>
                                  </select>
                                  </div>
                                </div>
                                <div class="form-group" style="float: right;">
                                <input type="submit" value="Submit"  class="btn btn-primary"></input>
                                </div>
                              </form>
                                                      

                              </div>
                            </div>
                        </div> 
                          </div>
                        </div>
                      </div>  
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="Reservation">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
                               

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
       <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
      <script type="text/javascript">
        $('.row .btns').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $collapse = $this.closest('.collapse-group').find('.collapse');
    $collapse.collapse('toggle');
});

      </script>