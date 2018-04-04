<?php
	include('header2.php');
require_once('connection.php');
			$con=Connection::getConnection();


	if(isset($_POST['login']))
	{
		 $uname=$_POST['Username'];
		   $pass=$_POST['Password'];
		   if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill id and Password');</script>";
			   }
			   else
			   {
				   if($uname=="admin" && $pass="admin")
				   {
					   $_SESSION['type']="admin";
					   echo "<script>window.location.href='productEnter.php'</script>";
				   }
				   else
				   {
					   $sel="select * from login where id='$uname' and pass='$pass'";
					   $result=$con->query($sel);

							if($row=mysqli_fetch_array($result))
						   {
							   $_SESSION['uname']=$row['name'];
									$_SESSION['uid']=$uname;
									$uid= $_SESSION['uid'];
									$_SESSION['type']="user";
									echo "<script>window.location.href='ProductDisplay.php?catg=Fruits'</script>";
									echo "<script>document.getElementById('logn').style.display='none';</script>";
							}
							else
							{
								echo "<script>alert('Invalid Username or Password');</script>";
							}
				   }
				}
	}

	if(isset($_POST['reg']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$cont=$_POST['cont'];
		$addr=$_POST['addr'];
		$uid=$_POST['uid'];
		$pwd=$_POST['pwd'];

		$hashed = hash('sha512',$pwd);



			$sql="Insert into login values('$name','$email','$cont','addr','$uid','$hashed')";
			if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Details submitted succesfully');</script>";
	  }
	  else
	  {
		  echo "<script>alert('Existing User Id..Please try again');</script>";
	  }
	}
   ?>

<!-- banner -->


	<div class="banner">

		<div class="w3l_banner_nav_right" style="width:100%">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">


							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">


							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">


							</div>
						</li>
					</ul>
				</div>
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
		<div class="w3_login" id="logn" style='margin-top:-100px'>
			<h4 style='font-size:25px;color:red;text-align:center'>Sign In & Sign Up</h4>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>

				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form method="post">
					  <input type="text" name="Username" placeholder="Username" required=" ">
					  <input type="password" name="Password" placeholder="Password" required=" ">
					  <input type="submit" value="Login" name="login">
					</form>
				  </div>
				  <div class="form">
					<form  method="post">
					  <input type="text" name="name" placeholder="Name" required=" ">
					   <input type="email" name="email" placeholder="Email Address" required=" ">
					  <input type="text" name="cont" placeholder="Phone Number" pattern="[0-9]{10}"  required=" ">
					  <input type="text" name="addr" placeholder="Address" required=" ">
					  <input type="text" name="uid" placeholder="User Id" required=" ">
					  <input type="password" name="pwd" placeholder="Password" required=" ">
					  <input type="submit" value="Register" name="reg">
					</form>
				  </div>

				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>

	</div>

<!-- banner -->
	<?php

if(!empty($_SESSION['uid']))
{
	echo "<script>document.getElementById('logn').style.display='none';</script>";
}
else
{
	echo "<script>document.getElementById('logn').style.display='block';</script>";
}
	include('footer.php');  ?>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>
