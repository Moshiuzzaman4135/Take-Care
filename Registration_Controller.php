<?php 
include "Database/db_connect.inc.php";

$full_name = $user_name = $user_password = $user_email = $user_type = $user_gender = $user_birthdate = $license_no= $userEmailInDatabase =$err=$row =$inserSqlUserDetails="";
$userPassToDB =$newID="";


//echo $_POST["full_name"]."  ";
//echo $_POST["user_email"]."  ";
//echo $_POST["user_password"]."  ";
//echo $_POST["user_type"]."  ";
//echo $_POST["user_gender"]."  ";
//echo $_POST["user_bday"]."  ";
//echo $_POST["license"]."  ";


		if(!empty($_POST['full_name']))
		{
			$full_name = mysqli_real_escape_string($conn,$_POST['full_name']);    
			$full_name = $_POST['full_name'];
		}		
		if(!empty($_POST['user_password']))
		{
			$user_password = mysqli_real_escape_string($conn,$_POST['user_password']);
			$user_password = $_POST['user_password'];
			$userPassToDB = password_hash($user_password, PASSWORD_DEFAULT);
		}
		if(!empty($_POST['user_email']))
		{
			$user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
			$user_email = $_POST['user_email'];
		}
		if(isset($_POST['user_type']))
		{
			$user_type = mysqli_real_escape_string($conn,$_POST['user_type']);
			$user_type = $_POST['user_type'];

		}
		if(isset($_POST['user_gender']))
		{
			$user_gender = mysqli_real_escape_string($conn,$_POST['user_gender']);
			$user_gender = $_POST['user_gender'];
		}
		if(isset($_POST['user_bday']))
		{
			$user_birthdate = mysqli_real_escape_string($conn,$_POST['user_bday']);
			$user_birthdate = $_POST['user_bday'];
		}
		if(isset($_POST['license']))
		{
			$license_no = mysqli_real_escape_string($conn,$_POST['license']);
			$license_no = $_POST['license'];
		}
		if($license_no=='')
		{
			$license_no= "NULL";
		}		
		
		$sqlUserDtailCheck = "select * from user_detail where user_email = '$user_email';";
		//echo "<br> Qury".$sqlUserDtailCheck;
		//$inserSqlUserDetails = "INSERT INTO user_detail( full_name, user_email, user_password, user_gender, user_bday, user_type, license_no) VALUES ('$full_name','$user_email','$userPassToDB','$user_gender','$user_birthdate','$user_type',$license_no) ;";
		
		//$insertUsersSql = "INSERT INTO `users`( `user_id`, `user_email`, `user_password`, `user_type`) VALUES ($newID,$user_email,$user_password,$user_type);";
		$resultUserDetail = mysqli_query($conn, $sqlUserDtailCheck);
		$count = mysqli_num_rows($resultUserDetail);
		if (mysqli_num_rows($resultUserDetail) != 0)
		{
			header("Location: registration.php");
		
		}
		else 
		{
			$inserSqlUserDetails = "INSERT INTO user_detail( full_name, user_email, user_password, user_gender, user_bday, user_type, license_no) VALUES ('$full_name','$user_email','$userPassToDB','$user_gender','$user_birthdate','$user_type',$license_no) ;";
			mysqli_query($conn, $inserSqlUserDetails);
			$getIDSql = "select user_id from user_detail where user_email='$user_email';";
			$getIDresult = mysqli_query($conn, $getIDSql);
			while($row = mysqli_fetch_assoc($getIDresult))
			{
				$newID = $row['user_id'];
			}

			$insertUsersSql = "INSERT INTO `users`( `user_id`, `user_email`, `user_password`, `user_type`) VALUES ($newID,'$user_email','$userPassToDB','$user_type');";

			//echo $insertUsersSql;
			mysqli_query($conn, $insertUsersSql);

			if($user_type=='doctor')
			{
			$insertDoctor = "INSERT INTO `validation`(`user_id`, `user_email`, `user_name`, `license_no`, `validation`) VALUES ('$newID','$user_email','$full_name','$license_no','0')";
			echo $insertDoctor;
			mysqli_query($conn, $insertDoctor);
			}
			header("Location: login.php");

			
		
		}

		



		
		





 ?>