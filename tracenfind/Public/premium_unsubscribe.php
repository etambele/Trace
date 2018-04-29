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
								if ($firstname && $userid && $premium == 1){
									echo "Your are about to unsubscribe from premium"; 
									 
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
            <b><h3>We are so sad to find out you wish to unsubscribe from premium, we hope you reconsider subscribing again someday.</h3></b>
            <p><b>Unsubscribing from premium will make you lose all premium features, click on the button below to unsubscribe</b></p>
            </div>
					
         <A HREF="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=Z7HC4BVC9WNLN">
<IMG SRC="https://www.paypalobjects.com/en_US/i/btn/btn_unsubscribe_LG.gif" BORDER="0">
</A>

    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>