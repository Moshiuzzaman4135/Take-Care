<?php
//session_start();
//include "Database/db_connect.inc.php";
$morning = $day = $night=$row="";
if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}
//echo $_SESSION['user_id'];
function timing($conn)
{
	
	$sqlMedical = "select * from health_information where user_id='".$_SESSION['user_id']."';";
	//echo $sqlMedical;
	$resultMedical = mysqli_query($conn,$sqlMedical);
	while($row = mysqli_fetch_assoc($resultMedical))
	{
		$morning = $row['morning_med_time'];
		$day = $row['day_med_time'];
		$night = $row['night_med_time'];
	}
	return ["morning"=>$morning,"day"=>$day,"night"=>$night];
}

function medicineList($conn)
{ 
	$tableData = [];
	$sqlMedicneList = "select * from medicine_inventory where user_id='".$_SESSION['user_id']."';";
	$resultMedicineList = mysqli_query($conn,$sqlMedicneList);
	while ($row = mysqli_fetch_assoc($resultMedicineList)) 
	{
		$id = $row['id'];
		$name = $row['med_name'];
		$count = $row['count'];
		$price = $row['price'];
		$morning_med = $row['morning'];
		$day_med = $row['day'];
		$night_med = $row['night'];
		array_push($tableData, ['id'=>$id,'name'=>$name,'count'=>$count,'price'=>$price,'morning'=>$morning_med,'day'=>$day_med,'night'=>$night_med]);
	}

	return $tableData;


}

?>