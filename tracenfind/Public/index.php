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
	
	
	}
	?>
    
<!DOCTYPE HTML>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="login.php">Login</a> | <a href="signup.php">Sign up</a>
            </div>
            
        </div>
    </div>

<div id="middle">
	<div id="middletop">
    <p><h2>Find it allows you to find your android phone anywhere it is!</h2> </p> 
                        <p><h4>Sign up for a free account on find it.com then download and install the find it app from google play store, input your account details on the find it app and never have to worry about your android phone getting missing for a long time! its very simple to use! </h4> </p>
    </div>
     <div id="middlebottom">
            <div id="middlebottomleft">
            			<p><h2>Step 1</h2></p>
                        <p>Create a free account on findit.com with all details intact</p>
            </div>
            <div id="middlebottomcenter">
            			<p><h2>Step 2</h2></p>
                        <p>Download the findit app from google play store and fill in your account information</p>
            </div>
            <div id="middlebottomright">
            			<p><h2>Step 3</h2></p>
                        <p>Login to findit.com and get details of your phones current and previous locations</p>
            </div>
    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>