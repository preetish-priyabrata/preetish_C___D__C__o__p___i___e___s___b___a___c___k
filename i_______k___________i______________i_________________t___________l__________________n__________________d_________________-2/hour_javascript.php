<?php
ob_start();
session_start();
include'config.php';
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <link rel="stylesheet" type="text/css" href="asserts_new/dist/dist/bootstrap-clockpicker.min.css">
 <link rel="stylesheet" type="text/css" href="asserts_new/dist/assets/css/github.min.css">

     <section style="padding-top: 8pc; padding-bottom: 5pc;">
        <div class="container" >
            <div class="row">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="panel-group">
                            <div class="panel panel-primary">
                                <form name="" method="POST" action="candidate_registration_save.php" enctype="multipart/form-data">
                                     <div class="panel-heading text-center">Personal Information</div>

                                       <div class="panel-body" style="border: 1px solid red">
                                      
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" name="prefered_mng_time" for="gender">Morning</label>
                                                <div class="col-sm-8">
                                            <select name="mornFromHour" size="1">
                                                <option value="00">hh</option>
                                                <?php
                                                for ($i = 6; $i <= 12; $i++) {
                                                    if ($i < 10) {
                                                        echo "<option>" . '0' . $i . "</option>";
                                                    } else {
                                                        echo "<option>" . $i . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select> :
                                            <select name="mornFromMin" size="1">
                                                <option value="00">mm</option>
                                                <?php
                                                for ($i = 0; $i < 60; $i+=15) {
                                                    if ($i < 10) {
                                                        echo "<option>" . '0' . $i . "</option>";
                                                    } else {
                                                        echo "<option>" . $i . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select> &nbsp; - &nbsp;
                                            <select name="mornToHour" size="1">
                                                <option value="00">hh</option>
                                                <?php
                                                for ($i = 6; $i <= 12; $i++) {
                                                    if ($i < 10) {
                                                        echo "<option>" . '0' . $i . "</option>";
                                                    } else {
                                                        echo "<option>" . $i . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select> :
                                            <select name="mornToMin" size="1">
                                                <option value="00">mm</option>
                                                <?php
                                                for ($i = 0; $i < 60; $i+=15) {
                                                    if ($i < 10) {
                                                        echo "<option>" . '0' . $i . "</option>";
                                                    } else {
                                                        echo "<option>" . $i . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                         </div>
                                     </div>
                                           
                                     <div class="form-group">
                                        <label class="control-label col-sm-4" 
                                                name="prefered_eveng_time" for="gender">Evenging
                                        </label>
                                      <div class="col-sm-8">
                                        <select name="mornFromHour" size="1">
                                            <option value="00">hh</option>
                                                <?php
                                                for ($i = 6; $i <= 12; $i++) {
                                                    if ($i < 10) {
                                                        echo "<option>" . '0' . $i . "</option>";
                                                    } else {
                                                        echo "<option>" . $i . "</option>";
                                                    }
                                                }
                                                ?>
                                        </select> :       
                                        <select name="mornFromMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> &nbsp; - &nbsp;
                                        <select name="mornToHour" size="1">
                                            <option value="00">hh</option>
                                            <?php
                                            for ($i = 6; $i <= 12; $i++) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> :
                                        <select name="mornToMin" size="1">
                                            <option value="00">mm</option>
                                            <?php
                                            for ($i = 0; $i < 60; $i+=15) {
                                                if ($i < 10) {
                                                    echo "<option>" . '0' . $i . "</option>";
                                                } else {
                                                    echo "<option>" . $i . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                            </div>
                                         </div>
                                      </fieldset>
                                   </div>
                                </div>
                            </form>
                         <center><input type="submit" value="Submit" name="submit"></center>
                    </div>
                </div>
             </div>          
        </form> 
    </div>
 </div>
</section>

<?php
$content_display=ob_get_contents();
ob_get_clean();
include 'template_all.php';
?>

 <script type="text/javascript" src="asserts_new/dist/dist/bootstrap-clockpicker.min.js"></script>
 <script type="text/javascript">
    $('.clockpicker').clockpicker({
        autoclose: true,
        placement: 'top',
        align: 'left',
        donetext: 'Done'
    });

// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
    // Have to stop propagation here
    e.stopPropagation();
    input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
    $('input').prop('readOnly', true);
}
</script>
<script>
  $( function() {
    $( "#Birth" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
</script>