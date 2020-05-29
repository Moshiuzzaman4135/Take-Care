<?php 

	session_start();
	include "Database/db_connect.inc.php";
	$id= $_GET['id'];
	$user_id = $_SESSION['user_id'];
	$sqlDeletePost = "delete from forum where id=$id ;";
	echo $sqlDeleteContact;
	mysqli_query($conn, $sqlDeletePost);



?>