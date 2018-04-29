<?php
//1. create database connection.
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "tonye01";
	$dbname = "tnfdbsv";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//test if error occured
	if(mysqli_connect_errno()){
		die("Database connection failed: ". mysqli_connect_error(). "(". mysqli_connect_errno(). ")");
		}

?>
<?php


//create a newsfeed data(f_id) for d user
$ids = "SELECT id FROM tnfudbsv ";
$ids .="WHERE email = '{$email}' ";

$result = mysqli_query($connection, $ids);
$idg = mysqli_fetch_assoc($result);

$mainid = $idg['id'];
echo $mainid;
$secondtable = "INSERT INTO tnftlidbsv(ubd_id, content)
				VALUES ('{$mainid}', '')";
$result = mysqli_query($connection, $secondtable);
	//test if there was a query error
	if ($result) {
	
		//success
		redirect_to("login.php");
		
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failedd.". mysqli_error($connection)); //error here means there was a query error
	}			
				
				


	?>