<?php
session_start();
$_SESSION['contact_id']=$_GET['id'];
echo $_SESSION['contact_id'];
?>  