<?php 
include "Database/db_connect.inc.php";
$med_name=$med_price=$med_count=$morning = $day= $night="";
session_start();	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!isset($_SESSION['user_id']))
		{
			header("Location: logout.php");
		}
		$user_id = ($_SESSION['user_id']);
		$sqlLogOut = "select * from user_detail where user_id='$user_id';";   
    
    	$resultLogOut = mysqli_query($conn, $sqlLogOut);
    		while($row = mysqli_fetch_assoc($resultLogOut))
            {
                $id = $row['user_id'];
                $user_name = $row['full_name'];
                $user_email = $row['user_email'];
                $user_gender = $row['user_gender'];                

            }
		if(!empty($_POST['med_name']))
		{
			$med_name = mysqli_real_escape_string($conn,$_POST['med_name']);  
			$med_name = $_POST['med_name'];
		}
		if(!empty($_POST['med_count']))
		{
			$med_count = mysqli_real_escape_string($conn,$_POST['med_count']); 
			$med_count = $_POST['med_count'];
		}
		if(!empty($_POST['med_price']))
		{
			$med_price = mysqli_real_escape_string($conn,$_POST['med_price']); 
			$med_price = $_POST['med_price'];
		}
		if(isset($_POST['morning']))
		{
			$morning=1;
		}
		else
		{
			$morning=0;

		}

		if(isset($_POST['day']))
		{
			$day=1;
		}
		else
		{
			$day=0;

		}
		if(isset($_POST['night']))
		{
			$night=1;
		}
		else
		{
			$night=0;

		}
		$insertNewMedSql = "INSERT INTO `medicine_inventory`( `user_id`, `med_name`, `count`, `price`, `morning`, `day`, `night`) VALUES ($user_id,'$med_name',$med_count,$med_price,$morning,$day,$night) ;";
		mysqli_query($conn, $insertNewMedSql);
		header("Location: medicine.php");


		
	}
	


 ?>
 <html>
<head>
	<title></title>
	<?php include 'header.php'; ?>
	<?php include "Database/db_connect.inc.php"; ?>
</head>
<body>
<form action="addMedicine.php" method="POST">
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
    			Add Medicine
    		</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-md-6">
    					<div class="form-group">
		    				<label>Medicine Name</label>
		    				<input type="text" name="med_name" id="med_name" placeholder="Medicine Name" class="form-control" required>
		    			</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group">
		    				<label>Inventory</label>
		    				<input type="number" name="med_count" id="med_count" placeholder="Medicine Count" class="form-control" required>
		    			</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group">
		    				<label>Price</label>
		    				<input type="text" name="med_price" id="med_price" placeholder="Medicine Price" class="form-control" required>
		    			</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group">
		    				<label>Timing</label>
		    				
		    				<div class="form-check form-check-inline">

							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="morning">
							<label class="form-check-label">Morning </label>
							</div>

							<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="day">
							<label class="form-check-label">Day</label>
							</div>

							<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="night">
							<label class="form-check-label">Night</label>
							</div>
							<div class="mt-3 mb-3">
							
                        	<button type="submit" class="btn btn-primary float-right mr-3" onClick="redirectTo()" >Add New</button>
                        	<?php  echo $med_name.$med_price.$med_count.$morning.$day.$night; ?>
                        	
                    </div>
		    			</div>
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
 echo $med_name.$med_price.$med_count;

?>
