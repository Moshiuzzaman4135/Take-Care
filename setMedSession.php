<?php
session_start();
$_SESSION['med_id']=$_GET['id'];
echo $_SESSION['med_id'];
?>  