<?php
require_once("dbconfig.php");
$response = array();

if (isset($_POST['email']) && isset($_POST['password'])) 
 {
    $name = $_POST['email'];
    $password =$_POST['password'];
	$longitude =$_POST['longitude'];
	$latitude =$_POST['latitude'];
	$timedate =$_POST['timedate'];
	$simnumber =$_POST['simnumber'];
	$devicename =$_POST['devicename'];
	//$currentname = $_POST['currentname'];
	$firstquery = "select * from tnfudbsv where email = '$email' and password = '$password'";
	$firstresult = mysqli_query($connection, $firstquery);
	$firstrow=mysqli_fetch_assoc($firstresult);
	if ($firstresult) {
		//echo "saved";
	}else{
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	$udb_id = firstrow['udb_id'];
	//select * from test where name ='$name' and password = '$password'
	
    $query = "insert into tnftlidbsv(udb_id,longitude,latitude,timedate,simnumber,devicename)
				values({$udb_id},'$logitude','$latitude','$timedate','simnumber','$devicename')";
	$result = mysqli_query($connection, $query);
	$row=mysqli_fetch_assoc($result);
	//test if there was a query error
	if ($result) {
		//echo "saved";
	}else{
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
    if ($row)
	{
        $response["success"] = 1;
        $response["message"] = "confirmed.";
        echo json_encode($response);
    }
	else
	{
      $response["success"] = 0;
      $response["message"] = "Oops! This user does not exist.";
      echo json_encode($response);  
    }
 }
 
 else 
 {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
 } 
?>




