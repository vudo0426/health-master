<?php session_start(); ?>
<html>
<head>

<title>Health Shopping Portal With Product Recommendation</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css rel="stylesheet"/>
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
 <script src='js/okzoom.js'></script>
  <script>
    $(function(){
      $('#example').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });

	function adc() {
		//document.getElementById('divatc').innertHTML="Added";
		//alert('Added!!!');
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("cart").innerHTML = xhttp.responseText;
    }
  };

		   alert('Added to Cart!!!');
		   document.getElementById('cartSt').style.display="none";
			var pid=document.getElementById('prid').value;
			xhttp.open("GET", "updateCart.php?pid="+pid, true);
			xhttp.send();

}


  </script>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});

</script>
<style>ul, label {
    margin: 0 50px;
    padding: 0px 5px;
}</style>


<!-- start-smoth-scrolling -->
</head>

<body >
<!-- header -->


	<div class="agileits_header" style="height:46px">



			<form method="post">


					<input type='hidden' name='tme' id='tme'>

					<a href="ProductDisplay.php">
					<button type="submit" name="subm1" style="background: black;border:  black;">
					<i class="fa fa-home" aria-hidden="true" style="color:white;margin-top:15px;font-size:25px"></i>
                   </button></a>


<?php
if(isset($_POST['subm2']) )
{
	$pid=$_GET['id'];
	$val=$_POST['tme'];
	echo "<script>window.location.href='checkout.php?val=$val&pid=$pid';</script>";
}
 if(isset($_POST['subm1']))
 {

	echo "<script>window.location.href='ProductDisplay.php';</script>";
 }

//include("connect.php");
require_once('connection.php');
$con=Connection::getConnection();

  ?>

</div>




            </form>


		<div class="w3l_header_right1">

			<h2><a style='margin-top:-50px' href='logut.php'>Logout</a></h2>


		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });

	});
	</script>
<!-- //script-for sticky-nav -->

<!-- //header -->
<!-- products-breadcrumb -->




	</body>
