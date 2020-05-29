<?php 
	
	session_start();	
    include "Database/db_connect.inc.php";
    $sql = "select * from validation where validation='0'";
    $result = mysqli_query($conn, $sql);
    /*while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $user_id = $row['user_id'];
                $user_email = $row['user_email'];  
                $license_no = $row['license_no']; 
            }*/
	
	
    

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
             
        </ul>
    </nav>

    <div class="container">
    	
    		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow ">
              <div class="container">
                <a class="navbar-brand" href="#">Welcome, Admin</a>        
                    
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="login.php">Logout
                            <span class="sr-only">(current)</span>
                          </a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>
            <div >
            	<table border="0" class="table table-striped">
            		<tr>
            			<th>ID</th>
            			<th>USER ID</th>
            			<th>USER EMIAL</th>
            			<th>USER License No</th>
            			<th>Action</th>
            		</tr>
              <?php
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";    
                  echo "<td>";                   
                    echo "<lablel> ".$row['id']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<lablel> ".$row['user_id']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<lablel> ".$row['user_email']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<lablel> ".$row['license_no']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<button class="."btn btn-danger delete"." title="."Approve"." id=".$row['user_id']." onClick="."approve(".$row['user_id'].")".">Approve</button></td>";
                  echo "</td>";
                  echo "</tr>"; 
                  
                    



                }
              ?>
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
	function approve(id)
	{
			$.ajax
                    (
                        {
                            url : 'approve.php',
                            type : 'GET',
                            data: 
                            {
                                id : id,
                            },
                            success : function(data)
                            {
                                   $(document).ready(function(){
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