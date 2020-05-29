<?php 
include "Database/db_connect.inc.php";
//include 'header.php';
	$id = $contact_name = $contact_email = $contact_phone = $blood_group = $error = "";
	session_start();	
	$id = $_SESSION['user_id'];
	$contactId = $_SESSION['contact_id'];
	$contactId = $_SESSION['contact_id'];
	//echo $id.$contactId;
	$sqlGetData = "select * from contact where user_id='$id' and id='$contactId';";
	$resultData = mysqli_query($conn, $sqlGetData);
    while($row = mysqli_fetch_assoc($resultData))
    {
      $contact_name = $row['contact_name'];
      $contact_email = $row['contact_email'];
      $contact_phone = $row['contact_phone'];
      $blood_group = $row['contact_bg'];      

    }
    $sqlLogOut = "select * from user_detail where user_id='$id';";   
    
    	$resultLogOut = mysqli_query($conn, $sqlLogOut);
    		while($row = mysqli_fetch_assoc($resultLogOut))
            {
                $id = $row['user_id'];
                $user_name = $row['full_name'];
                $user_email = $row['user_email'];
                $user_gender = $row['user_gender'];                

            }


	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!isset($_SESSION['user_id']))
		{
			header("Location: login.php");
		}		
		if(!empty($_POST['contact_name']))
		{
			$contact_name = mysqli_real_escape_string($conn,$_POST['contact_name']);    
			$contact_name = $_POST['contact_name'];
		}
		if(!empty($_POST['contact_email']))
		{
			$contact_email = mysqli_real_escape_string($conn,$_POST['contact_email']);    
			$contact_email = $_POST['contact_email'];
		}
		if(!empty($_POST['contact_phone']))
		{
			$contact_phone = mysqli_real_escape_string($conn,$_POST['contact_phone']);    
			$contact_phone = $_POST['contact_phone'];
		}
		if(isset($_POST['blood_group']))
		{
			$blood_group = $_POST['blood_group'];
		}
		else
		{
			$error = "Select Blood Group !";
		}
		if($error=="Select Blood Group !")
		{
			exit;
		}
		else
		{
		$sqlUpdateContact = "UPDATE `contact` SET `contact_name`='$contact_name',`contact_email`='$contact_email',`contact_phone`='$contact_phone',`contact_bg`='$blood_group' WHERE user_id='$id' and id='$contactId'";
		echo $sqlUpdateContact;
		mysqli_query($conn, $sqlUpdateContact);
		header("Location: emergencyContact.php");
		}

		
	}
	


 ?>
 <html>
<head>
	<title></title>
	<?php include 'header.php'; ?>
	<?php include "Database/db_connect.inc.php"; ?>
</head>
<body>
<form action="editContact.php" method="POST">
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Take Care</h3>
        </div>

        <ul class="list-unstyled components">
             <li>
                <a href="home.php">Dashboard</a>
            </li>
            <li>
                <a href="healthDetails.php">Health Details</a>
            </li>
            <li>
                <a href="medicine.php">Med Inventory</a>
            </li>
            <li>
                <a href="emergencyContact.php">Emergency Contact</a>
            </li>
            <li>
                <a href="document.php">Document</a>
            </li>
            <li>
                <a href="forum.php">Forum</a>
            </li>
            <li>
                <a href="map.php">Map</a>
            </li>
        </ul>
    </nav>

    <div class="container">
    	<div class="card">
    		<div class="card-head" >
    			<label class="ml-3 mt-3">Edit Contact</label>
    		</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-md-12">
    					<div class="form-group">
		    				<label>Name</label>
		    				<input type="text" name="contact_name" id="contact_name" placeholder="Name" class="form-control" value=<?php echo $contact_name;  ?> required >
		    			</div>
    				</div>
    				<div class="col-md-12">
    					<div class="form-group">
		    				<label>E-Mail</label>
		    				<input type="email" name="contact_email" id="contact_email" placeholder="E-Mail" class="form-control" value=<?php echo $contact_email;  ?> required>
		    			</div>
    				</div>
    				<div class="col-md-12">
    					<div class="form-group">
		    				<label>Phone Number</label>
		    				<input type="text" name="contact_phone" id="contact_phone" placeholder="Phone Number" class="form-control" value=<?php echo $contact_phone;  ?> required>
		    			</div>
    				</div>
    				<div class="col-md-12">
    					
	    				</div>
	    					<label class="mt-3 ml-3">Blood Group : </label>
	    					<select name="blood_group" class="foem-group ml-3 mt-3" value=<?php echo $contact_bg;  ?> required  >
							  <option value="A+" <?php if($blood_group=='A+'){echo "selected";} ?>>A+</option>
							  <option value="B+" <?php if($blood_group=='B+'){echo "selected";} ?>>B+</option>
							  <option value="O+" <?php if($blood_group=='O+'){echo "selected";} ?>>O+</option>
							  <option value="AB+" <?php if($blood_group=='AB+'){echo "selected";} ?>>AB+</option>
							  <option value="A-" <?php if($blood_group=='A-'){echo "selected";} ?>>A-</option>
							  <option value="B-+" <?php if($blood_group=='B-+'){echo "selected";} ?>>B-</option>
							  <option value="O-" <?php if($blood_group=='O-'){echo "selected";} ?>>O-</option>
							  <option value="AB-" <?php if($blood_group=='AB-'){echo "selected";} ?>>AB-</option>
							</select>	    
							<label><?php echo $error; ?></label>				
			    		</div>
			    		<button type="submit" class="btn btn-primary float-right mr-3" >Save</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

</div>
</form>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>
<?php
 //echo $med_name.$med_price.$med_count;

?>
