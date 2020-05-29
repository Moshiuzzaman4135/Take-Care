<?php 
	session_start();
	include "Database/db_connect.inc.php";
	$id= $_GET['id'];
	$user_id = $_SESSION['user_id'];
	$sqlDeleteMedicine = "delete from medicine_inventory where id=$id and user_id=$user_id;";
	echo $sqlDeleteMedicine;
	mysqli_query($conn, $sqlDeleteMedicine);

?>