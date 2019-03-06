<?php
error_reporting(0);
session_start();
include "../config.php";
$exam_name=$_REQUEST["exam"];
$qry="SELECT * FROM `exam_master_data` WHERE `examname`='$exam_name'";
$sql=mysqli_query($conn, $qry);
$res=mysqli_fetch_array($sql);
?>

<tr>
                  <td>Date Of Exam</td>
                  <td><input type="text" id="doe1" readonly="readonly" name="doe1" value="<?php echo $res["exam_date"]; ?>" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Exam Centre</td>
                  <td><input type="text" id="cen1" name="cen1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Address</td>
                  <td><textarea id="adrs1" name="adrs1" class="form-control"></textarea></td>
                  </tr>
                  <tr>
                  <td>Contact Person</td>
                  <td><input type="text" id="cp1" name="cp1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Contact No</td>
                  <td><input type="text" id="cont1" name="cont1" class="form-control"/></td>
                   </tr>
                  <tr>
                  <td>Email id</td>
                  <td><input type="text" id="eid1" name="eid1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>Sitting Capacity</td>
                  <td><input type="text" id="sc1" name="sc1" class="form-control"/></td>
                  </tr>
                  <tr>
                  <td>No Of Rooms</td>
                  <td><input type="text" id="nor1" name="nor1" class="form-control"/></td>
                  </tr>
    