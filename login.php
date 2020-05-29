<?php
session_start();
include "Database/db_connect.inc.php";

//session_start();
$user_email = $user_password = $message = $user_id=$user_type="";

/* mysqli_real_escape_string() helps prevent sql injection */
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(!empty($_POST['user_email'])){
		$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
		$user_email= $_POST['user_email'];

	}
	if(!empty($_POST['user_password'])){
		$user_password = mysqli_real_escape_string($conn, $_POST['user_email']);
		$user_password= $_POST['user_password'];
	}
	if($user_email=='admin@admin.com' && $user_password=='admin')
			{
				header("Location: admin.php");
			}

	$sqlUserCheck = "SELECT user_email, user_password,user_id,user_type FROM users WHERE user_email = '$user_email';";
	//echo $sqlUserCheck; 
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "User does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['user_password'];
			$user_id = $row['user_id'] ;
			$user_type = $row['user_type'] ;
			//echo $user_id;
			//echo $user_password."======".$uPassInDB;
			if(password_verify($_POST['user_password'], $uPassInDB) && $user_type=='user')
			{
				//$_SESSION['user_name'] = $user_name;
				$message = "Success";
				$_SESSION['user_id'] = $user_id;
				//echo $_SESSION["$user_id"];
				header("Location: home.php");
			}
			if(password_verify($_POST['user_password'], $uPassInDB) && $user_type=='doctor')
			{
				//$_SESSION['user_name'] = $user_name;
				$message = "Success";
				$_SESSION['user_id'] = $user_id;
				//echo $_SESSION["$user_id"];
				header("Location: doctor.php");
			}
			 
			else
			{
				$message = "Wrong Password!";
			}
		}

	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'header.php'; ?>
	<title>
		Take Care
	</title>
</head>

<body class="body-bg">
	<form action="login.php" method="post">
		<div class="container login-container">
			<div class="card p-2 login-card">
				<div class="card-head">
					<h3>Login</h3>
				</div>
				<div class="card-body">
					<div class="form-group">
				    	<label for="exampleInputEmail1">Email address</label>
				    	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
				    	<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				    </div>
				    <div class="form-group">
				    	<label for="exampleInputPassword1">Password</label>
				    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user_password">
				    </div>
				    <span style="color:red"><?php echo $message; ?></span><br>
				    <button type="submit" class="btn btn-primary">Login</button>				    
					<span><b>Or<a href="registration.php"> Register here</a></b></span>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>