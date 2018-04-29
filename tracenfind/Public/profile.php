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
$query = "UPDATE tnfudbsv SET last_login = CURRENT_TIMESTAMP where id = '{$userid}'";
	$result = mysqli_query($connection, $query);
	//test if there was a query error
	if ($result) {
	
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}
	?>
<?php
}
else{?>
<title>profile</title>
<?php
};
?>
</head>
<body>
<?php 
	
?>
<?php 
	
	if (isset($_POST['retrieve']) || isset($firstname)){
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };//for dividing pages into sections
	if (!preg_match('([0-9])',$page)){redirect_to("profile.php");};
	$start_from = ($page-1) * 25; //for dividing pages into sections
	
	$text = "SELECT latitude, longitude, date_time, address, simcard_no, devicetype FROM tnftlidbsv
			 WHERE udb_id = {$userid} ORDER BY id DESC LIMIT {$start_from}, 25"; //for dividing pages into sections
	$result2 = mysqli_query($connection, $text);

	//$saved_text = mysqli_fetch_assoc($result);
	//test if there was a query error
	if ($result2) {
	
		//success
		
		
	}else{
	//failed
	//$message = "subject creation failed"; 
	die("Database query failed.". mysqli_error($connection)); //error here means there was a query error
	}			
	}else{
	
	};
?>
<div id="container">
	<div id ="header">
    	<div id = "headermenu">
        	<div id="logo">
            </div>
            <div id="headerlinks">
           <a href= "account_settings.php">account settings</a> | <a href="logout.php">logout</a><br/>
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
									echo "Welcome <i>{$firstname}</i>, view your phone locations below. "; 
									 
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
        
        
        	<?php
			if($premium != 1){
			?>
            <a href="premium_upgrade.php">Upgrade to premium today!</a>	| <a href="donate.php">Donate!</a>
            <?php
			}else{
			?>
             <a href="premium_unsubscribe.php">Unsubscribe from premium!</a> | <a href="donate.php">Donate!</a>
              <?php 
			  };
			  ?>
         
             
        </div>
    <?php
	if($premium == 1){
	?>
     
     <table border="5px"   bordercolor="#000099" class="logintable" >
<tr class="ltable">
<th class="ltable">Longitude</th>
<th class="ltable">Latitude</th>
<th class="ltable">Time/Date</th>
<th class="ltable">Address</th>
<th class="ltable">Sim Card Number</th>
<th class="ltable">Phonetype</th>
<th class="ltable">Find on Map</th>

</tr>
<?php
//3. use returned data (if any)
if(isset($result2)){
while($saved_text = mysqli_fetch_assoc($result2)){  //fetch row increments row on its own
//var_dump($row);
//sql statement for button goes here
?>
<?php $target = htmlentities("\"target=\"_blank\"\"");?>
<tr height="50" class="ltable">
	<td class="ltable"><?php echo $saved_text["content"];?></td>
	<td class="ltable"><?php echo date("Y/m/d")?></td>
	<td class="ltable"><?php echo date("Y/m/d")?></td>
	<td class="ltable"><?php echo "no 3 lakota street zone 4 abuja"?></td>
	<td class="ltable"><?php echo "46574839892812345673" ?></td>
	<td class="ltable"><?php echo "Htc one m8"?></td>
	<td class="ltable"><?php echo "<a href= \"https://www.google.com/maps/place/"?><?php echo "wuse\""?><?php echo "target=\"_blank\""?><?php echo ">Map</a>"?>  </td>
</tr>
<?php
};}
?>
</table>
       <?php //for dividing pages into sections
$sql = "SELECT COUNT(id) FROM tnftlidbsv where f_id = {$userid} ";  
$rs_result = mysqli_query($connection,$sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];  
$total_pages = ceil($total_records / 25);
if ($page > $total_pages){redirect_to("profile.php");};

for ($i=1; $i<=$total_pages; $i++) {
         if( $page==$i ){
		 echo "<a class=\"linkc\" href='profile.php?page=".$i."'>".$i."</a> ";
		 }else{
		 echo "<a class=\"linkn\" href='profile.php?page=".$i."'>".$i."</a> ";
		 }
               
};

?>
<?php
	}else{
?>

<table border="5px"   bordercolor="#000099" class="logintable" >
<tr class="ltable">
<th class="ltable">Longitude</th>
<th class="ltable">Latitude</th>
<th class="ltable">Time/Date</th>
<th class="ltable">Address</th>


</tr>
<?php
//3. use returned data (if any)
if(isset($result2)){
while($saved_text = mysqli_fetch_assoc($result2)){  //fetch row increments row on its own
//var_dump($row);
//sql statement for button goes here
?>
<?php $target = htmlentities("\"target=\"_blank\"\"");?>
<tr height="50" class="ltable">
	<td class="ltable"><?php echo $saved_text["content"];?></td>
	<td class="ltable"><?php echo date("Y/m/d")?></td>
	<td class="ltable"><?php echo date("Y/m/d")?></td>
	<td class="ltable"><?php echo "no 3 lakota street zone 4 abuja"?></td>
	
</tr>
<?php
};}
?>
</table>
       <?php //for dividing pages into sections
$sql = "SELECT COUNT(id) FROM tnftlidbsv where f_id = {$userid} ";  
$rs_result = mysqli_query($connection,$sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];  
$total_pages = ceil($total_records / 25);
if ($page > $total_pages){redirect_to("profile.php");};

for ($i=1; $i<=$total_pages; $i++) {
         if( $page==$i ){
		 echo "<a class=\"linkc\" href='profile.php?page=".$i."'>".$i."</a> ";
		 }else{
		 echo "<a class=\"linkn\" href='profile.php?page=".$i."'>".$i."</a> ";
		 }
               
};

?>
<?php
	}
?>

    </div>

 
</div>

<div id="footer">
	
</div>

</div>


</body>
</html>