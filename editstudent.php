<?php
//edit student
session_start();
if (!(isset($_SESSION['students']))){
$_SESSION['students']= array();
}
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
echo "<br><p><b>Edit student information of ". $Andrewid .".</b></p>";
if (isset($_SESSION['students'][$Andrewid])){

$StudentFName = $_SESSION['students'][$Andrewid]['StudentFName']; 
$StudentLName = $_SESSION['students'][$Andrewid]['StudentLName']; 
$StudentYear = $_SESSION['students'][$Andrewid]['StudentYear']; 
$Major = $_SESSION['students'][$Andrewid]['Major']; 
$BirthDate= $_SESSION['students'][$Andrewid]['BirthDate']; 
$Password = $_SESSION['users'][$Andrewid]['password'];


echo "<form method='POST' action='editstudentformscript.php'> 
 <input type='hidden' name='Andrewid' value=".$Andrewid."> 
<br/>
Student First Name:	 <input type='text' name='StudentFName' value=".$StudentFName ."> 
<br/>
Student Last Name:   <input type='text' name='StudentLName' value=".$StudentLName ."> 
<br/>
Student Year:        <input type='text' name='StudentYear' value=".$StudentYear ."> 
<br/>
Major:    
  <select name='Major'>
    <option value='IS'>IS</option>
    <option value='BS'>BS</option>
    <option value='CS'>CS</option>
    <option value='BA'>BA</option>
  </select>

<br/>
Birth Date:          <input type='text' name='BirthDate' value=".$BirthDate."> 
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