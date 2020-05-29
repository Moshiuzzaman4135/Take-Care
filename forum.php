<?php 
	
	session_start();	
    include "Database/db_connect.inc.php";
     $error="";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");

	}
    $user_id = $_SESSION['user_id'];
    $id = $user_name = $user_email = $user_gender = "";
    $sql = "select * from user_detail where user_id='$user_id';"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['user_id'];
                $user_name = $row['full_name'];
                $user_email = $row['user_email'];
                $user_gender = $row['user_gender'];                

            }
    ////////////////////////
    $post = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!empty($_POST['post_field']))
        {
            $post = mysqli_real_escape_string($conn,$_POST['post_field']);   
            $post = $_POST['post_field'];
        }

        $sqlCheck = "select * from forum where post='$post' and user_id='$user_id';";
        $rowCount = mysqli_query($conn,$sqlCheck);
        if (mysqli_num_rows($rowCount) != 0)
        {
        
            $error = "Posted Already";
        }
        else
        {
        $sqlPost = "INSERT INTO `forum`(`user_id`, `post`, `comment`) VALUES ('$user_id','$post','');";
        //echo $sqlPost;
        mysqli_query($conn,$sqlPost);


        }





        
    }
    $resultPost = mysqli_query($conn, "SELECT * FROM forum where user_id='$user_id'; ");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'header.php'; ?>
	<?php include "Database/db_connect.inc.php"; ?>
</head>
<body>
<form action="forum.php" method="POST"> 
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
            <h1>Forum</h1>            
            <div>
              <textarea 
                id="text" 
                cols="40" 
                rows="4" 
                name="post_field" 
                placeholder="Post in the forum..." required="required"></textarea>
            </div>
            <button class="btn btn-outline-success my-4 my-sm-0" type="submit">Post</button>
            <?php echo $error;  ?>
            <!-- Forum Div is Created here -->
            <div >
              <?php
                while ($row = mysqli_fetch_array($resultPost)) {
                  echo "<div id='img_div' class="."card_2"."  >";
                   echo "<div id='img_div' class="."card_2"." >";
                    echo "<lablel> ".$row['post']." </label>";
                  echo "</div>";
                  ;
                    echo "<lablel> ".$row['comment']." </label>";
                    echo "<button id=".$row['id']." onClick="."deletePost(".$row['id'].")".">Delete</button>";
                  echo "</div>";



                }
              ?>              
            </div>












            
    	<!-- Forum Div is Ended here -->
    </div>

</div>
</form>
</body>
</html>

<style type="text/css">
	<?php include 'design\style.css'; ?>
    .card_2 {
    margin: 5px;
    padding: 5px;
    position: relative;
    
    display: flex;
    
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: rgba(0,0,0,.075);;
    background-clip: border-box;
    border: 3px solid rgba(0,0,0,.125);
    border-radius: .30rem;
}
    
}

   
</style>
<script type="text/javascript">
    function deletePost(id)
            {
                //alert(id);
                //console.log(id);
                    $.ajax
                    (
                        {
                            url : 'deletePost.php',
                            type : 'GET',
                            data: 
                            {
                                id : id,
                            },
                            success : function(data)
                            {
                                   $(document).ready(function(){
                                        //console.log("Messege");
                                        //$("#show").load("forum.php");
                                        location.reload()
                                    });
                            },
                            error : function(XMLHttpRequest, textStatus, errorThrown) 
                            {
                                alert ("Error Occured");
                            }                                 
                        }
                    );
            }

</script>