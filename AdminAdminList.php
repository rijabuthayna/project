<?php
//admin admin list
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
    width: 900px;

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


	<table style="width:100%">
  <tr>
    <th>Andrewid</th>
    <th>Password</th>
    <th>delete</th>
    <th>edit</th>
  </tr>
  
  <?php
  foreach ($_SESSION['users'] as $key =>$value) {
    if ($_SESSION['users'][$key]['type']=='admin'){
    echo "<tr>
      <th>",$key,"</th>

      <th>",$_SESSION['users'][$key]['password'],"</th>
      
      <th> <form action='delete.php' method='post'> 
      <input type='hidden' name='PK' value=$key />
      <input type='hidden' name='ARRAY' value='users'/>
      <input type='submit' value='delete'>
      </form>
      
      </th>
      
      <th> <form action='edituser.php' method='post'> 
      <input type='hidden' name='andrewID' value=$key />
      <input type='submit' value='edit'>
      </form>
      
      </th>
      
      
    </tr>";
    }

}
?>
</table>
</div>
</body> 
</html> 