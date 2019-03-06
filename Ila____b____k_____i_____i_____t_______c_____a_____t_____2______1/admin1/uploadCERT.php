<?php
session_start();
ob_start();
include '../conf.php';
if (!isset($_SESSION['userId']) && empty($_SESSION['userId'])) {
    header("location: ./adminLogin.php");
}
?>
<?php
if (isset($_POST['addNewModules'])) {
    $program = $_POST['program'];
    $moduleName = $_POST['moduleName'];
    $moduleDescription = $_POST['moduleDescription'];
    $loop = count($moduleName);
    for ($i = 0; $i < $loop; $i++) {
        $queryModule = "INSERT INTO `tbl_program_module`(`module_id`, `program_id`, `module_name`, `module_description`) VALUES "
                . "(NULL,'$program','$moduleName[$i]','$moduleDescription[$i]')";
        $resModule = mysqli_query($con, $queryModule);
    }
}
?>
<?php
if (isset($_POST['addNewProgram'])) {
    $programName = $_POST['programName'];
    $programDate = $_POST['programDate'];
    $eligibility = $_POST['eligibility'];
    $moduleNumber = $_POST['moduleNumber'];

    //Add a new program/training
    $queryProgram = "INSERT INTO `tbl_program`(`program_id`, `program_name`, `commence_date`, `eligibility`, `no_of_module`, `upload_date`, `program_status`)"
            . " VALUES (NULL,'$programName','$programDate','$eligibility','$moduleNumber',now(),'Active')";
    $resProgram = mysqli_query($con, $queryProgram);
    $program_id = mysqli_insert_id($con);

    //Generating module list 
    ?>
    <form method="post">
        <div class="col-sm-9 col-md-9 affix-content box page-height">
            <div class=" col-lg-10 col-lg-offset-1 col-md-10 col-mg-offset-1 col-sm-8 col-sm-offset-2">
                <h3 class="page-header">Modules Associated With The Program</h3>
                <table class="table">
                    <tbody>
                    <input type="hidden" name="program" value="<?php echo $program_id; ?>">
                    <?php
                    for ($count = 0; $count < $moduleNumber; $count++) {
                        ?>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <h3>[Module <?php echo $count + 1; ?>]</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>Module Name <b>[Module <?php echo $count + 1; ?>]</b></td>
                            <td>
                                <input type="text" class="form-control" name="moduleName[]">
                            </td>
                        </tr>
                        <tr>
                            <td>Description of <b>[Module <?php echo $count + 1; ?>]</b></td>
                            <td>
                                <textarea name="moduleDescription[]" class="form-control"></textarea>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" name="addNewModules" value="Add Module"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
    </form>
    <?php
} else {
    ?>
    <form method="post" action="save_certificate_csv.php" enctype="multipart/form-data">
        <div class="col-sm-9 col-md-9 affix-content box page-height">
            <div class=" col-lg-10 col-lg-offset-1 col-md-10 col-mg-offset-1 col-sm-8 col-sm-offset-2">
                <h3 class="page-header">Upload Certificate Details</h3>
                <table class="table">
                    <tr>
                        <td>Upload Certificate</td>
                        <td>
                            <input type="file" name="upload_certificate"  class="form-control" >
                        </td>
                        <td><a href="tbl_certificate(1).csv" download>Download Sample</a></td>
                    </tr>
                   
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" name="upload" value="Upload"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    
    <?php
}
$pageContent = ob_get_contents();
ob_get_clean();
include '../template/header.php';
?>
<style>
        .table > tbody > tr > td{
            border-top: none;
        }
        .table > tbody > tr > th{
            border-top: none;
        }
    </style>