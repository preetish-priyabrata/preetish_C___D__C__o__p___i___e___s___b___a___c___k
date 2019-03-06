<?php
include_once './protected.php';
include_once '../includes/db.php';
ob_start();
$title = "Current Openings";
?>
<?php
//Close Active otice
if (isset($_GET['notice'])) {
    $notice = $_GET['notice'];
    echo $query = "UPDATE `currentopenings` SET status = 'Archived' WHERE opening_id = '$notice'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("location:currentOpenings.php");
    }
}
?>
<?php
//Add New Openings
if (isset($_POST['addNewOpening'])) {
    $jobTitle = $_POST['jobTitle'];
    $desc = $_POST['desc'];
    $eligibility = $_POST['eligibility'];
    $postingDate = $_POST['postingDate'];
    $closingDate = $_POST['closingDate'];
    $openingType = $_POST['openingType'];

    $query = "INSERT INTO `currentopenings`(`opening_id`, `job_title`, `job_description`, `eligibility`, `posting_date`, `closing_date`, `opening_type`) VALUES "
            . "(NULL,'$jobTitle','$desc','$eligibility','$postingDate','$closingDate','$openingType')";
    $res = mysqli_query($con, $query);
    if ($res) {
        ?>
        <div class="alert alert-success text-success" role="alert" style="margin-top: 10px;">Job posted successfully.</div>                
        <?php
    }
}
?>
<div class="col-lg-12" id="serach-panel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bars"></i>Openings Details</h3>
        </div> 
        <div class="panel-body" id="tbl-search-result"> 
            <form method="post">
                <table class="table" style="width: 80%" align="center">
                    <tr>
                        <th>Job Title</th>
                        <td><input type="text" name="jobTitle" id="jobTitle" class="form-control"/></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <textarea name="desc" id="desc" style="height: 50px;" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Eligibility</th>
                        <td>
                            <textarea name="eligibility" id="eligibility" style="height: 50px;" class="form-control"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Posting Date</th>
                        <td><input type="text" name="postingDate" id="postingDate" class="form-control date-picker" value="<?php echo date('Y-m-d'); ?>" readonly="readonly"></td>
                    </tr>
                    <tr>
                        <th>Closing Date</th>
                        <td><input type="text" name="closingDate" id="closingDate" class="form-control date-picker" placeholder="YYYY-MM-DD"></td>
                    </tr>
                    <tr>
                        <th>Opening Type</th>
                        <td>
                            <select name="openingType" id="openingType" class="form-control">
                                <option>External</option>
                                <option>In-house</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="addNewOpening" value="Add Job" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>       
</div>  
<div class="col-lg-12" id="serach-panel">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bars"></i>All Openings Details</h3>
        </div> 
        <div class="panel-body" id="tbl-search-result"> 
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Job Title</th>
                    <th>Description</th>
                    <th>Eligibility</th>
                    <th>Job Type</th>
                    <th>&nbsp;</th>
                </tr>
                <?php
                $queryOpenings = "SELECT * FROM `currentopenings` WHERE status = 'Active' ORDER BY opening_id DESC";
                $res = mysqli_query($con, $queryOpenings);
                $rowsOpenings = mysqli_num_rows($res);
                if ($rowsOpenings) {
                    while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <tr>
                            <td><?php echo $row['job_title']; ?></td>
                            <td><?php echo $row['job_description']; ?></td>
                            <td><?php echo $row['eligibility']; ?></td>
                            <td><?php echo $row['opening_type']; ?></td>
                            <td><a href="currentOpenings.php?notice=<?php echo $row['opening_id']; ?>">Close</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
$pageContent = ob_get_contents();
ob_get_clean();
include 'forms_template.php';
?>