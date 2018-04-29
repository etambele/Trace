<?php
function hello($name){
return "Hello {$name}!";
}

function redirect_to($newlocation){
header("location: " . $newlocation);
exit;
}

?>
