<?php include('connection.php'); 
$con=Connection::getConnection();
?>
<html>
<head>

<title>Online Health Shopping Portal With Product Recommendation</title>
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
	function calctime()
{	var t=setTimeout("calctime()",1000);
    document.getElementById('tme').value=t;
}
</script>
<style>ul, label {
    margin: 0;
    padding: 0px 5px;
}</style>
<!-- start-smoth-scrolling -->
</head>
	
<body onload="calctime(),check()">

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
	<div class="logo_products" style="
    margin-top: -55px;
">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="MainPage.php"><span>Health</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-plus" aria-hidden="true" style="font-size:20px;color:white"></i><a href="productEnter.php">Add Product  |</a></li>
				<li><i class="fa fa-plus" aria-hidden="true" style="font-size:20px;color:white"></i><a href="addHosp.php">Add Hospital  |</a></li>
				<li><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;color:white"></i><a href="editProds.php">View/Edit Products  | 
				</a></li>
				<li><i class="fa fa-id-card-o" aria-hidden="true" style="font-size:20px;color:white"></i><a href="viewAllUsers.php">View Users  |</a></li>
				<li><i class="fa fa-check-square-o" aria-hidden="true" style="font-size:20px;color:white"></i><a href="viewAllOrders.php">View Orders  |</a></li>
				<li><i class="fa fa-home" aria-hidden="true" style="font-size:20px;color:white"></i><a href="logut.php">Logout</a></li>
			</ul>
		</div>
	</div>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	
	
	
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
		

	</body>
	
	
	
	
	