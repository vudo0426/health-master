<?php
session_start();
$uid=!empty($_SESSION['uid'])?$_SESSION['uid']:'';
require_once('connection.php');
			$con=Connection::getConnection();
$pid=$_GET['pid'];
$sql="Insert into temp1 values('$uid','$pid')";
			if(mysqli_query($con,$sql))
	  {
		  $sel1="select count(*) as cn from temp1 where uid='$uid'";
  $rel1=$con->query($sel1);
  if(mysqli_num_rows($rel1)==0)
  {
	  
  }
  else
  {
	  if($data1=mysqli_fetch_array($rel1))
		  {
			  $cnt=$data1['cn'];
			  
				  echo "<label style='background: #F44336;color: #f9f7f7;border-radius:46px;'>$cnt</label>";
			   
		  }
		  
  }
	  }
	  else
	  {
		  
	  }
	  
  
?>