<?php
if (!isset($_GET['job'])) {
    include './class/Encription.php';
    $enc = new Encription();
}
$message = $msg->findCurrentOpenings();
if ($message) {
    while ($row = mysqli_fetch_array($message)) {
        ?>
        <div style="padding: 2px;border: 1px solid #ffffff">
            <p style="font-weight: 800"><?php echo $row['posting_date']; ?></p>
            <p><span><?php echo $row['job_description']; ?></span></p>
            <p><span><b style="font-weight: 800;">Job Type&nbsp :</b>&nbsp; <?php echo $row['job_title']; ?></span></p>
            <p><span><b style="font-weight: 800;">Eligibility :</b>&nbsp; <?php echo $row['eligibility']; ?></span></p>
            <p><span><b style="font-weight: 800;text-decoration: underline;"><a href="career.php?job=<?php echo $enc->encryptIt($row['opening_id']); ?>">Click Here</a></b>&nbsp;To apply for the job.</span></p>
        </div>

        <?php
    }
}
?>