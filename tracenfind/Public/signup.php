<?php 
 
require_once("../include_f1les/include_function.php");
require_once("../include_f1les/formtest_validations.php");
include("../include_f1les/functions.php");

?>

<?php include("../include_f1les/include_dbconnectionroot.php");?>
<?php

$errors = array();
$topmessage = "Sign up";
	if (isset($_POST['submit'])){
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$username = $first_name . ".". $last_name;
		$password = $_POST["password"];
		$re_password = $_POST["re_password"];
		$email = $_POST["email"];
		
		//validations
		include("../include_f1les/include_validations.php");
			
				
				
		
				
		if (empty($errors)){
		//escape all strings
	$first_name = mysqli_real_escape_string($connection, $first_name); //used to correct quotaions and symbols into one word
	$last_name = mysqli_real_escape_string($connection, $last_name);
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	$email = mysqli_real_escape_string($connection, $emaill);
	
	$first_name = ucwords($first_name); //used to correct quotaions and symbols into one word
	$last_name = ucwords($last_name);
	$username = ucwords($username);
	
	$hashed_password = password_encrypt($password);
	//2. perform database query
	$query = "INSERT INTO tnfudbsv(firstname, lastname, username, password, email, premium, created)
				VALUES ('{$first_name}', '{$last_name}', '{$username}','{$hashed_password}','{$email}', 0, CURRENT_TIMESTAMP)";
	$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	
		include("../include_f1les/include_secondtable.php");
		//redirect_to("login.php");
		
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	
	}	
		
	}else{
	$first_name = "";
	$last_name = "";
	$email= "";
	$topmessage = "Sign up <br/>";
	$message = "";
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
            <a href="index.php">Home</a> | <a href="login.php">Login</a>
            </div>
            
        </div>
    </div>

<div id="middle">
	<div id="middletopsignup">
    	<div id="message">
        <table  border="0" height="50" width="830">
              
				<tr height="90" >              			
                       <td></td>
                       <td></td>
                       <td></td>
                </tr>
                <tr height="50">              			
                       <td></td>
                       <td>Sign up and track your mobile phone anytime.</td>
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
                
<form action = "signup.php" method = "post">
 <table  border="0" style="border: #000099 1px solid" class="logintable">
		<tr height="50">
		<td>First name:</td>
		<td><input type = "text" name = "first_name" value = "" size="30"/></td>
		</tr>
		<tr height="50">
		<td>Last name:</td>
		<td><input type = "text" name = "last_name" value = "" size="30"/></td>
		</tr>
			
		<tr height="50">
		<td>Password:</td>
		<td><input type = "password" name = "password" value = "" size="30"/></td>
		</tr>
		<tr height="50">
		<td>Re-type password:</td>
		<td><input type = "password" name = "re_password" value = "" size="30"/></td>
		</tr>
		<tr height="50">
		<td>Email Address:</td>
		<td><input type = "text" name = "email" value = "" size="30"/></td>
		</tr>
		<tr height="30">
		<td>&nbsp;</td>
		<td><input type = "submit" name = "submit" value = "Sign up"/></td>
		</tr>
         <tr>
        <td colspan="3"><hr/></td>
        </tr>  
		<tr height="30">
		<td colspan="50">You have an account already? <a href="login.php">login</a>.</td>
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