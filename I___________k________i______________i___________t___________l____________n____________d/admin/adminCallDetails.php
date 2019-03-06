<?php
include_once './protected.php';
include_once '../includes/db.php';
ob_start();
$title = "";
?>
<style type="text/css">
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
        cursor: default;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        cursor: default;
    }
    input.form-control.date-picker{
        width: 90%;
        display: inline;
        margin-right: 10px;
    }
</style>
<?php
if (isset($_GET['userId']) && !empty($_GET['userId'])) {
    $userId = $_GET['userId'];

    $user_sql = "SELECT * FROM `user` WHERE `userid` LIKE '$userId'";
    $user_res = mysqli_query($con, $user_sql);
    $user_row = mysqli_fetch_array($user_res);
    $name = $user_row['first_name'] . " " . $user_row['last_name'];

    $call_sql = "SELECT * FROM `callhistory` WHERE `userid` LIKE '$userId' ORDER BY last_calldt DESC";
    $call_res = mysqli_query($con, $call_sql);
    $call_row_no = mysqli_num_rows($call_res);
    ?>    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" style="margin: 10px 0 20px 0;">Call Details <small>of <?php echo $name; ?></small></h3>        
        </div>
    </div>
    <div class="row">

        <!-- Search Grid 4 Starts here -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bars"></i> Search</h3>
                </div> 
                <div class="panel-body">
                    <div id="search-msgDiv" role="alert">                                               
                    </div>                    
                    <div class="form-group">
                        <label for="txtLastDate">By Last Call Date</label>
                        <input type="text" id="txtLastDate" class="form-control date-picker" readonly>                       
                    </div>
                    <div class="form-group">
                        <label for="txtNextDate">By Next Call Date</label>
                        <input type="text" id="txtNextDate" class="form-control date-picker" readonly>
                    </div>
                    <button class="btn btn-success" onclick="searchCallDetails();">Search</button>
                    <button class="btn btn-danger" onclick="resetSearchForm();">Reset</button>                    
                </div>
            </div>       
        </div>

        <!-- Table Gird 8 starts here-->
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bars"></i> Call Details</h3>
                </div> 
                <div class="panel-body">
                    <div id="panel-body-msgDiv" role="alert">                                               
                    </div>
                    <input type="hidden" id="hidUserId" value="<?php echo $userId; ?>" />                    
                    <button type="button" name="btnAdd" id="btnAdd" class="btn btn-primary" data-toggle="modal" data-target="#myModal-add" onclick="document.getElementById('frmAddCall').style.display = 'block';">Add</button>
                    <form action="" method="post" id="frmTblAnnouncement" style="display: inline;">  
                        <?php if ($call_row_no > 0) { ?>                        
                            <button type="button" name="btnEdit" id="btnEdit" class="btn btn-success" onclick="viewEditCallDetailsForm();">Edit</button>
                            <button type="button" name="btnView" id="btnView" class="btn btn-info" onclick="viewCallDetailsForm();">View</button>                            
                            <div class="table-responsive">                                                    
                                <table class="table table-striped table-bordered table-hover" id="tblDataTable">
                                    <thead>
                                        <tr>
                                            <th></th>                                                                                                                                 
                                            <th>Last Call Date</th>
                                            <th>Description</th>
                                            <th>Remarks</th>             
                                            <th>Next Call Date</th>             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--tr*15>(td>input[type="radio" name="rdoDetailNo"])+(td*4)--> 
                                        <?php
                                        while ($call_row = mysqli_fetch_array($call_res)) {
                                            $call_id = $call_row['callhistoryid'];
                                            $call_desc = substr($call_row['call_desc'], 0, 20);
                                            $call_last_time_stamp = $call_row['last_calldt'];
                                            $call_last_date = date("d-m-Y  @ h:i A", $call_last_time_stamp);
                                            $call_next_time_stamp = $call_row['next_calldt'];
                                            $call_next_date = date("d-m-Y", $call_next_time_stamp);
                                            $call_remark = substr($call_row['remarks'], 0, 20);
                                            ?>
                                            <tr>
                                                <td><input type="radio" name="rdoDetailNo" value="<?php echo $call_id; ?>"/></td>
                                                <td><?php echo $call_last_date; ?></td>
                                                <td><?php echo $call_desc; ?></td>
                                                <td><?php echo $call_remark; ?></td>
                                                <td><?php echo $call_next_date; ?></td>
                                            </tr>
                                        <?php }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>      
                        <?php } else {
                            ?>
                            <div class="alert alert-danger text-danger" role="alert" style="margin-top: 10px;">No call details found</div>                
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>       
        </div>    

        <!-- Add Call Details Modal -->
        <div class="modal fade" id="myModal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-add" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="closeAddCallDetailsForm();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Call Details</h4>
                    </div>
                    <div class="modal-body" >
                        <div id="add-msgDiv" role="alert">                            
                        </div>                        
                        <form class="form-horizontal" id="frmAddCall" role="form" autocomplete="off" style="display:none;">
                            <div class="form-group">
                                <label for="textAddDesc" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="textAddDesc" class="form-control" rows="5" placeholder="Please enter description here..." autofocus style="height: 92px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textAddRemarks" class="col-sm-3 control-label">Remarks</label>
                                <div class="col-sm-9">
                                    <textarea id="textAddRemarks" class="form-control" rows="5" placeholder="Please enter remarks here..." style="height: 92px;"></textarea>
                                </div>
                            </div>            
                            <div class="form-group">
                                <label for="ddlContactNo" class="col-sm-3 control-label">Contacted No.</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="ddlContactNo">
                                        <option><?php echo $user_row['mobile']; ?></option>
                                        <?php
                                        if ($user_row['alt_no'] != "") {
                                            echo "<option>$user_row[alt_no]</option>";
                                        }
                                        if ($user_row['landline'] != "") {
                                            echo "<option>$user_row[landline]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>            
                            <div class="form-group">
                                <label for="ddlDuration" class="col-sm-3 control-label">Duration</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="ddlDuration">
                                        <option>1 Min</option>
                                        <option>2 Mins</option>
                                        <option>3 Mins</option>
                                        <option>4 Mins</option>
                                        <option>5 Mins</option>
                                        <option>5 - 10 Mins</option>
                                        <option>10 - 15 Mins</option>
                                        <option>15 - 20 Mins</option>
                                        <option>20 - 25 Mins</option>
                                        <option>25 - 30 Mins</option>
                                        <option>Above 30 Mins</option>
                                        
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="txtAddModalNextDate" class="col-sm-3 control-label">Next Call Date</label>
                                <div class="col-sm-9">
                                    <input type="text"  id="txtAddModalNextDate" class="form-control date-picker" readonly>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="button" class="btn btn-primary" onclick="addCallDetails();">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>

        <!--Modal-->
        <style>
            #modalBox{
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1060;
                opacity: 1;
            }
            #modalContent{
                position: relative;
                z-index: 1070;
                top: -500px;

            }
        </style>
        <div id="modalBox" style="display: none;"></div>           

        <div id="modalContent" style="display: none;">
            <form>
                <input type="text">
            </form>
        </div>

        <!-- Edit Call Details Modal -->
        <div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="closeCallDetailsEditFrom();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Edit Call Details</h4>
                    </div>
                    <div class="modal-body" id="call-edit-modal">

                    </div>                   
                </div>
            </div>
        </div>

        <!-- View Call Details Modal -->
        <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-view" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Call Details</h4>
                    </div>
                    <div class="modal-body" id="call-view-modal">                              

                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger text-danger" role="alert">You have no permission to access this page.</div>                
        </div>
    </div>
    <?php
}
?>
<?php
$pageContent = ob_get_contents();
ob_get_clean();
include 'forms_template.php';
?>
