<?php
require_once("../include_f1les/include_session.php"); 
require_once("../include_f1les/include_function.php");
//require_once("../include_f1les/formtest_validations.php");
//include("../include_f1les/functions.php");
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>log out</title>

</head>

<body>


<?php
if ($firstname && $userid){
$query = "UPDATE tnfudbsv SET last_logout = CURRENT_TIMESTAMP where id = '{$userid}'";
	$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
	session_destroy();
	 redirect_to("index.php");
}else{
	redirect_to("index.php");
	
	}

	 ?>

</body>
</html>
