<?php
//presence
		$present_field_required = array("first_name","last_name","password","email");
		foreach($present_field_required as $field){
		$value=trim($_POST[$field]);
		if(!has_presence($value)){
		$errors[$field] = ucfirst(str_replace("_"," ", $field))." cannot be left blank.";}
		}
		
		//maxlength
		$field_with_max_length = array("first_name"=>35,"last_name"=>35,"password"=>35,"re_password"=>35,"email"=>35);
		validate_max_length($field_with_max_length);
		
		//format		
		$format=trim($email);
		if(strpos($format, "@") == 0){
		$errors[$email] ="Input a valid email address.";}
		
		$format=trim($email);
		if(strpos($format, ".") == 0){
		$errors[$email] ="Input a valid email address.";}
		
		if(strlen($email) < 7){
		$errors[$email] = "Input a valid email address.";
		}
		
		
		//password have number
		if (!preg_match('([a-zA-z].*[0-9]|[0-9].*[a-zA-Z])',$password)){
		$errors[$password] = "Password must contain at least one number.";
		}
		
		//similar
		if(strlen($password) < 6){
		$errors[$password] = "Password cannot be less that 6 characters.";
		}
		
		//similar
		if($re_password != $password){
		$errors[$re_password] = "Re-typed password does not match password.";
		}
		
		
				
		$emaill = mysqli_real_escape_string($connection, $email);
		$check= "SELECT id FROM tnfudbsv WHERE email = '{$emaill}'";
		$checked_result = mysqli_query($connection, $check);
		$ids = mysqli_fetch_assoc($checked_result);

		$mainid = $ids['id'];
		if ($mainid >= 1){
		$errors[$email] = "User with this email address already exsist.";
		}

?>