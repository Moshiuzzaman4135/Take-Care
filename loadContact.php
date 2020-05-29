<?php
include "Database/db_connect.inc.php";
session_start();
$output="";
$id = $_SESSION['user_id'];
//echo $id;
$sqlGetContact = 'select * from contact where user_id='.$id.';';
$output .= '<table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">bloodGroup</th>
                          <th scope="col">Action</th>

                        </tr>';



//echo $sqlGetContact;
$resultContact = mysqli_query($conn,$sqlGetContact);
	while($row = mysqli_fetch_assoc($resultContact))
	{
		$id = $row['id'];
		//echo $id ."<br>";
		$name = $row['contact_name'];

		$email = $row['contact_email'];
		$phone = $row['contact_phone'];
		$bloodGroup =$row['contact_bg'];
		$output .='<tr>
                          <td id='.$id.'>'.$id.'</td>
                          <td id='.$id.'>'.$name.'</td>
                          <td id='.$id.'>'.$email.'</td>
                          <td id='.$id.'>'.$phone.'</td>
                          <td id='.$id.'>'.$bloodGroup.'</td>
                          <td><button class="btn btn-secondary edit" title="Edit" id='.$id.' onClick="editContact('.$id.')" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                          </form>
                            <button class="btn btn-danger delete" title="Delete" id='.$id.' onClick="deleteContact('.$id.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                          
                    </tr>';




	}

$output .='</table>';
echo $output;



?>