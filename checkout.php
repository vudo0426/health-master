<?php 
include('header.php');  
$user=!empty($_SESSION['uid'])? $_SESSION['uid']:' ';
	/*if(!empty($_GET['val']))
	{
		$time=$_GET['val'];
		$pid=$_GET['pid'];
	$sql="Insert into track values('$pid','$user','$time')";
			if(mysqli_query($con,$sql))
		{
		 
	  
		}
	else
		{
	  
		  $sel1="select *   from track where uid='$user' & pid=$pid";
			  $rel1=$con->query($sel1);
			  if(mysqli_num_rows($rel1)==0)
			  {
				  $sql="update track set time='$time' where pid=$pid and uid='$user'";
					if(mysqli_query($con,$sql))
						{
						 
					  
						}
			  }
		  
		}
	}*/
?>
<!-- //header -->
<!-- products-breadcrumb -->
	
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="ProductDisplay.php?catg=Fruits">Fruits</a></li>
						<li><a href="ProductDisplay.php?catg=Herbs">Herbs</a></li>						
						<li><a href="ProductDisplay.php?catg=Hospitals">Hospitals</a></li>
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart:</h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							
							<th>Product Name</th>
						
							<th>Price</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					//include('connect.php');
						$sel="select * from product where id in (select pid from temp1 where uid='$user')";
						  $rel=$con->query($sel);
						  if(mysqli_num_rows($rel)==0)
						  {
							  echo "<script>alert('No Item in Cart!')</script>";
							  echo "<script>window.location.href='ProductDisplay.php'</script>";  
						  }
						  else
						  {$i=1;
							  while($data=mysqli_fetch_array($rel))
								  {
									$pid=$data['id'];
									$name=$data['name'];
									$price=$data['price'];
									$img=$data['img'];
						echo"<tr class='rem'>
						<td class='invert'>$i</td>
						<td class='invert-image'><a href=''><img src='images/$img'  class='img-responsive'></a></td>
						
						<td class='invert'>$name</td>
						
						<td class='invert'>$price</td>
						
					</tr>";
					$i++;
								  }
						  }
						  ?>

				</tbody></table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
					<?php
					$sel="select * from product where id in (select pid from temp1)";
						  $rel=$con->query($sel);
						  if(mysqli_num_rows($rel)==0)
						  {
							  echo "<script>alert('No data found')</script>";
						  }
						  else
						  {$i=1;
					  $sum=0;
							  while($data=mysqli_fetch_array($rel))
								  {
									  $pid=$data['id'];
									$name=$data['name'];
									$price=$data['price'];
									$sum=$sum+$price;
									$img=$data['img'];
									echo"<li>$name<i>-</i> <span>$price </span></li>";
								  }
								  echo "<li>Total <i>-</i> <span>$sum</span></li>";
						  }
						  ?>
						
						
						
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  
									<div class="checkout-right-basket">
				        	<a href="payment.php">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>

	
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
							 <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script>
							<script>$(document).ready(function(c) {
								$('.close2').on('click', function(c){
									$('.rem2').fadeOut('slow', function(c){
										$('.rem2').remove();
									});
									});	  
								});
						   </script>
						  	<script>$(document).ready(function(c) {
								$('.close3').on('click', function(c){
									$('.rem3').fadeOut('slow', function(c){
										$('.rem3').remove();
									});
									});	  
								});
						   </script>

<!-- //js -->
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
<!-- start-smoth-scrolling -->
<!-- Bootstrap Core JavaScript -->
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