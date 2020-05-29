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
        <div class="card-body">
            
                <div class="card mt-3">
                    
                    <div class="mt-3 mb-3">
                            <nav class="navbar navbar-light bg-light">
                              <div class="form-inline">
                                <input class="form-control mr-sm-4" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-4 my-sm-0" type="button">Search</button>
                                <button class="btn btn-primary float-right ml-3" onClick="redirectTo()" >Add New</button>
                              </div>
                            </nav>                     
                            
                    </div>
                </div>
            
        </div>
        <div class="card">
            <div id="show">
                
            </div>
        </div>
    </div>

</div>
    <script type="text/javascript">
        var intervalTime = 1000;
        function editContact(id)
        {
            $.ajax
            (
                {
                    url : 'setContactSession.php',
                    type : 'GET',
                    data: 
                    {
                        id : id,
                    },
                    success : function(data)
                    {
                           //alert(data);
                           window.location.replace("editContact.php");
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert ("Error Occured");
                    }                                 
                }
            );
        













        }
        function deleteContact(id)
        {   
            console.log(id);
            $.ajax
            (
                {
                    url : 'deleteContact.php',
                    type : 'GET',
                    data: 
                    {
                        id : id,
                    },
                    success : function(data)
                    {
                           $(document).ready(function(){
                                //console.log("Messege");
                                $("#show").load("loadContact.php");
                            });
                    },
                    error : function(XMLHttpRequest, textStatus, errorThrown) 
                    {
                        alert ("Error Occured");
                    }                                 
                }
            );

        }
        /*$(document).ready(
            function()
                {
                    setInterval(function()
                    {
                        $('#show').load('loadContact.php')
                        {

                        }

                    },intervalTime=intervalTime+10000)
                
                }

            )*/
        //clearInterval(interval);
           /* $(document).ready(function(){
                function fetch_data()
                {

                    $.ajax({
                        url : "loadContact.php",
                        method : "POST",
                        success : function(data){
                            $('#show').html(data);
                        }
                    })
                }


            });*/
            $(document).ready(function(){
                //console.log("Messege");
                $("#show").load("loadContact.php");
            });



        function redirectTo()
            {
                window.location.replace('addContact.php');
            }
            


    </script>
</body>
</html>

<style type="text/css">
    <?php include 'design\style.css'; ?>

</style>
