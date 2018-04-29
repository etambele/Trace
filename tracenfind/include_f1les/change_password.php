<?php
$present_field_required = array("password","re_password");
		foreach($present_field_required as $field){
		$value=trim($_POST[$field]);
		if(!has_presence($value)){
		$errors[$field] = ucfirst(str_replace("_"," ", $field))." cannot be left blank";}
		}
		
		//maxlength
		$field_with_max_length = array("password"=>35,"re_password"=>35);
		validate_max_length($field_with_max_length);
		
		if (!preg_match('([a-zA-z].*[0-9]|[0-9].*[a-zA-Z])',$password)){
		$errors[$password] = "Password must contain a number";
		}
		
		//similar
		if($re_password != $password){
		$errors[$re_password] = "Re-typed password does not match password";
		}
		if(strlen($password) < 6){
		$errors[$password] = "Password cannot be less that 6 characters.";
		}
		
		
				
				
		if (empty($errors)){
		//escape all strings
	$password = mysqli_real_escape_string($connection, $password); //used to correct quotaions and symbols into one word
	
	$hashed_password = password_encrypt($password);
	//2. perform database query
	$query = "UPDATE tnfudbsv SET password = '{$hashed_password}' where id = '{$userid}'";
	$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	
		?><div id=notify><?php
		echo "Your password has been changed";
		?></div><?php
		
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
		
		
	}else{
	$password = "";}
?>