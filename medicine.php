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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
        <?php 
        include "medical_Controller.php";
        $time = timing($conn);
        $medTableData = medicineList($conn);
        ?>
    	<div class="card">
    		<div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card card-style-morning">
                            <label><?php echo $time["morning"]; ?></label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-style-day">
                            <label><?php echo $time["day"]; ?></label>
                            
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-style-night">
                         <label><?php echo $time["night"]; ?></label>   
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="mt-3 mb-3">
                        <button class="btn btn-primary float-right mr-3" onClick="redirectTo()" >Add New</button>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Inventory</th>
                          <th scope="col">Price</th>
                          <th scope="col">Timing</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($medTableData as $key => $value) {
                        ?>
                        <tr>
                          <td><?php echo $value['id'] ?></th>
                          <td><?php echo $value['name'] ?></td>
                          <td><?php echo $value['count'] ?></td>
                          <td><?php echo $value['price'] ?> Tk</td>
                          <td><?php if($value['morning'] == 1) {echo 'M <i class="fa fa-check" aria-hidden="true"></i>';} else{ echo 'M <i class="fa fa-times" aria-hidden="true"></i>';} if($value['day'] == 1) {echo 'D <i class="fa fa-check" aria-hidden="true"></i>';} else{ echo 'D <i class="fa fa-times" aria-hidden="true"></i>';} if($value['night'] == 1) {echo 'N <i class="fa fa-check" aria-hidden="true"></i>';} else{ echo 'N <i class="fa fa-times" aria-hidden="true"></i>';}?></td>
                          
                          <?php 
                          //session_start();
                          //$_SESSION['med_id'] = $value['id']; 
                          ?>
                          <form action="medicine.php" method="GET">
                          <td><button class="btn btn-secondary edit" title="Edit" id=<?php echo $value['id']; ?> ><i class="fa fa-edit" aria-hidden="true"></i></button>
                          </form>
                            <button class="btn btn-danger delete" title="Delete" id=<?php echo $value['id']; ?> ><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
            </div>
            
    	</div>
    </div>

</div>
</body>
</html>

<script type="text/javascript">
    $(".delete").click(function(){
            var id = this.id;
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url: 'delete.php',
                    type: 'GET',
                    data:{id:id},
                    success:function(){
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                        window.location.reload();
                    }
                });
              }
            })
        });

    function redirectTo()
    {
        window.location.replace('addMedicine.php');
    }
    ///
    $(".edit").click(function() {
    var id = this.id;
    

        $.ajax
        (
            {
                url : 'setMedSession.php',
                type : 'GET',
                data: 
                {
                    id : id,
                },
                success : function(data)
                {
                       alert(data);
                       window.location.replace('editMed.php');
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) 
                {
                    alert ("Error Occured");}                                 
                });



            }
        );



   









</script>

<style type="text/css">
	<?php include 'design\style.css'; ?>
  .card-style-morning {
    height: 150px;
    padding: 15px;
    border: 1px solid #e6e5e5;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    text-align: center;
    background-image:  url("img/morning.png");
    background-size: cover;
    background-repeat: no-repeat;
}
.card-style-day {
    height: 150px;
    padding: 15px;
    border: 1px solid #e6e5e5;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    text-align: center;
    background-image:  url("img/day.png");
    background-size: cover;
    background-repeat: no-repeat;
    color: #666633;
}
.card-style-night {
    height: 150px;
    padding: 15px;
    border: 1px solid #e6e5e5;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    text-align: center;
    background-image:  url("img/night.png");
    background-size: cover;
    background-repeat: no-repeat;
    color: white;
}
</style>