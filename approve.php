<?php 

	
	include "Database/db_connect.inc.php";
	$id= $_GET['id'];
	//$user_id = $_SESSION['user_id'];
	$sqlApprove = "UPDATE `validation` SET  `validation`='1' WHERE user_id='$id';";
	echo $sqlApprove;
	mysqli_query($conn, $sqlApprove);



?>