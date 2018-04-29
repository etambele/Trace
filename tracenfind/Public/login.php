<?php
require_once("../include_f1les/include_session.php"); 
require_once("../include_f1les/include_function.php");
require_once("../include_f1les/formtest_validations.php");
include("../include_f1les/functions.php");
if(isset($_SESSION['firstname'])){
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];
}else{
$firstname = "";
$userid = "";
}

?>

<?php
include("../include_f1les/include_dbconnectionroot.php");
?>

<?php

if ($firstname && $userid){
	redirect_to("profile.php");
	}else{

$errors = array();
if (isset($_POST['submit'])){
	$present_field_required = array("email","password");
		foreach($present_field_required as $field){
		$value=trim($_POST[$field]);
		if(!has_presence($value)){
		$errors[$field] = ucfirst(str_replace("_"," ", $field))." cannot be left blank";}
		}
	
	if (empty($errors)){
	$email = $_POST["email"];
	$password = $_POST["password"];
		//escape all strings
	$found_user = attempt_login($email, $password);
	
	if($found_user){
	//$row=mysqli_fetch_assoc($found_user);
	$_SESSION['firstname'] = $found_user["firstname"];
	$_SESSION['id'] = $found_user["id"];
	$_SESSION['premium'] = $found_user["premium"];
	redirect_to("profile.php");
	}else{
	$errors[$field] = "Invalid email/password.";
	
	}
	
	}	

}else{

}
}
?>
<!DOCTYPE HTML>
<head>

<title>Tracenfind</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<div id="container">
	<div id ="header">
    	<div id = "headermenu">
        	<div id="logo">
            </div>
            <div id="headerlinks">
            <a href="index.php">Home</a> | <a href="signup.php">Sign up</a>
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
                       <td>Log in to view your phone locations.</td>
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
     <div id ="error">
           <?php echo form_errors($errors);?>
		   		
            	</div>  
     </form>	
     <form action = "login.php" method = "post">
              <table  border="0" style="border: #000099 1px solid" class="logintable">
              
<tr height="50">
               			
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>
                <tr height="50">
                		
                        <td>Email Address:</td>
                        <td><input name = "email" type = "text" value = "" size="30" /></td>
                </tr>
                <tr height="50">
                		
                        <td>Password:</td>
                        <td><input type = "password" name = "password" value = "" size="30" /></td>                       
                </tr>
                <tr height="50">
                		
                        <td>&nbsp;</td>
                        <td><input type = "submit" name = "submit" value = "Log in"/></td>
                        
                </tr>   
                <tr>
        <td colspan="3"><hr/></td>
        </tr>                   
                <tr height="20">
                		
                		<td colspan="50">You don't have an account? &nbsp; <a href="signup.php">signup</a>.</td>
                        
                </tr>
                <tr height="20">
                		
                        <td colspan="50" > <a href="forgot_password.php"> Forgot Password?</a>.</td>
                      
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