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
									echo "Welcome to premium enjoy all features!"; 
									
												$query = "UPDATE tnfudbsv SET premium = 0 WHERE id = '{$userid}'";
												$result = mysqli_query($connection, $query);
												//test if there was a query error
												if ($result) {
																								
												}else{
												//failed
												//$message = "subject creation failed"; 
												die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
												}
									 
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


    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>