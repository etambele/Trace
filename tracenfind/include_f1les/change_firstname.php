<?php
$present_field_required = array("first_name");
		foreach($present_field_required as $field){
		$value=trim($_POST[$field]);
		if(!has_presence($value)){
		$errors[$field] = ucfirst(str_replace("_"," ", $field))." cannot be left blank";}
		}
		
		//maxlength
		$field_with_max_length = array("first_name"=>35);
		validate_max_length($field_with_max_length);
		
		
				
				
		if (empty($errors)){
		//escape all strings
	$first_name = mysqli_real_escape_string($connection, $first_name); //used to correct quotaions and symbols into one word
	$first_name = ucwords($first_name); 
	
	//2. perform database query
	$query = "UPDATE tnfudbsv SET firstname = '{$first_name}' where id = '{$userid}'";
	$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	?><div id=notify><?php
	echo "Your first name has been changed";
	?></div><?php
	
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
		
		
	}else{
	$first_name = "";}
	
?>