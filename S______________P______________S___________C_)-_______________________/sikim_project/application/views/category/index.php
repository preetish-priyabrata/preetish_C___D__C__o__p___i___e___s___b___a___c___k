  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                    Add Category
            <small>Content Page</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Add Category</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Category</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>

              </div>
            </div>
           
            <div class="box-body">
               <form role="form" class="form-horizontal"  action="<?=base_url()?>Add-category" method="post" enctype="multipart/form-data">
                           
                       
                      <div class="form-group ">                       
                         <label class="col-sm-2 control-label" for="room">Category</label>                   
                        <div class="col-md-6">
                       
                        <input type="text" name="category[]" id="category" class="form-control" placeholder="Category Name" required="">
                      </div>
                      <div class="col-md-2">
                       
                          <button class="add_field_button btn btn-success" value="+">+</button>
                        </div>                        
                      </div>
                      <div class="form-detail"></div>
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
      <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">      
  $(function () {
    $(":file").change(function () {
     if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
      }
    });
  });
  function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result) .width(150).height(200);
  };
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
    <script> 
 $(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".form-detail"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label class="col-sm-2 control-label" for="room">Category</label><div class="col-md-6"><input type="text" name="category[]" id="category" class="form-control" placeholder="Category Name" required></div><a href="#" class="remove_field fa fa-close col-md-1 col-xs-12" style="color:red"></a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>


