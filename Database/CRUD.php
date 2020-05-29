<?php 


$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "takecare";

const $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if(mysqli_connect_errno()){
  echo "Error: ".mysqli_connect_err();
}

function insertData($query){
	mysqli_query($conn,$query);
}

?>