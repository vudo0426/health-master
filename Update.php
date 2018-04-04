<?php

$id=$_GET['pid'];
$name=$_GET['name'];
$comp=$_GET['comp'];
$desc=$_GET['desc'];
$price=$_GET['price'];

$sql="delete from product where id='$id'";
			if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Product Details submitted succesfully');</script>";
	  }
	  else
	  {
		 // echo "<script>alert('Existing Product Id..Please try again');</script>";
	  }
?>