
<?php
if (isset($_GET)){
echo "not Found";
}else{

$present_field_required = array("email");
		foreach($present_field_required as $field){
		$value=trim($_POST[$field]);
		if(!has_presence($value)){
		$errors[$field] = ucfirst(str_replace("_"," ", $field))." cannot be left blank";}
		}
		
		//maxlength
		$field_with_max_length = array("email"=>35);
		validate_max_length($field_with_max_length);
		
		$format=trim($email);
		if(strpos($format, "@") == 0){
		$errors[$email] ="Input a valid email address.";}
		
		$format=trim($email);
		if(strpos($format, ".") == 0){
		$errors[$email] ="Input a valid email address.";}
		
		if(strlen($email) < 7){
		$errors[$email] = "Input a valid email address.";
		}
		
		$check= "SELECT id FROM tnfudbsv WHERE email = '{$email}'";
		$checked_result = mysqli_query($connection, $check);
		$ids = mysqli_fetch_assoc($checked_result);

		$mainid = $ids['id'];
		if ($mainid >= 1){
		$errors[$email] = "User with this email address already exsist.";
		}

		
		
				
				
		if (empty($errors)){
		//escape all strings
	$email = mysqli_real_escape_string($connection, $email); //used to correct quotaions and symbols into one word
	
	//2. perform database query
	$query = "UPDATE tnfudbsv SET email = '{$email}' where id = '{$userid}'";
	$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	
		?><div id=notify><?php
		echo "Your email has been changed";
		?></div><?php
		
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
		
		
	}else{
	$email = "";}
	}
?>