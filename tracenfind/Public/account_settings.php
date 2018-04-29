<?php
require_once("../include_f1les/include_session.php"); 
require_once("../include_f1les/include_function.php");
require_once("../include_f1les/formtest_validations.php");
include("../include_f1les/functions.php");
/*if(isset($_SESSION['firstname'])){
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];
}else{
$firstname = "";
$userid = "";}*/
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];

?>
<?php
include("../include_f1les/include_dbconnectionroot.php");
?>



<?php
$errors = array();

	if (isset($_POST['fn'])){
		$first_name = $_POST["first_name"];
				
		//validations
		//presence
		include("../include_f1les/change_firstname.php");
	
	}
	
	

	if (isset($_POST['ln'])){
		$last_name = $_POST["last_name"];
				
		//validations
		//presence
		include("../include_f1les/change_lastname.php");
	
	}
	
	if (isset($_POST['pass'])){
		$password = $_POST["password"];
		$re_password = $_POST["re_password"];
		//validations
		//presence
		include("../include_f1les/change_password.php");
	
	}
	if (isset($_POST['email'])){
		$email = $_POST["email"];
				
		//validations
		//presence
		include("../include_f1les/change_email.php");
	
	}
?>



<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="style/style.css">

<?php
if ($firstname  && $userid){
 ?>
<title><?php echo "Tracenfind | "; echo $firstname; ?></title>
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
           <a href="profile.php">Profile</a> | <a href="logout.php">logout</a><br/>
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
                       <td style="color:#FFFFFF; text-align:center; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:24px;" ><?php
								if ($firstname && $userid){
									echo "Edit your account details"; 
									 
								}else{
									
									redirect_to("login.php"); 	
									}
								?>
								</td>
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
	 <table  border="0" style="border: #000099 2px solid" class="logintable">
	 
	 <tr  height="50">
	<form action = "account_settings.php" method = "post">
		<td >First name:</td>
		<td><input type = "text" name = "first_name" value = "" size="30"/></td>				
		<td><input type = "submit" name = "fn" value = "Change"/></td>
	</form>      
		</tr>
        
        
        <tr>
        <td colspan="3"><hr/></td>
        </tr>
	
	<tr height="50">
	<form action = "account_settings.php" method = "post">
		<td>Last name:</td>
		<td><input type = "text" name = "last_name" value = "" size="30"/></td>				
		<td><input type = "submit" name = "ln" value = "Change"/></td>
		
	</form>	
		</tr>
        
         <tr>
        <td colspan="3"><hr/></td>
        </tr>
	
	<tr height="50">
	<form action = "account_settings.php" method = "post">
		<td>Password:</td>
		<td><input type = "password" name = "password" value = "" size="30"/></td>
		<td>&nbsp;</td>
	</tr>
	<tr height="50">
		<td>Re-type password:</td>
		<td><input type = "password" name = "re_password" value = "" size="30"/></td>
				
		<td><input type = "submit" name = "pass" value = "Change"/></td>
		</tr>
	</form>

	 <tr>
        <td colspan="3"><hr/></td>
        </tr>
        
	<form action = "account_settings.php" method = "post">
	<tr height="50">
		<td>Email Address:</td>
		<td><input type = "text" name = "email" value = "" size="30"/></td>		
		<td><input type = "submit" name = "em" value = "Change"/></td>
	</tr>
	</form>	
	
	</table>
    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>