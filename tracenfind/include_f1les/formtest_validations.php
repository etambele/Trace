<?php
//presence
	function has_presence($value){
		return isset($value) && $value !== "";
			
		}
//max length		
	function has_max_length($value,$max){
		return strlen($value)<=$max;
			
		}	
//inclusion in a set

	function inclusion_in($value,$set){
		return in_array($value,$set);
			
		}	
	
	function validate_max_length($field_with_max_length){
	global $errors;
	foreach ($field_with_max_length as $field => $max){
		$value = trim($_POST[$field]);
		if (!has_max_length($value,$max)){
		$errors[$field] = ucfirst($field)." is too long";} 
		}
	}

	
	function form_errors($errors = array()){
		$output="";
		if (!empty($errors)){
		$output.="<div classes = \"error\">";
		$output.= "Please fix the following errors: ";
		$output.= "<ul>";
		foreach ($errors as $key => $error){
		$output .="<li>{$error}</li>";
		}
		
		$output.= "</ul>";
		$output.="</div>";
		}
		
		return $output;
		}

?>
