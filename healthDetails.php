<?php 
    include "Database/db_connect.inc.php";	
	session_start();	
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}
    $user_id = $_SESSION['user_id'];
    $sql2 = "select * from user_detail where user_id='$user_id';";
    //echo $sql;
    
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2))
            {
                $id = $row['user_id'];
                $user_name = $row['full_name'];
                $user_email = $row['user_email'];
                $user_gender = $row['user_gender'];                

            }









    $sqlCheck = "select * from health_information where user_id=$user_id;";
    $result = mysqli_query($conn, $sqlCheck);
        $count = mysqli_num_rows($result);
        if (mysqli_num_rows($result) != 0)
        {

            while($row = mysqli_fetch_assoc($result))
            {
                $blood_group = $row['blood_group'];
                $height = $row['height'];
                $weight = $row['weight'];
                $sugar_level = $row['sugar_level'];
                $bp_high = $row['bp_high'];
                $bp_low = $row['bp_low'];


            }
        
        
        }
        else 
        {
            header("Location: fillInfo.php");
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow ">
              <div class="container">
                <a class="navbar-brand" href="#">Welcome, <?php echo $user_name;  ?></a>               
                      
                    
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="logout.php">Logout
                            <span class="sr-only">(current)</span>
                          </a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>
    	<div class="card mt-3">
    		<table class="card mt-3 ml-3 mr-3 mb-3 ">
                <tr>
                    <td><label>Blood Group</label></td>
                    <td><label><?php echo $blood_group; ?></label></td>
                </tr> 
                <tr>
                    <td><label>Height</label></td>
                    <td><label><?php echo $height; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Weight</label></td>
                    <td><label><?php echo $weight; ; ?></label></td>
                </tr> 
                <tr>
                    <td><label>Sugar Level</label></td>
                    <td><label><?php echo $sugar_level; ; ?></label></td>
                </tr>  
                <tr>
                    <td><label>Blood Pressure</label></td>
                    <td><label><?php echo $bp_high."-".$bp_low; ; ?></label></td>
                </tr>  
                <tr>
                    <td colspan="2" align="middle">
                        <button align="middle" type="submit" class="btn btn-primary" onClick="redirectTo()">Edit</button>
                    </td>
                <tr>       
            </table>
    	</div>
    </div>

</div>

</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>
<script type="text/javascript">
    function redirectTo()
    {
        window.location.replace('editHealth.php');
    }
</script>
