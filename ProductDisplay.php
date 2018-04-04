<?php
	include('header.php');

?>
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
		
 <script>
        $(document).ready(function() {

            $('input.search').typeahead({
                name: 'search',
                remote: 'city.php?query=%QUERY'

            });

        })
    </script>
	
	
	<div class="top-brands">
		<div class="container">
			
			<div class="agile_top_brands_grids">
			
			<?php
			require_once('connection.php');
			$con=Connection::getConnection();
			
			if(!isset($_POST['srch']))
			{
			$catg=!empty($_GET['catg'])?$_GET['catg']:' ';
			$sel="";
			
			
			if($catg=="Herbs")
			{
				$sel="select * from product where catg='Herbs'";
			}
			else
				if($catg=="Fruits")
				{
					$sel="select * from product where catg='Fruits'";
				}
				else
					if($catg=="Hospitals")
					{
						$sel="select * from hospitals";
					}
				else
				{
					$sel="select * from product";
				}
				
			if($catg!="Hospitals")
			{
				  $rel=$con->query($sel);
				  if(mysqli_num_rows($rel)==0)
				  {
					  echo "<script>alert('No data found')</script>";
				  }
				  else
				  {
					  while($data=mysqli_fetch_array($rel))
						  {
							  $pid=$data['id'];
							  $name=$data['name'];
							  $price=$data['price'];
							  $img=$data['img'];
				echo "<div class='col-md-3 top_brand_left'>
					<div class='hover14 column'>
						<div class='agile_top_brand_left_grid'>
							
							<div class='agile_top_brand_left_grid1'>
								<figure>
									<div class='snipcart-item block' >
										<div class='snipcart-thumb'>
											<a href='single.php?id=$pid'><img   src='images/$img' height='200' /></a>		
											<p>$name</p>
											<h4>Price :USD $price</h4>
										</div>
										<div class='snipcart-details top_brand_home_details'>
											<form action='checkout.html' method='post'>
												<fieldset>
													<input type='hidden' name='cmd' value='_cart' />
													<input type='hidden' name='add' value='1' />
													<input type='hidden' name='business' value=' ' />
													<input type='hidden' name='item_name' value='$name' />
													<input type=
													'hidden' name='amount' value='$price' />
													
													<a href='single.php?id=$pid'><input type='button' value='View Details' class='button' />
												</fieldset>
													
											</form>
									
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
				
				else
				{
					 $rel=$con->query($sel);
					  if(mysqli_num_rows($rel)==0)
					  {
						  echo "<script>alert('No data found')</script>";
					  }
					  else
					  {
						  while($data=mysqli_fetch_array($rel))
							  {
								  $img=$data['image'];
								  $name=$data['name'];
								  $hid=$data['hid'];
								  echo "<div class='col-md-3 top_brand_left'>
					<div class='hover14 column'>
						<div class='agile_top_brand_left_grid'>
							
							<div class='agile_top_brand_left_grid1'>
								<figure>
									<div class='snipcart-item block' >
										<div class='snipcart-thumb'>
											<a href='single.php?id=$hid'><img   src='images/$img' style='height:200px'/></a>		
											<p>$name</p>
											
										</div>
										<div class='snipcart-details top_brand_home_details'>
											<form action='checkout.html' method='post'>
												<fieldset>
													<input type='hidden' name='cmd' value='_cart' />
													<input type='hidden' name='add' value='1' />
													<input type='hidden' name='business' value=' ' />
													<input type='hidden' name='item_name' value='$name' />
													
													
													<a href='singleh.php?id=$hid&type=hospitals'><input type='button' value='View Details' class='button' />
												</fieldset>
													
											</form>
									
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
				
				
				if(isset($_POST['srch']))
  {
	  $sval=$_POST['search'];
	 
	  $_SESSION['sval']=$sval;
	  
	  if(!empty($_GET['catg']))
	  {
		  $type=$_GET['catg'];
	  
			if($type=="Hospitals")
			{
		  $sql="select * from hospitals where  name like '%$sval%'  or dis like '%$sval%'";
			}
			else
				
			{
				$sql="select * from product where catg='$type' and name like '%$sval%' or diseases like '%$sval%'";
			}
	  }
	  else
	  {
		 
			$type="";
				$sql="select * from product where  name like '%$sval%' or catg like '%$sval%'";
			
			
	  }
			
			if($type=="Hospitals")
			{
			$rel=$con->query($sql);
					  if(mysqli_num_rows($rel)==0)
					  {
						  echo "<script>alert('No data found')</script>";
					  }
					  else
					  {
						  while($data=mysqli_fetch_array($rel))
							  {
								  $img=$data['image'];
								  $name=$data['name'];
								  $hid=$data['hid'];
								  echo "<div class='col-md-3 top_brand_left'>
					<div class='hover14 column'>
						<div class='agile_top_brand_left_grid'>
							
							<div class='agile_top_brand_left_grid1'>
								<figure>
									<div class='snipcart-item block' >
										<div class='snipcart-thumb'>
											<a href='singleh.php?id=$hid'><img   src='images/$img' style='height:150px' /></a>		
											<p>$name</p>
											
										</div>
										<div class='snipcart-details top_brand_home_details'>
											<form action='checkout.html' method='post'>
												<fieldset>
													<input type='hidden' name='cmd' value='_cart' />
													<input type='hidden' name='add' value='1' />
													<input type='hidden' name='business' value=' ' />
													<input type='hidden' name='item_name' value='$name' />
													
													
													<a href='singleh.php?id=$hid&type=hospitals'><input type='button' value='View Details' class='button' />
												</fieldset>
													
											</form>
									
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
	  else
	  {
		  $rel=$con->query($sql);
		   if(mysqli_num_rows($rel)==0)
					  {
						  echo "<center><label style='color:red'>No Data Found</center>";
					  }
					  else
					  {
		  while($data=mysqli_fetch_array($rel))
						  {
							  $pid=$data['id'];
							  $name=$data['name'];
							  $price=$data['price'];
							  $img=$data['img'];
				echo "<div class='col-md-3 top_brand_left'>
					<div class='hover14 column'>
						<div class='agile_top_brand_left_grid'>
							
							<div class='agile_top_brand_left_grid1'>
								<figure>
									<div class='snipcart-item block' >
										<div class='snipcart-thumb'>
											<a href='single.php?id=$pid'><img   src='images/$img' height='200' /></a>		
											<p>$name</p>
											<h4>Price :USD $price</h4>
										</div>
										<div class='snipcart-details top_brand_home_details'>
											<form action='checkout.html' method='post'>
												<fieldset>
													<input type='hidden' name='cmd' value='_cart' />
													<input type='hidden' name='add' value='1' />
													<input type='hidden' name='business' value=' ' />
													<input type='hidden' name='item_name' value='$name' />
													<input type=
													'hidden' name='amount' value='$price' />
													
													<a href='single.php?id=$pid'><input type='button' value='View Details' class='button' />
												</fieldset>
													
											</form>
									
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
			</div>
		</div>
	</div>
	
	<?php
	include('footer.php');
	?>
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
