<?php
require_once('connection.php');
			$con=Connection::getConnection();
$time=$_GET['time'];
$url=$_SERVER['REQUEST_URI'];
$sql="Insert into track values('$url','101','$time')";
			if(mysqli_query($con,$sql))
	  {
		 
	  
  }
  else
  {
	  
		  
  }
?>