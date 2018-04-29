<?php
//include("include/functions.php");
require_once("dbconfig.php");
$response = array();

if (isset($_POST['email']) && isset($_POST['password'])) 
 {
    $email = $_POST['email'];
    $password =$_POST['password'];
	
	$vemail = mysqli_real_escape_string($connection, $email);
	$vpassword = mysqli_real_escape_string($connection, $password);
	//$found_user = attempt_login($email, $password);
	
    $query = "select * from tnfudbsv where email = '$vemail' and password = '$vpassword'";
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




