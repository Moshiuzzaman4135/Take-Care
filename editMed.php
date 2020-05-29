<?php 
$med_count=$med_name=$med_price=$morning=$day=$night=$updateMedSql="";
include "Database/db_connect.inc.php";
$med_id="";
session_start();	
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");

	}
    $med_id = $_SESSION['med_id'];
    $user_id = $_SESSION['user_id'];
    $getMedicalDataSql = "select * from medicine_inventory where user_id='$user_id' and id='$med_id';";
    $resultMedicalData = mysqli_query($conn, $getMedicalDataSql);
    while($row = mysqli_fetch_assoc($resultMedicalData))
    {
      $med_name = $row['med_name'];
      $med_count = $row['count'];
      $med_price = $row['price'];
      $morning = $row['morning'];
      $day = $row['day'];
      $night = $row['night'];

    }
    //$_POST['med_name'] = "$med_name";
    //$_POST['med_count'] = "$med_count";
    //$_POST['med_price'] = "$med_price";

    ////////////////


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $med_count_new=$med_name_new=$med_price_new="";
        //if(!isset($_SESSION['user_id']))
        //{
          //  header("Location: login.php");
        //}
        //$user_id = ($_SESSION['user_id']);
        
        
            $med_count_new = mysqli_real_escape_string($conn,$_POST['med_count']); 
            $med_count_new = $_POST['med_count'];       
        
            $med_price_new = mysqli_real_escape_string($conn,$_POST['med_price']); 
            $med_price_new = $_POST['med_price'];
        
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
        $updateMedSql = "UPDATE `medicine_inventory` SET `count`=$med_count_new,`price`='$med_price_new',`morning`=$morning,`day`=$day,`night`='$night' WHERE `user_id`='$user_id' and id='$med_id';";
        mysqli_query($conn, $updateMedSql);
        header("Location: medicine.php");
        //unset ($_SESSION["med_id"]);
    }







 ?>
 <html>
<head>
	<title></title>
	<?php include 'header.php'; ?>
	<?php include "Database/db_connect.inc.php"; ?>
</head>
<body>
    <form action="editMed.php" method="POST">
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
    		<div class="card-head">
    			Edit Medicine Details
    		</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-md-6">
    					<div class="foem-group">
		    				<label>Medicine Name</label>
		    				<input type="text" name="med_name" id="med_name" placeholder="Medicine Name" class="form-control" value=<?php echo $med_name; ?>>
		    			</div>
    				</div>
    				<div class="col-md-6">
    					<div class="foem-group">
		    				<label>Inventory</label>
		    				<input type="number" name="med_count" id="med_count" placeholder="Medicine Count" class="form-control" value=<?php echo $med_count; ?>>
		    			</div>
    				</div>
    				<div class="col-md-6">
    					<div class="foem-group">
		    				<label>Price</label>
		    				<input type="text" name="med_price" id="med_price" placeholder="Medicine Price" class="form-control"value=<?php  echo $med_price; ?>>
		    			</div>
    				</div>
    				<div class="col-md-6">
    					<div class="foem-group">
		    				<label>Timing</label>
                            <?php //echo $med_name.$med_id.$user_id.$med_count.$med_price.$morning.$day.$night; ?>
		    				
		    				<div class="form-check form-check-inline">

							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="morning" <?php echo ($morning==1 ? 'checked' : '');?>>
							<label class="form-check-label">Morning</label>
							</div>

							<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="day" <?php echo ($day==1 ? 'checked' : '');?>>
							<label class="form-check-label">Day</label>
							</div>

							<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="night" <?php echo ($night==1 ? 'checked' : '');?>>
							<label class="form-check-label">Night</label>
							</div>
                            
		    			</div>

    				</div>
                    <button type="submit" class="btn btn-primary float-right mr-3 mt-2 ml-3"  onClick="redirectTo()" >Update</button>
                    <?php echo $updateMedSql; ?>
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
