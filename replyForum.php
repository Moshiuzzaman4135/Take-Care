<?php 

	session_start();
	include "Database/db_connect.inc.php";
	$id= $_GET['id'];
	$comment = $_GET['comment'];
	//$user_id = $_SESSION['user_id'];
	$sqlUpdateForum = "UPDATE `forum` SET `comment`='$comment' WHERE id='$id' ";
	echo $sqlUpdateForum;
	mysqli_query($conn, $sqlUpdateForum);



?>