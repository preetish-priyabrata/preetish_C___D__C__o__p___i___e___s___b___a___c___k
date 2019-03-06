<?php
include_once './protected.php';
include '../class/DbConnection.php';
include '../class/Message.php';
include '../class/Admin.php';
$msg = new Message();
$adm = new Admin();

ob_start();
?>
<script src='../js/ajaxCall.js'></script>

<div class="row">
    <div class="col-lg-12">
        <h1>View <small>Candidate List</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><i class="fa fa-edit"></i> View Candidate List</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Date Range</label>
            <label>
                <input type="date" id='date1' class="form-control" style="width:182px">
            </label>
            to
            <label>
                <input type="date" id='date2' class="form-control" style="width:182px" >
            </label>
            <label>
                <button class="btn btn-primary btn-sm" href="#find" onclick="findStudentList('Stud')">Find</button>
            </label>
        </div>
        <div class="form-group">
            <select name="visit" onchange="viewRegStudList(this.value);" class="form-control">
                <option>--Company Name--Visit Date--</option>
                <?php
                $comp = $adm->fetchCompanyVisitList();
                while ($rowComp = mysqli_fetch_array($comp)) {
                    echo "<option value='$rowComp[visi_id]'>" . $rowComp['comp_name'] . '--' . $rowComp['visi_date'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>
                <button class="btn btn-primary btn-sm" href="#find" onclick="findStudentList('All')">Click to get the complete list</button>
            </label>
        </div>
    </div>
    <div class="col-lg-12">

        <?php
        $res = $adm->viewAllApprovedCandidates();
        $rows = mysqli_num_rows($res);
        if ($rows) {
            ?>
            <div class="col-lg-6">
                <h2>List of Students</h2>
                <div class="table-responsive">
                    <table id='studentList' class="table table-bordered table-hover table-striped tablesorter">
                        <tr>
                            <td>Student Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                            ?>
                            <tr >
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_contact']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
} else {
    $msg->errorMessage("No Approved Candidates Available");
}
?>
<?php
$pageContent = ob_get_contents();
ob_get_clean();
include 'forms_template.php';
?>
