<?php 
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

height: 120px;
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


<?php 
$andrewID = $_POST['AndrewID']; 
$password = $_POST['Password']; 

//this error is true if username does not exist
$err01 = false;
$err01S = " "; 
//this error is true if passwords does not match username
$err02 = false;
$err02S = " "; 

if(!isset($_SESSION['users'][$andrewID])){
  $err01 = true;
  $err01S = "Andrew ID does not exist <br>"; 
}

if (isset($_SESSION['users'][$andrewID]) and $password != $_SESSION['users'][$andrewID]['password']){
  $err02 = true;
  $err02S = "Password does not match Andrew ID"; 
}



if ($err01==false and $err02==false){
  $type = $_SESSION['users'][$andrewID]['type'];
  
  //temporary we might think of a better way of doing this
  $_SESSION['userID']=$andrewID;
  //temporary we might think of a better way of doing this
  
  echo "<h3> Welcome " . $type  . " <br> </h3>"; 

  if ($type == 'student'){
  //insert link to student link page
    echo "<h3> <a href='http://www.dbproject14.net/Project/StudentHomePage.html'>Click here to continue</a> </h3>";
  }
  if ($type =='admin'){
  //insert link to admin link page
    echo "<h3> <a href='http://www.dbproject14.net/Project/AdminHomePage.html'>Click here to continue</a> </h3>";
  }
}
echo $err01S;
echo $err02S;
echo "<a href='http://www.dbproject14.net/Project/login.html'>Go back to Login</a>";

?>
</div>
</body> 
</html> 