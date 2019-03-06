<?php
function add_block() {
    $block_name=$_POST["block_name"];
    $district_name=$_POST["district_name"];
    $state_name=$_POST["state"];
    $state1=  strtolower($state_name);
    if($state_name=="")
    {
        echo "Please choose state name";
    }
    else if($block_name=="")
    {
        echo "Please input a block name";
    }
    else{
        include '../config.php';  
        $query_blockname="SELECT `block_name` FROM `tbl_state_district_block_".$state1."` where `block_name`='$block_name'";
        $result_blockname=mysqli_query($con,$query_blockname);
        $row=mysqli_num_rows($result_blockname);
        if($row>=1)
        {
            echo $block_name."&nbsp"."already exists";
        }
        else
        {
            $query_addblockname="insert into `tbl_state_district_block_".$state1."`(`state_name`,`district_name`,`block_name`) values ('$state1','$district_name','$block_name')";
            $result=mysqli_query($con,$query_addblockname);
            if($result)
            {
            echo "<br>".$block_name."&nbsp"."has been added successfully";
            }
        }
        }
    }
if(isset($_POST['add_block']))
{
    add_block();
}
?>

<?php
function add_primitive_tribe() {
$primitive_tribe=$_POST["primitive_tribe"];

if($primitive_tribe=="")
{
    echo "Please input Primitive Tribe";
}
else{
include '../config.php';  
$query_p_tribe="SELECT `primitive_tribe` FROM `primitive_tribe` where `primitive_tribe`='$primitive_tribe'";
$result_p_tribe=mysqli_query($con,$query_p_tribe);
$row=mysqli_num_rows($result_p_tribe);
if($row>=1)
{
    echo $primitive_tribe."&nbsp"."already exists";
}
else
{
    $query_p_tribe="insert into `primitive_tribe`(`primitive_tribe`) values ('$primitive_tribe')";
    $result=mysqli_query($con,$query_p_tribe);
    if($result)
    {
    echo "<br>".$primitive_tribe."&nbsp"."has been added successfully";
    }
}
}
}
if(isset($_POST['add_primitive_tribe']))
{
    add_primitive_tribe();
}
?>

<?php
function add_scheduled_tribe() {
$scheduled_tribe=$_POST["scheduled_tribe"];
if($scheduled_tribe=="")
{
    echo "Please input Scheduled Tribe";
}
else{
include '../config.php'; 
$query="SELECT `scheduled_tribe` FROM `scheduled_tribe` where `scheduled_tribe`='$scheduled_tribe'";
$result=mysqli_query($con,$query);
$row=mysqli_num_rows($result);
if($row>=1)
{
    echo $scheduled_tribe."&nbsp"."already exists";
}
else
{
    $query="insert into `scheduled_tribe`(`scheduled_tribe`) values ('$scheduled_tribe')";
    $result=mysqli_query($con,$query);
    if($result)
    {
    echo "<br>".$scheduled_tribe."&nbsp"."has been added successfully";
    }
}
}
}
if(isset($_POST['add_scheduled_tribe']))
{
    add_scheduled_tribe();
}
?>

<?php
function add_dialect() {
$dialect=$_POST["dialect"];

if($dialect=="")
{
    echo "Please input Dialect";
}
else{
include '../config.php'; 
$query_dialect="SELECT `dialect` FROM `dialect` where `dialect`='$dialect'";
$result_dialect=mysqli_query($con,$query_dialect);
$row=mysqli_num_rows($result_dialect);
if($row>=1)
{
    echo $dialect."&nbsp"."already exists";
}
else
{
    $query_dialect="insert into `dialect`(`dialect`) values ('$dialect')";
    $result=mysqli_query($con,$query_dialect);
    if($result)
    {
    echo "<br>".$dialect."&nbsp"."has been added successfully";
    }
}
}
}
if(isset($_POST['add_dialect']))
{
    add_dialect();
}
?>

<html>
    <body bgcolor="#F7F8E0">
    <button type="button" onclick="location.href = './add_info_form.php';" style="background-color:#D0F5A9;height:30px;width:80px;">BACK</button>
    </body>
</html>