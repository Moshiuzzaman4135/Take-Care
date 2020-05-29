<?php 

	session_start();
	include "Database/db_connect.inc.php";
	$id= $_GET['id'];
	$user_id = $_SESSION['user_id'];
	$sqlDeleteContact = "delete from contact where id=$id and user_id=$user_id;";
	echo $sqlDeleteContact;
	mysqli_query($conn, $sqlDeleteContact);



?>