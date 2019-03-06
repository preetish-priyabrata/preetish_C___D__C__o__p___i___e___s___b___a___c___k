<?php
 //print_r($_REQUEST);
 //exit;
include '../config.php';
session_start();
if($_SESSION['admin_tech']){

	if($_POST['Class_name'] && ($_POST['check_single']=='single')){
		$Class_name =strtoupper(trim($_REQUEST['Class_name']));
		$query="SELECT * FROM `master_class` where `class_name`='$Class_name' ";
		$result=mysqli_query($conn,$query);
	  	$num_rows=mysqli_num_rows($result);
	  	if($num_rows==0){
	  		echo "1";
	  		exit;
	  	}else{
	  		echo "2";
	  		exit;
	  	}
	}else if($_POST['Class_names'] && ($_POST['check_single']=='Arr')){
	  	$Class_names =$_POST['Class_names'];
	  	$x=count($Class_names);
	  	$xy=1;
	  	for ($i=0; $i <$x ; $i++) { 
	  		
	  		$Class_name=strtoupper(trim($Class_names[$i]));

	  			$query="SELECT * FROM `master_class` where `class_name`='$Class_name' ";
			$result=mysqli_query($conn,$query);
	  		$num_rows=mysqli_num_rows($result);
	  			if($num_rows!=0){
	  				$xy++;
	  				echo $Class_names[$i];
	  				exit;
	  			}
	  		}
	  		if($xy=="1"){
	  			echo "1";
	  			exit;
	  		}
	  	
	}else if($_POST['Class_name_section'] && $_POST['Class_name_section']!='' && ($_POST['check_single']=='single_section') && $_POST['section_name'] && $_POST['section_name']!='' ){
		$class_name=trim($_POST['Class_name_section']);
		$class_section=strtoupper(trim($_POST['section_name']));
		$check_single_section="SELECT * FROM `master_class_section` WHERE `class`='$class_name' AND `section`='$class_section'";
		$result=mysqli_query($conn,$check_single_section);
	  	$num_rows=mysqli_num_rows($result);
	  	if($num_rows==0){
	  		echo "1";
	  		exit;
	  	}else{
	  		echo "2";
	  		exit;
	  	}

	}else if($_POST['Class_names_section'] && ($_POST['check_single']=='Arr_section') && $_POST['class_wise_name']){
		//Array ( [Class_names_section] => Array ( [0] => A ) [check_single] => Arr_section [class_wise_name] => I
		$Class_names =$_POST['class_wise_name'];
		$class_section=$_POST['Class_names_section'];

	  	$x=count($class_section);
	  	$xy=1;
	  	for ($i=0; $i <$x ; $i++) { 
	  		
	  		$Class_name=strtoupper(trim($class_section[$i]));

	  			$query="SELECT * FROM `master_class_section` WHERE `class`='$Class_names' AND `section`='$Class_name' ";
			$result=mysqli_query($conn,$query);
	  		$num_rows=mysqli_num_rows($result);
	  			if($num_rows!=0){
	  				$xy++;
	  				echo $class_section[$i];
	  				exit;
	  			}
	  		}
	  		if($xy=="1"){
	  			echo "1";
	  			exit;
	  		}
	  	

	}else if($_POST['exam_category_names'] && $_REQUEST['exam_category_names']!='' && ($_POST['check_exams_category']=='exams_category_name')){
		//   [exam_category_names] => First Term   [check_exams_category] =>
		$exam_name=strtoupper(trim($_REQUEST['exam_category_names']));
		 $query_check_exams_category="SELECT * FROM `master_exam_category` WHERE `exam_name_cat`='$exam_name'";
		 $result=mysqli_query($conn,$exam_name);
	  	$num_rows=mysqli_num_rows($result);
	  	if($num_rows==0){
	  		echo "1";
	  		exit;
	  	}else{
	  		echo "2";
	  		exit;
	  	}

	}else{
	  	echo "0";
	  	exit;
	}


}else{
	header('Location:logout.php');
	exit;
}