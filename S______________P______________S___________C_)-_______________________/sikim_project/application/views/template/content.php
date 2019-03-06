
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>DashBoard</a></li>
           <!--  <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li> -->
          </ol>
        </section>

          <?php if ($this->session->flashdata('msg1')) {?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"> <?php echo $this->session->flashdata('msg1'); ?> </i></h4>
                  
                  </div>
                    <?php }
?>
                     <?php if ($this->session->flashdata('msg')) {?>
 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>  <i class="icon fa fa-check"></i>  <?php echo $this->session->flashdata('msg'); ?></h4>
                  
                  </div>
                   <?php }
?>

        <!-- Main content -->
       
      </div><!-- /.content-wrapper -->