<?php
//esit users
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


height: 1200px;
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
$Andrewid = $_POST['andrewID']; 
echo "<br><p><b>Edit admin information of ". $Andrewid .".</b></p>";
if (isset($_SESSION['users'][$Andrewid])){

$Password = $_SESSION['users'][$Andrewid]['password'];


echo "<form method='POST' action='addadminformscriptedit.php'> 
 <input type='hidden' name='Andrewid' value=".$Andrewid."> 
<br/>

Password:          <input type='text' name='Password' value=".$Password."> 
<br/> 
<input type='submit' value='Submit'> 
</form>";




}
else {
echo "<br><p><b>Error Andrew ID not set.</b></p>";
}




?>
</div>
</body> 
</html> 