<?php
require_once("dbconfig.php");
$response = array();



$email = 'etambele@yahoo.com';

$q= "select * from tnfudbsv where email = '$email'";
	$re = mysqli_query($connection, $q);
	$r=mysqli_fetch_assoc($re);
	$theid = $r['id'];
	print_r($r);
	echo $theid;

?>