<?php 
	
	session_start();	
    include "Database/db_connect.inc.php";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: logout.php");

	}
    $user_id = $_SESSION['user_id'];
    $id = $user_name = $user_email = $user_gender = "";
    $sql = "select * from user_detail where user_id='$user_id';";
    //echo $sql;
    
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['user_id'];
                $user_name = $row['full_name'];
                $user_email = $row['user_email'];
                $user_gender = $row['user_gender'];                

            }
    $sqlValidation = "SELECT * FROM validation WHERE user_id = '$user_id';";	 
	$resultValidation = mysqli_query($conn, $sqlValidation);
	while($row = mysqli_fetch_assoc($resultValidation))
            {
                $validate = $row['validation'];                             

            }
    if($validate=='1')
    {
    	//header("Location: doctor.php");
    }
    else
    {
    	 header("Location: invalid.php");   	
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
                <a href="doctor.php">Dashboard</a>
            </li>
            <li>
                <a href="forumDoctor.php">Forum</a>
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
            <h1>Take Care</h1>
            <p>Welcome to Take Care . This is a beta website where we are hoping to create an online application to take care after you. We are your personalized inventory management as well as emergency phonebook. You want to see where is the nearest medical center it is a place for you. We are also trying to create a social platform for us and Doctors to interact and make our society a better healthy place </p>
    	
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>
