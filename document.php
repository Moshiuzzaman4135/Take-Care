<?php 
	
	session_start();	
    include "Database/db_connect.inc.php";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");

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

    //////////////////////////////////////////
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
          if (isset($_POST['upload'])) {
            
            $image = $_FILES['image']['name'];            
            $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);
            $target = "images/".basename($image);
            $sqlInsert = "INSERT INTO document (user_id,image, description) VALUES ('$user_id','$image', '$image_text');";
            //echo $sqlInsert;            
            mysqli_query($conn, $sqlInsert);


            if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && !empty($_POST['image_text']) ) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
          }
          $resultImage = mysqli_query($conn, "SELECT * FROM document where user_id='$user_id'; ");
      }
      $resultImage = mysqli_query($conn, "SELECT * FROM document where user_id='$user_id'; ");

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
            <style type="text/css">
   #content{
    width: 70%;

    margin: 10px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{

    width: 95%;
    padding: 2px;
    margin: 10px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 600px;
    height: 700px;
   }
</style>

<div id="content">
  <?php
    while ($row = mysqli_fetch_array($resultImage)) {
      echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['description']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="document.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about this image..." required></textarea>
    </div>
    <div>
        <button type="submit" name="upload">POST</button>
    </div>
  </form>
</div>
    	
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
</style>
