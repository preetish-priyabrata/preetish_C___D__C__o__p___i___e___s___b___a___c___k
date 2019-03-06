<?php
include '../../config.php';
$tribename=$_REQUEST['tribename'];
if($tribename=="scheduled")
{
?>
<select name="sch_tribes" id="sch_tribes" class="form-control">
                                                    <option value="">--Select Scheduled Tribe--</option>
                                                    <?php 
                                                    
                                                    $query= "SELECT * FROM `scheduled_tribe`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){  
                                                    ?> <option value="<?php echo $row["scheduled_tribe"]; ?>"><?php echo $row["scheduled_tribe"]; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                                <?php
												}
												else if($tribename=="primitive")
												{
												?>
                                                <select name="prm_tribes" id="prm_tribes" class="form-control">
                                                    <option value="">--Select Primitive Tribe--</option>
                                                     <?php 
                                                    $query= "SELECT * FROM `primitive_tribe`";
                                                    $result=mysqli_query($con,$query);
                                                    while ($row = mysqli_fetch_array($result)){
                                                    ?> <option value="<?php echo $row["primitive_tribe"]; ?>"><?php echo $row["primitive_tribe"]; ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>
                                                <?php
												}
?>

