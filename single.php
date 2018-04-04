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
			
				if(!empty($_GET['type']))
				{
					
				}
				else
				{
				$sel="select * from product where id='$id'";
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
							$desc=$data['desc1'];
							$img="images/".$data['img'];
							$price=$data['price'];
						
			echo "
			<input type='hidden' name='prid' id='prid' value='$id'/>
			<div class='agileinfo_single'>
				<h5>$name</h5>
				<div class='col-md-4 agileinfo_single_left'>
					<img id='example' src='$img'  class='img-responsive' />
				</div>
				<div class='col-md-8 agileinfo_single_right'>
					
					<div class='w3agile_description'>
						<h4>Description :</h4>
						<p>$desc</p>
					</div>
					<div class='snipcart-item block'>
						<div class='snipcart-thumb agileinfo_single_right_snipcart'>
							<h4 style='color:red'>Price: $price</h4>
						</div>
				</div>
				<div class='snipcart-details'>
					<table width='100%'><tr><td width='50%'>	<input type='submit' name='submit' value='Add to cart' class='button' onClick='adc()'/>
						</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td width='50%'>
						<a href='payment.php?id=$id'><input type='button' value='Buy Now' class='button' /></a></td></tr></table></div>
					</div>
				<div class='clearfix'> </div>
			</div>";
			  }
						  
				  }
				}
			?>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>Recommended Products</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					
					<?php
					
					if(empty($_SESSION['pop']) && !empty($_GET['id']))
					{
						$_SESSION['pop']=$_GET['id'].",";
					}
					else
					{
						$gg=$_GET['id'];
						$str=$_SESSION['pop'];
						if(strpos($str,$gg)!==false)
						{
						
						}
						else
						{
							$val=$_SESSION['pop'];
							$_SESSION['pop']=$val."".$_GET['id'].",";
						}
					}
					
					$idds=!empty($_SESSION['pop'])? $_SESSION['pop']:' ';
					
					if($idds!=' ')
					{
						
					$split=explode(",",$idds);
					
					for($i=0;$i<count($split);$i++)
					{
						$val=$split[$i];
					$sel="select * from product where id='$val'";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  //echo "<script>alert('No data found')</script>";
  }
  else
  {
	  while($data=mysqli_fetch_array($rel))
		  {
			  $pid=$data['id'];
			  $name=$data['name'];
			  $price=$data['price'];
			  $img=$data['img'];
				echo "<div class='col-md-3 w3ls_w3l_banner_left'>
						<div class='hover14 column'>
						<div class='agile_top_brand_left_grid w3l_agile_top_brand_left_grid'>
							
							<div class='agile_top_brand_left_grid1'>
								<figure>
									<div class='snipcart-item block'>
										<div class='snipcart-thumb'>
											<a href='single.php?id=$pid'><img src='images/$img' alt=' ' class='img-responsive' style='height:200px'/></a>
											<p>$name</p>
											<h4>Price: $price</h4>
										</div>
										
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>";
		  }
  }
					}
					}
					?>
					
					<div class="clearfix"> </div>
				</div></div></div>
	
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