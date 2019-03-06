<?php
error_reporting(0);
session_start();
include 'config.php';

if(isset($_REQUEST['submit']))
{


$dist = $_REQUEST['dist'];
$block = $_REQUEST['block'];
$tribe = $_REQUEST['tribe'];
$dialect = $_REQUEST['dialect'];
$join_class = mysqli_real_escape_string($conn,$_REQUEST['join_class']);
$vocational = $_REQUEST['vocational'];
$gender = $_REQUEST['gender'];
$dob = $_REQUEST['dob'];
$num_std = $_REQUEST['num_std'];
$age_from = $_REQUEST['age_from'];
$age_to = $_REQUEST['age_to'];
$age_from1 = $_REQUEST['age_from'];
$age_to1 = $_REQUEST['age_to'];
$name = $_REQUEST['name'];

$qry = "";
if($dist!="" && $dist!='all')
{

    $qry .= " AND b.district_name='$dist'"; 
}
if($block!="")
{
    $qry .= " AND b.block_name='$block'";   
}
if($tribe!="")
{
    $qry .= " AND b.tribe_type='$tribe'";   
}
if($dialect!="")
{
    $qry .= " AND b.dialect_speek='$dialect'";  
}
if($join_class!="")
{
    $qry .= " AND a.join_class='".$join_class."'"   ;
}
if($vocational!="")
{
    $qry .= " AND c.vocational='$vocational'"   ;
}
if($gender!="")
{
    $qry .= " AND a.gender='$gender'";
}
if($dob!="")
{
    $qry .= " AND a.dob='$dob'";    
}

if($age_from!="")
{
    function reverse_birthday( $years ){
    $date = date('Y-m-d', strtotime($years . ' years ago'));
    $rel_date = date_create($date);
    return date_format($rel_date,"Y");
    }
    $age_from = reverse_birthday($age_from);
    $age_to = reverse_birthday($age_to);
    
    $qry .= " AND date_format(str_to_date(a.dob,'%d/%M/%Y'),'%Y') BETWEEN '$age_to' AND '$age_from'";
    
}
if($name!="")
{
    $qry .= " AND a.std_name LIKE '%$name%'";
}

?>
<?php 
}
?>



<!--all results-->
<div id="wrapper" style="width:1200px; padding-top:10px;">
   <!-- <fieldset>
        <legend>Student Information</legend>
        <table id="example" class="display" width="100%" border="1" cellpadding="2"  cellspacing="2">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Student Name </th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Sl.No</th>
                <th>Student Name </th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            <?php /*?><?php
        
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            
            if ($num_row != 0) {
                $sl = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $sl++
                    ?>
                    <tr>
                        <td align="center"><?php echo $sl; ?></td>
                        <td align="center"><?php echo $data['std_name']; ?></td>
                        <td align="center"><?php echo $data['father_name']; ?></td>
                        <td align="center"><?php echo $data['mother_name']; ?></td>
                        <td align="center"><a href="student_info2.php?s_id=<?php echo $data['std_id']; ?>" target="_blank">View</a></td>
                    </tr>
        <?php
    }
} else {
    ?>
                <tr><td colspan="5" align="center">-No Record Found-</td></tr>
                <?php
            }

            ?><?php */?>
            </tbody>
        </table>
    </fieldset>-->
    
</div>

<!--activities search-->
<div id="wrapper">
<div id="info" style="width:1200px; padding-top:10px;">
<fieldset>
        <legend>Student Information</legend>
        <strong>Search Result For : </strong> 
        <?php
            if($dist!="" && $dist!='all'){
                echo "District Name= ".$dist. " , "; 
        }
        if($block!=""){
                echo "Block Name = ".$block." , ";   
        }
            if($tribe!="")
            {
                echo "Tribe Name = ".$tribe." , ";   
            }
            if($dialect!="")
            {
                echo "Dialect Type = ".$dialect." , ";  
            }
            if($join_class!="")
            {
                echo "Join Class = ".$join_class. " , "   ;
            }
            if($vocational!="")
            {
                echo "Vocational Type = ".$vocational." , "   ;
            }
            if($gender!="")
            {
              echo "Gender = ".$gender." , ";
            }
            if($dob!="")
            {
               echo "Date Of Birth = ".$dob." , ";    
            }

            if($age_from1!="")
            {
                // function reverse_birthday( $years ){
                // $date = date('Y-m-d', strtotime($years . ' years ago'));
                // $rel_date = date_create($date);
                // return date_format($rel_date,"Y");
                // }
                //$age_from = reverse_birthday($age_from);
                //$age_to = reverse_birthday($age_to);
                
                echo  "Age From ".$age_from1." To ".$age_to1." , ";
                
            }
            if($name!="")
            {
                    echo "Student Name = ".$name ."";
            }
            echo "<br>";
        ?>
        <br>
        <br>
        <span id="act" style="display:none"><table class="table table-bordered">
                                                                <tbody><tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Debate" class="form-control">Debate
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Essay" class="form-control">Essay
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="GK" class="form-control">GK
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="NSS" class="form-control">NSS
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Scout&amp;Guide" class="form-control">Scout &amp; Guide
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Cub Bul-Bul" class="form-control">Cub Bul-Bul
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Rovers Rangers" class="form-control">Rovers Rangers
                                                                        </label>
                                                                    </td>

                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="NCC" class="form-control">NCC
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Red Cross" class="form-control">Red Cross
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="KYS" class="form-control">KYS
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" value="Peer Educator" class="form-control">Peer Educator
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="activities[]" id="activity_other" value="others" class="form-control" onchange="showTextarea(this.id);">Others
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table></span>
                                                            <button id="close" style="display:none" onclick="close();">close</button>
<div id="student_info">
    
        <table class="display" width="100%" border="1" cellpadding="2"  cellspacing="2">
        <thead>
        <tr>
                <th>Class</th>
                <th>Number of Students </th>
                <th>No OF Male</th>
                <th>No OF Female</th>
            </tr>
              </thead>
        <tbody>
        <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
             $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='I'".$qry;
           
            $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='I' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='I' AND a.gender='Female'".$qry;

            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
        ?>
            <tr>
                <th>Class 1</th>
               <th><button class="records" name="class_i" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_i" id="class_male_i" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_i" id="class_female_i" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='II'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='II' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='II' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
           
        ?>
            <tr>
                <th>Class 2</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
            $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='III'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='III' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='III' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
            
        ?>
            <tr>
                <th>Class 3</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
             $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='IV'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='IV' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='IV' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
            
        ?>
            <tr>
                <th>Class 4</th>
               <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
             $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='V'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='V' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='V' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
           
            
           
        ?>
            <tr>
                <th>Class 5</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
           $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VI'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VI' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VI' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
           
           
        ?>
            <tr>
                <th>Class 6</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            

            $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VII'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VII' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VII' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
           
            
        ?>
            <tr>
                <th>Class 7</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>      
        <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
             $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VIII'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VIII' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='VIII' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
           
            
        ?>
            <tr>
                <th>Class 8</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
            $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='IX'".$qry;
            
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='IX' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='IX' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
           
        ?>
            <tr>
                <th>Class 9</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           <?php
            if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
            
             $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='X'".$qry;
             $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='X' AND a.gender='Male'".$qry;
            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='X' AND a.gender='Female'".$qry;
            $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
          
        ?>
            <tr>
                <th>Class-10</th>
               <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
            </tr>
             <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Science'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Science' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Science' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>+2 Science</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Commerce'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Commerce' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Commerce' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>+2 Commerce</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Arts'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Arts' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='2 Arts' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>+2 Arts</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Science'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Science' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Science' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>+3 Science</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Commerce'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Commerce' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Commerce' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>+3 Commerce</th>
               <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Arts'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Arts' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='3 Arts' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>+3 Arts</th>
               <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='pg'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='pg' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='pg' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>Post Graduation</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

             <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='PhD Scholar'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='PhD Scholar' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='PhD Scholar' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>PhD Scholar</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='ITI'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='ITI' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='ITI' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>ITI</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='DIPLOMA'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='DIPLOMA' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='DIPLOMA' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>DIPLOMA</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='B-TECH'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='B-TECH' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='B-TECH' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>B-TECH</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='M-TECH'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='M-TECH' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='M-TECH' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>M-TECH</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='NURSHING'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='NURSHING' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='NURSHING' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>NURSHING</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MBBS'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MBBS' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MBBS' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>MBBS</th>
               <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MBA'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MBA' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MBA' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>MBA</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BBA'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BBA' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BBA' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>BBA</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BCA'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BCA' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BCA' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>BCA</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MCA'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MCA' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='MCA' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>MCA</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BIO-TECH'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BIO-TECH' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='BIO-TECH' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>BIO-TECH</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='LAW'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='LAW' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='LAW' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>LAW</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

            <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='FILM And MEDIA'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='FILM And MEDIA' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='FILM And MEDIA' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>FILM & MEDIA</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>

           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='FASHION TECHONLOGY'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='FASHION TECHONLOGY' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='FASHION TECHONLOGY' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>FASHION TECHONLOGY</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           <?php
                if($num_std!=""){
                     $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
                }
                    $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='DENTAL SCIENCE(BDS)'".$qry;
                    $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='DENTAL SCIENCE(BDS)' AND a.gender='Male'".$qry;
                    $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class`='DENTAL SCIENCE(BDS)' AND a.gender='Female'".$qry;
                    $sql = mysqli_query($conn, $str);
                    $num_row = mysqli_num_rows($sql);
                    $sql1 = mysqli_query($conn, $str1);
                    $num_row1 = mysqli_num_rows($sql1);
                     $sql2 = mysqli_query($conn, $str2);
                    $num_row2 = mysqli_num_rows($sql2);
                ?>
            <tr>
                <th>DENTAL SCIENCE(BDS)</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           <?php
           if($num_std!="")
            {
                $qry .= " ORDER BY a.join_class DESC LIMIT 0,$num_std";
            }
          
            $str = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class` IN ('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X','2 Science','2 Commerce','2 Arts','3 Science','3 Commerce','3 Arts','pg','PhD Scholar','ITI','DIPLOMA','B-TECH','M-TECH','NURSHING','MBBS','MBA','BBA','BCA','MCA','BIO-TECH','LAW','FILM And MEDIA','FASHION TECHONLOGY','DENTAL SCIENCE(BDS)')".$qry;

            $str1 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class` IN ('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X','2 Science','2 Commerce','2 Arts','3 Science','3 Commerce','3 Arts','pg','PhD Scholar','ITI','DIPLOMA','B-TECH','M-TECH','NURSHING','MBBS','MBA','BBA','BCA','MCA','BIO-TECH','LAW','FILM And MEDIA','FASHION TECHONLOGY','DENTAL SCIENCE(BDS)') AND a.gender='Male'".$qry;

            $str2 = "SELECT * FROM std_general_information a, std_general_geo b, std_education_activity c WHERE a.std_id=b.std_id AND a.std_id=c.std_id AND `class` IN ('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X','2 Science','2 Commerce','2 Arts','3 Science','3 Commerce','3 Arts','pg','PhD Scholar','ITI','DIPLOMA','B-TECH','M-TECH','NURSHING','MBBS','MBA','BBA','BCA','MCA','BIO-TECH','LAW','FILM And MEDIA','FASHION TECHONLOGY','DENTAL SCIENCE(BDS)') AND a.gender='Female'".$qry;
           $sql = mysqli_query($conn, $str);
            $num_row = mysqli_num_rows($sql);
            $sql1 = mysqli_query($conn, $str1);
            $num_row1 = mysqli_num_rows($sql1);
             $sql2 = mysqli_query($conn, $str2);
            $num_row2 = mysqli_num_rows($sql2);
          
        ?>
           <tr>
                <th>Total</th>
                <th><button class="records" name="class_" id="class_" value="<?php echo $str; ?>" onclick="showrecords(this.value);" ><?php echo $num_row." "."Records"; ?></button></th>
                <th><button class="records" name="class_male_" id="class_male_" value="<?php echo $str1; ?>" onclick="showrecords(this.value);" ><?=$num_row1?></button></th>
                <th><button class="records" name="class_female_" id="class_female_" value="<?php echo $str2; ?>" onclick="showrecords(this.value);" ><?=$num_row2?></button></th>
           </tr>
           </tbody>
            
        </table>
        </div>
    </fieldset>
   </div> 
</div>

