<?php
require_once("../include_f1les/include_session.php"); 
require_once("../include_f1les/include_function.php");
//require_once("../include_f1les/formtest_validations.php");
//include("../include_f1les/functions.php");
/*if(isset($_SESSION['firstname'])){
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];
}else{
$firstname = "";
$userid = "";}*/
$firstname = $_SESSION['firstname'];
$userid = $_SESSION['id'];
$premium = $_SESSION['premium'];
?>
<?php
include("../include_f1les/include_dbconnectionroot.php");
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
           <a href= "profile.php">Profile</a> | <a href="logout.php">Logout</a><br/>
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
								if ($firstname && $userid && $premium == 0 ){
									echo "Upgrade to premium and get more location details."; 
									 
								}else{
									
									redirect_to("login.php"); 	
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
			<div id="controls">
            <b>Upgrade to premium and enjoy more features which will make locating your lost device easier and faster.</b>
            <p><b>Enjoy features like;</b></p> 
            <ul>
            	<li><b>Ability to view the location of the mobile device on a map.</b></li>
            	<li><b>Getting the sim card number of the sim card in the mobile device.</b></li>
                <li><b>The mobile device type.</b></li>
                
             </ul>
            </div>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8EWC3VBWH4Y9N">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>