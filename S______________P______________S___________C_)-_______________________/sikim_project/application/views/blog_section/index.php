
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin Add Blog
            <small>(Content/Urls)</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Add Blog (Content/Urls)</li>
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
                    <li class="active"><a href="#Personal" data-toggle="tab"><strong>Content </strong></a></li>
                  <!--   <li><a href="#Note" data-toggle="tab"><strong>Urls </strong></a></li> -->
                  <!--   <li><a href="#Reservation" data-toggle="tab"><strong>Reservation Date</strong></a></li> -->
                  </ul>
                  <div class="tab-content">
                    <div class="active tab-pane" id="Personal">
                       <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-12">
                              <form class="form-horizontal" id="myForm" method="POST" enctype="multipart/form-data" action="<?=base_url()?>Add-blog">
                              <input type="hidden" name="type_posts" value="content"></input>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="content_title" id="inputEmail3" placeholder="Title Of Blog" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Url Link:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" id="url" placeholder="Url Link Of Blog" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="comment" class="col-sm-2 control-label">Description:</label>
                                   <div class="col-sm-10">
                                  <textarea class="form-control" rows="5" id="comment" name="description" placeholder="Description Of Blog" required=""></textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">File</label>
                                  <div class="col-sm-10">
                                   <input id="input-1" type="file" class="file" name="fisles" required>
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
                                <form class="form-horizontal" id="myForm" method="POST" enctype="multipart/form-data" action="<?=base_url()?>Add-blog">
                                <input type="hidden" name="type_posts" value="url"></input>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url_title" id="inputEmail3" placeholder="Title Of Blog" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Url Link:</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" id="url" placeholder="Url Link Of Blog" required="">
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
                                <input type="submit" value="Submit" id="urls" class="btn btn-primary"></input>
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
//       
// $(document).ready(function () {
    
//     $('#urls').onclick(function() {
//         var $th = $('#url').val();
        
//         if (isValidUrl($th.val())!=1){
//             alert("You Enter In-valid Url");   
//         }
     
//     });
// });


// function isValidUrl(url){

//  var myVariable = url;
//     if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(myVariable)) {
    
//       return 1;
//     } else {
    
//       return -1;
//     }   
// }


      </script>