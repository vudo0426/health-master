<?php
session_start();
session_destroy();
$sql="delete from temp1";
			if(mysqli_query($con,$sql))
	  {
		  //echo "<script>alert('Product Details submitted succesfully');</script>";
	  }
	  else
	  {
		 // echo "<script>alert('Existing Product Id..Please try again');</script>";
	  }


header("Location:MainPage.php");
?>