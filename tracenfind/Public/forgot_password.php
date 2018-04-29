<?php
require_once("../include_f1les/include_session.php"); 
require_once("../include_f1les/include_function.php");
require_once("../include_f1les/formtest_validations.php");
include("../include_f1les/functions.php");
if(isset($_SESSION['firstname'])){
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];
}else{
$firstname = null;
$userid = null;}
//$firstname = $_SESSION['firstname'];
//$userid = $_SESSION['id'];

?>
<?php
include("../include_f1les/include_dbconnectionroot.php");
?>

<?php
$errors = array();
if(isset($_POST['submit'])){
	$email = $_POST["email"];

	$present_field_required = array("email");
		foreach($present_field_required as $field){
		$value=trim($_POST[$field]);
		if(!has_presence($value)){
		$errors[$field] = ucfirst(str_replace("_"," ", $field))." Please type in your email";}
		}
		
		$emaill = mysqli_real_escape_string($connection, $email);
		$check= "SELECT id FROM tnfudbsv WHERE email = '{$emaill}'";
		$checked_result = mysqli_query($connection, $check);
		$ids = mysqli_fetch_assoc($checked_result);

		$mainid = $ids['id'];
		if (!$mainid >= 1){
		$errors[$email] = "This email does not exist";
		}
		
		if (empty($errors)){
		$new_password =randomstring(10);
		
		
		$hashed_password = password_encrypt($new_password); //hash new password
		
		$query = "UPDATE tnfudbsv SET password = '{$hashed_password}' WHERE email = '{$email}'";
		$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	
		$webmaster = "snazzy4lyfe@yahoo.com";
		$headers = "From: emmanuel <$webmaster>";
		$headers .= "MIME-version: 1.0 \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		$headers .= "X-mailer: PHP/".phpversion();
		$subject = "Your New Password";
		$message = "Hello , your password has been reset. your new password is below \n";
		$message .= "password: $new_password \n";
		
		
		//mail($email,$subject,$message,$headers);
		
		//if (mail($email,$subject,$message,$headers)){
		
			echo "your password has been sent to your email";
			echo "saved   ";
			echo $new_password; //this is where the password is sent to email
		//}else{
		//echo "An error occured while trying to send your password, please try again later.";
		//}
	
	//echo "saved   ";
	//echo $new_password; //this is where the password is sent to email
	
	
	
	}else{
	//failed
	echo "An error occured while trying to reset your password, please try again later.";
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
	
		}
		
		
		
}else{

}

?>


<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="style/style.css">
<?php
if ($firstname  && $userid){
 ?>
<title><?php echo $firstname; ?></title>
<?php
}
else{?>
<title>profile</title>
<?php
};
?>
</head>
<body>

<div id="container">
	<div id ="header">
    	<div id = "headermenu">
        	<div id="logo">
            </div>
            <div id="headerlinks">
           <a href="index.php">Home</a> | <a href="login.php">Login</a><br/>
            </div>
            
        </div>
    </div>

<div id="middle">
	<div id="middletoplogin">
    	<div id="message">
         <table  border="0" height="50" width="830">
              
				<tr height="90" >              			
                       <td></td>
                       <td></td>
                       <td></td>
                </tr>
                <tr height="50">              			
                       <td></td>
                       <td><?php
							if ($firstname && $userid){
							
								redirect_to("profile.php");
								 
							}else{
								echo "Forgot Password? Just type in your registered email";
									
								}
							?></td>
                       <td></td>
                </tr>
                <tr height="50">              			
                       <td></td>
                       <td></td>
                       <td></td>
                </tr>
                      
                   
                    </table>
        
        </div>
    </div>
     <div id="middlebottomlogsign">
         <div id="error">
         <?php echo form_errors($errors);?>
         </div>
         <form action = "forgot_password.php" method = "post">
         <table border="0" class="logintable">
         	<tr>
            <td colspan="50">&nbsp;</td>
            </tr>
        	<tr>
            	<td>Email Address:</td>
                <td><input type = "text" name = "email" value = "" size="30"/><br/></td>
            </tr>
            <tr>
            	<td></td>
                <td><input type = "submit" name = "submit" value = "Submit"/></td>
            </tr>
            <tr>
            	<td colspan="50">You don't have an account? <a href="signup.php">signup</a>.</td>
                
            </tr>
         </table>
         
		
		 
	</form>
         
         
    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>