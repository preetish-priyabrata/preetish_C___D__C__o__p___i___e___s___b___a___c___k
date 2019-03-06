<?php
 if($_POST['toid'] && $_POST['fromid']){
 	$toid=trim($_POST['toid']);
 	$from=trim($_POST['fromid']);
 	 preg_match("/([a-zA-Z]+)(\\d+)/",$toid, $matches);
		$to=$matches[2] ;
		preg_match("/([a-zA-Z]+)(\\d+)/",$x, $matches1);
		$from=$matches1[2];
		echo $total=$to-$from;
		exit;
 }


?>