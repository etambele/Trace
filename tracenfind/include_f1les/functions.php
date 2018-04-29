<?php

	
	function confirm_query($result_set){
	if (!$result_set) {
	die("Databse query failed."); //error here means there was a query error
	}
} 

	function find_all_subjects(){
		global $connection;
		
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";
		$subject_set = mysqli_query($connection, $query);
		//test if there was a query error
		confirm_query($subject_set);
		return $subject_set;
	}

	function find_pages_for_subject($subject_id){
		global $connection;
		
		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
		
		$query = "SELECT * ";
        $query .= "FROM pages ";
        $query .= "WHERE visible = 1 ";
        $query .= "AND subject_id = {$safe_subject_id} ";
        $query .= "ORDER BY position ASC";
        $page_set = mysqli_query($connection, $query);
        //test if there was a query error
        confirm_query($page_set);
		return $page_set;
	}
	
	// used to select a particular subject and display the menu name of the subject 
	function find_subject_by_id($subject_id){
	global $connection;
		
		$safe_subject_id = mysqli_real_escape_string($connection, $subject_id);
		
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id = {$safe_subject_id} ";
		$query .= "LIMIT 1";
		$subject_set = mysqli_query($connection, $query);
		//test if there was a query error
		confirm_query($subject_set);
		if ($subject = mysqli_fetch_assoc($subject_set)){
		return $subject;
		}else{
		return null; }
	}
	
	
	// used to select a particular page and display the menu name of the page 
	function find_page_by_id($page_id){
	global $connection;
		
		$safe_page_id = mysqli_real_escape_string($connection, $page_id);
		
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id = {$safe_page_id} ";
		$query .= "LIMIT 1";
		$page_set = mysqli_query($connection, $query);
		//test if there was a query error
		confirm_query($page_set);
		if ($page = mysqli_fetch_assoc($page_set)){
		return $page;
		}else{
		return null; }
	}
	
	
	function find_user_by_email($email){//finds user by email
	global $connection;
	
		$eemail = mysqli_real_escape_string($connection, $email);
		//2. perform database query
		$query = "SELECT * from tnfudbsv ";
		$query .= "WHERE email = '{$eemail}' ";
		$query .= "LIMIT 1";
		$email_set = mysqli_query($connection, $query);
		//test if there was a query error
		confirm_query($email_set);
		
	if ($user = mysqli_fetch_assoc($email_set)){
	return $user;
	}else{
	return null;}
	
	}
	
	function password_encrypt($password){
	$hash_format = "$2y$10$";
	$salt_length = 22;
	$salt = generate_salt($salt_length);
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
	}
	
	function generate_salt($length){
	$unique_random_string = md5(uniqid(mt_rand(), true));
	$base64_string = base64_encode($unique_random_string);
	$modified_base64_string = str_replace('+','.', $base64_string);
	$salt = substr($modified_base64_string, 0 , $length);
	return $salt;	
	}
	
	function password_check($password, $existing_hash){
	$hash = crypt($password, $existing_hash);
	if($hash === $existing_hash){
	return true;
	}else{
	return false;
	}	
	}
	
	function attempt_login($email, $password){  //checks password from array goottn from find user by email
	$user = find_user_by_email($email);
	if($user) {
		if (password_check($password, $user["password"])){
		return $user;
		}else{
		//password does not match
		return false;}
		
	}else{
	//user not found
	return false;}
	}
	
	function example($found_user){
	$e = $found_user['id']; 
	return $e;
	}
	
	
	function randomstring($slength){
	$characters = '1234567890abcdefghij1234567890klmnopqrstuvwxyz1234567890ABCDEFGHIJ1234567890KLMNOPQRSTUVWXYZ1234567890';
	$characterslength = strlen($characters);
	$randomstring="";
	for($i = 0; $i < $slength; $i++){
	$randomstring .= $characters[rand(0, $characterslength - 1)];
	}
	return $randomstring;
	}
	
	
	
	
	
?>