<?php 
    include "Database/db_connect.inc.php";	
	session_start();	
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}
    $user_id = $_SESSION['user_id'];
    $blood_group = $height = $weight= $sugar_level = $bp_high = $bp_low = $morning = $day = $night = $id="";

    $sql = "select * from health_information where user_id='$user_id';";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $blood_group = $row['blood_group'];
                $height = $row['height'];
                $weight = $row['weight'];
                $sugar_level = $row['sugar_level'];
                $bp_high = $row['bp_high'];
                $bp_low = $row['bp_low'];
                $morning = $row['morning_med_time'];
                $day = $row['day_med_time'];
                $night = $row['night_med_time'];

            }
            $sqlLogOut = "select * from user_detail where user_id='$user_id';";   
    
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
        $blood_group = $_POST['blood_group'];

        if(!empty($_POST['height']))
        {
            $height = mysqli_real_escape_string($conn,$_POST['height']);  
            $height = $_POST['height'];
        }
        if(!empty($_POST['weight']))
        {
            $weight = mysqli_real_escape_string($conn,$_POST['weight']);  
            $weight = $_POST['weight'];
        }
        if(!empty($_POST['sugar_level']))
        {
            $sugar_level = mysqli_real_escape_string($conn,$_POST['sugar_level']);  
            $sugar_level = $_POST['sugar_level'];
        }
        if(!empty($_POST['bp_high']))
        {
            $bp_high = mysqli_real_escape_string($conn,$_POST['bp_high']);  
            $bp_high = $_POST['bp_high'];
        }
        if(!empty($_POST['bp_low']))
        {
            $bp_low = mysqli_real_escape_string($conn,$_POST['bp_low']);  
            $bp_low = $_POST['bp_low'];
        }
        
            $morning = $_POST['morning'];
        
        
            $day = $_POST['day'];
        
       
            $night = $_POST['night'];
        
        $sqlUpdate = "UPDATE `health_information` SET `blood_group`='$blood_group',`height`='$height',`weight`='$weight',`sugar_level`='$sugar_level',`bp_high`='$bp_high',`bp_low`='$bp_low',`morning_med_time`='$morning',`day_med_time`='$day',`night_med_time`='$night' WHERE user_id='$user_id' and id='$id';";
        echo $sqlUpdate;
        mysqli_query($conn, $sqlUpdate);
        header("Location: home.php");

    }
    

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'header.php'; ?>
	<?php include "Database/db_connect.inc.php"; ?>
</head>
<body>
<form action="editHealth.php" method="POST">
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
            <div class="row">
                <div class="col-md-6 ml-3">
                    <div class="form-group">
                    <label>Blood Group : </label>
                    <select name="blood_group" class="foem-group ml-3 mt-3" required name="blood_group" >
                    <option value="A+" <?php if($blood_group=='A+'){echo "selected";} ?> >A+</option>
                    <option value="B+" <?php if($blood_group=='B+'){echo "selected";} ?>>B+</option>
                    <option value="O+" <?php if($blood_group=='O+'){echo "selected";} ?>>O+</option>
                    <option value="AB+" <?php if($blood_group=='AB+'){echo "selected";} ?>>AB+</option>
                    <option value="A-" <?php if($blood_group=='A-'){echo "selected";} ?>>A-</option>
                    <option value="B-+"<?php if($blood_group=='B-'){echo "selected";} ?>>B-</option>
                    <option value="O-"<?php if($blood_group=='O-'){echo "selected";} ?>>O-</option>
                    <option value="AB-" <?php if($blood_group=='AB-'){echo "selected";} ?>>AB-</option>
                    </select>     
                    </div>             
                                                     
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Height: </label>
                    <input class="form-control" type="number" name="height" placeholder="Height" max=200 value=<?php echo $height;  ?>> 
                    </div>
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Weight: </label>
                    <input class="form-control" type="number" name="weight" placeholder="weight" max=150 value=<?php echo $weight;  ?>> 
                    </div>
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Sugar Level: </label>
                    <input class="form-control" type="number" name="sugar_level" placeholder="sugar_level" max=2
                    value=<?php echo $sugar_level;  ?>> 
                    </div>
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Blood Pressure: </label>
                    <div class="col-sm-4">
                        <input class="form-control" type="number" name="bp_high" placeholder="High" max=200 value=<?php echo $bp_high;  ?>>
                    </div>
                    <div class="col-sm-4"><input class="form-control" type="bp_low" name="bp_low" placeholder="Low" max=180 value=<?php echo $bp_low;  ?>>                    

                    </div>

                    
                    </div>
                </div>
            </div>
            <table>

                
            
            <div class="col-sm-4">
                <tr>
                <td><label class="form-group"> Morning Medicine Time</label></td>
                <td><input type="time" name="morning" required="" value=<?php echo $morning;  ?>></td>
                </tr>
            </div>
            

            <div class="col-sm-4">
                <tr>
                <td><label> Day Medicine Time</label></td>
                <td><input type="time" name="day" required="" value=<?php echo $day;  ?>></td>
                </tr>
            </div>
            

            <div class="col-sm-4">
                <tr>
                <td><label> Night Medicine Time</label></td>
                <td><input type="time" name="night" required="" value=<?php echo $night;  ?>> </td>
                </tr>
                <tr>               
                
            </div>

                </tr>
            </table>
             <button align="middle" type="submit" class="btn btn-primary float-right mr-3" >Save</button>

                             
                                       
        </div>
    </div>
                    
</div>
</form>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>
