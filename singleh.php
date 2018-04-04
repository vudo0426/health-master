<?php
include('head.php');
$user=!empty($_SESSION['uid'])?$_SESSION['uid']:' ';
if($user==' ')
{
	echo "<script>alert('Login First!!!');</script>";
	echo "<script>window.location.href='MainPage.php';</script>";
	
}
$id=$_GET['id'];

?>



	<div class="banner">
		
		<div class="w3l_banner_nav_right">
			
			
			<?php
			
				
				$sel="select * from hospitals where hid='$id'";
				  $rel=$con->query($sel);
				  if(mysqli_num_rows($rel)==0)
				  {
					  //echo "<script>alert('No data found')</script>";
				  }
				  else
				  {
					  if($data=mysqli_fetch_array($rel))
						  {
							$name=$data['name'];  
							$desc=$data['info'];
							$img="images/".$data['image'];
							$address=$data['address'];
						
			echo "
			<input type='hidden' name='prid' id='prid' value='$id'/>
			<div class='agileinfo_single'>
				<h5>$name</h5>
				<div class='col-md-4 agileinfo_single_left'>
					<img id='example' src='$img'  class='img-responsive' />
				</div>
				<div class='col-md-8 agileinfo_single_right'>
					
					<div class='w3agile_description'>
						<h4>About Us :</h4>
						<p>$desc</p>
					</div>
					<div class='snipcart-item block'>
						<div class='snipcart-thumb agileinfo_single_right_snipcart'>
							<h4 style='color:#191970'>Address: $address</h4>
						</div>
				</div>
				<div class='snipcart-details'>
					</div>
					</div>
				<div class='clearfix'> </div>
			</div>";
			  }
						  
				  }
				
			?>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

	
	<?php
	include('footer.php');
	?>
	</body>

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

</html>