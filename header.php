<?php session_start(); ?>
	<form method="post" name="form2">

<input type='hidden' name='tme' id='tme'>


</form>
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

function check()
{
	var url=document.referrer;
	if(url.includes("single.php"))
	{
		//alert(url)

		var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("cart").innerHTML = xhttp.responseText;
    }
  };


			var time=document.getElementById('tme').value;
			xhttp.open("GET", "timeSpent.php?time="+time, true);
			xhttp.send();
	}


}

  </script>


    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
    <style>
        h1 {
            font-size: 18px;
            color: #111;
        }

        .content {
            width: 80%;
            margin: 0 auto;
            margin-top: 50px;
        }


        .tt-hint,
        .search {

        }

        .tt-dropdown-menu {
            width: 400px;
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
        }
    </style>
    <script>
        $(document).ready(function() {

            $('input.search').typeahead({
                name: 'search',
                remote: 'city.php?query=%QUERY'

            });

        })
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
<!-- header -->


	<div class="agileits_header" style="height:46px">

		<div class="w3l_search">
			<form  method="post">
				<table width='100%'><tr><td><input type="text" name="search"  style="width:100%"   required=""></td><td>
				<input type="submit" value="SEARCH" style="width:60px;color:white;border:0" name="srch"></td></tr></table>
			</form>
		</div>
		<div class="product_list_header">

                <fieldset>

                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />

					<a href="checkout.php">
                   <i class="fa fa-shopping-cart" aria-hidden="true" style="color:white;margin-top:15px;font-size:18px"></i></a>
				   <div id="cart" style="
    padding-right: 5px;
    margin-top: -30px;
    margin-left: 20px;
"></div>

<div id="cartSt"  style="background:red;
    padding-right: 5px;
    margin-top: -30px;
    margin-left: 20px;
">
<?php
$uid=!empty($_SESSION['uid'])?$_SESSION['uid']:'';
require_once('connection.php');
			$con=Connection::getConnection();
 $sel1="select count(*) as cn from temp1 where uid='$uid'";
  $rel1=$con->query($sel1);
  if(mysqli_num_rows($rel1)==0)
  {

	  echo "<label style='background: #F44336;color: #f9f7f7;border-radius:46px;'>0</label>";

  }
  else
  {
	  if($data1=mysqli_fetch_array($rel1))
		  {
			  $cnt=$data1['cn'];

				  echo "<label style='background: #F44336;color: #f9f7f7;border-radius:46px;'>$cnt</label>";

		  }

  }


  ?>

</div>



                </fieldset>

		</div>
		<?php if(empty($_SESSION['uid']))
							{?>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">


								<li><a href='MainPage.php'>Login</a></li>


							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<?php  }
		else
		{
							?>
		<div class="w3l_header_right1">

			<h2><a  href='logut.php'>Logout</a></h2>

		</div>			<?php
}
?>
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

<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="MainPage.php">Home</a></li>

			</ul>
		</div>
	</div>



	</body>
