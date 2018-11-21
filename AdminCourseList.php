<?php
//admin course list
session_start();
if (!(isset($_SESSION['courses']))){
$_SESSION['courses']= array();
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
    <th>CourseNumber</th>
    <th>CourseName</th> 
    <th>InstructorName</th>
    <th>Department</th>
    <th>delete</th>
    <th>edit</th>

  </tr>
  
  <?php
  foreach ($_SESSION['courses'] as $key =>$value) {
    echo "<tr>
      <th>",$key,"</th>
      <th>", $value["CourseName"],"</th>
      <th>",$value["InstructorName"],"</th>
      <th>",$value["Department"],"</th>
      
      <th> <form action='delete.php' method='post'> 
      <input type='hidden' name='PK' value=$key />
      <input type='hidden' name='ARRAY' value='courses'/>
      <input type='submit' value='delete'>
      </form>
      
      </th>
      
      <th> <form action='editcourse.php' method='post'> 
      <input type='hidden' name='courseID' value=$key />
      <input type='submit' value='edit'>
      </form>
      
      </th>
      
    </tr>";

}
?>
</table>
</div>
</body> 
</html> 