<!DOCTYPE html>
<html>
<head>
	<?php include 'header.php'; ?>
	<title>
		Take Care
	</title>
</head>

<body class="body-bg">
	<form action="Registration_Controller.php" method="POST">
		<div class="container login-container">
			<div class="card p-2 login-card">
				<div class="card-head">
					<h3>Registration</h3>
				</div>
				<div class="card-body">
					<div class="form-group">
				    	<label for="full_name">Name</label>
				    	<input type="text" class="form-control" id="full_name" name='full_name' placeholder="Enter name" required>				    	
				    </div>
					<div class="form-group">
				    	<label for="user_email">Email address</label>
				    	<input type="email" class="form-control" id="user_email" name='user_email'  placeholder="Enter email" required>
				    	
				    </div>
				    <div class="form-group">
				    	<label for="user_password">Password</label>
				    	<input type="password" class="form-control" id="user_password" name='user_password' placeholder="Password" required>
				    </div>

				    <div class="row">
					    <div class="col-md-4 form-group">
					    	Register as:
						    <div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="user_type_doctor" name="user_type" value="doctor">
							  <label class="custom-control-label" for="user_type_doctor">Doctor</label>
							</div>

							<!-- Default checked -->
							<div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="user_type_user" name="user_type" value="user">
							  <label class="custom-control-label" for="user_type_user">User</label>
							</div>
					    </div>
					    <div class="col-md-8" id="license_div">
					    	<div class="form-group">
					    	<label for="license">License No.</label>
					    	<input type="text" class="form-control" id="license" name='license' placeholder="License">				    	
					    </div>
					    </div>
					</div>
					<div "form-group">
						Gender:
						    <div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="user_gender_male" name="user_gender" value="male">
							  <label class="custom-control-label" for="user_gender_male">Male</label>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="user_gender_female" name="user_gender" value="female">
							  <label class="custom-control-label" for="user_gender_female">Female</label>
							</div>	
							
					</div>
					<div class="form-group">
				    	<label for="user_bday">Birth Date :</label>
				    	<input type="date" class="form-control" id="user_bday" name='user_bday' required>				    	
				    </div>


				    <button type="submit" class="btn btn-primary">Register</button>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>

<script type="text/javascript">
	$(document).ready(
		function(){
			$("#license_div").hide();
			$("input[name=user_type]").change(function(){
				var user_type_val = $("input[name=user_type]:checked").val();
				if(user_type_val == 'doctor')
				{
					console.log(user_type_val);
					$("#license_div").show();
					$("#license").prop('required',true);
				}
				else
				{
					console.log(user_type_val);
					$("#license_div").hide();
					$("#license").prop('required',false);
				}
			})
		})
</script>