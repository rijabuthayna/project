<?php
//admin registration list
session_start();
if (!(isset($_SESSION['regs']))){
$_SESSION['regs']= array();
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
    <th>Andrew ID</th> 
    <th>CourseNumber</th>
    <th>Enter Course number to drop</th> 
    <th>Delete all</th> 



  </tr>
  
  <?php
  foreach ($_SESSION['regs'] as $key =>$value) {
    echo "<tr>
      <th>",$key,"</th><th>";
      foreach ($value as $value2){
      echo $value2,", ";
    }
    echo "</th>
      <th> <form action='deleteReg.php' method='post'> 
      <input type='hidden' name='PK' value=$key />
      <input type='text' name='CourseNumber'/>
      <input type='submit' value='drop'>
      </form>
      
      </th>
      
      <th> <form action='delete.php' method='post'> 
      <input type='hidden' name='PK' value=$key />
      <input type='hidden' name='ARRAY' value='regs'/>
      <input type='submit' value='delete'>
      </form>
      
      </th>

      
    </tr>";

}
?>
</table>
</div>
</body> 
</html> 