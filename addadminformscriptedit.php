<?php
// edit user script
session_start();

if(!isset($_SESSION['users'])){
  $_array01= array("type"=>"admin", "password" =>"admin");
  $_SESSION['users'] = array("admin"=> $_array01);
}
?>
<!DOCTYPE html> 
<html> 
<style>
.upper {
margin: auto;

    width: 50%;
    background-color: white;


height: 200px;
    width: 500px;


} 
body{
background-color: DarkRed;
}
</style> 
<head> 
<title></title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
</head> 
<body> 
<div class="upper" align="center">

<a href="http://www.dbproject14.net/Project/AdminHomePage.html">Admin Home Page</a>


<?php

//You do this if no violation of validation
$Andrewid = $_POST['Andrewid']; 

$Password = $_POST['Password'];


if (empty($Andrewid) or empty($Password)){
echo "<br> Fields cannot be empty";
}

else {
$_SESSION['users'][$Andrewid]=array('type'=>'admin', 'password'=>$Password);

echo "<br><p style='color:Tomato;'><b>Admin updated.</b></p>";}
?>
</div>
</body> 
</html> 