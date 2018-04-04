<?php 
session_start();
include('connection.php'); 
$con=Connection::getConnection();

$user=!empty($_SESSION['uid'])?$_SESSION['uid']:' ';
if($user==' ')
{
	echo "<script>alert('Login First!!!');</script>";
	echo "<script>window.location.href='MainPage.php';</script>";
	
}


if(isset($_POST['cod']))
{
	$uid=!empty($_SESSION['uid'])?$_SESSION['uid']:'';
	$uname=!empty($_SESSION['uname'])?$_SESSION['uname']:'';
	
	
	$pid=!empty($_GET['id'])?$_GET['id']:'';
	
	if($pid=='')
	{
		$sel="select name,price from product where id in (select pid from temp1 where uid='$uid')";
				$rel=$con->query($sel);
				if(mysqli_num_rows($rel)==0)
				{
					echo "<script>alert('No data found')</script>";
				}
			else
			{
				while($data=mysqli_fetch_array($rel))
					{
						$pr=$data['price'];
						$pname.=$data['name'].", ";
						$sum=$sum+$pr;
					}
					
					$sql="Insert into payment values('$uid','$uname','$pname','$sum')";
					if(mysqli_query($con,$sql))
					{
						 echo "<script>alert('Payment Done');</script>";
					}
					
					$sqld="delete from temp1";
					if(mysqli_query($con,$sqld))
					{
						 //echo "<script>alert('Payment Done');</script>";
					}
			}
	}
	else
	{
		
	$sel="select name,price from product where id ='$pid'";
				$rel=$con->query($sel);
				if(mysqli_num_rows($rel)==0)
				{
					echo "<script>alert('No data found')</script>";
				}
			else
			{
				if($data=mysqli_fetch_array($rel))
					{
						$pname=$data['name'];
						$price=$data['price'];
	
	$sql="Insert into payment values('$uid','$uname','$pname','$price')";
					if(mysqli_query($con,$sql))
					{
						 echo "<script>alert('Payment Done');</script>";
					}
					}
					
	
}
	}
echo "<script>window.location.href='MainPage.php';</script>";
}

if(isset($_POST['pay']))
{
	$uid=!empty($_SESSION['uid'])?$_SESSION['uid']:'';
	$uname=!empty($_SESSION['uname'])?$_SESSION['uname']:'';
	$pid=$_GET['id'];
	
	if(empty($_GET['id']))
	{
		$pname="";
		$sum=0;
				$sel="select name,price from product where id in (select pid from temp1 where uid='$uid')";
				$rel=$con->query($sel);
				if(mysqli_num_rows($rel)==0)
				{
					echo "<script>alert('No data found')</script>";
				}
			else
			{
				while($data=mysqli_fetch_array($rel))
					{
						$pr=$data['price'];
						$pname.=$data['name'].", ";
						$sum=$sum+$pr;
					}
					
					$sql="Insert into payment values('$uid','$uname','$pname','$sum')";
					if(mysqli_query($con,$sql))
					{
						 echo "<script>alert('Payment Done');</script>";
					}
					
					$sqld="delete from temp1";
					if(mysqli_query($con,$sqld))
					{
						 //echo "<script>alert('Payment Done');</script>";
					}
					
			}
			

	}
		else
	{
		
	$sel="select name,price from product where id ='$pid'";
				$rel=$con->query($sel);
				if(mysqli_num_rows($rel)==0)
				{
					echo "<script>alert('No data found')</script>";
				}
			else
			{
				if($data=mysqli_fetch_array($rel))
					{
						$pname=$data['name'];
						$price=$data['price'];
	
	$sql="Insert into payment values('$uid','$uname','$pname','$price')";
					if(mysqli_query($con,$sql))
					{
						 echo "<script>alert('Payment Done');</script>";
					}
					}
					
	
}
	}
	
	echo "<script>window.location.href='MainPage.php';</script>";
}
?>
?>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css rel="stylesheet"/>
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<style>
.resp-tab-content {
    
    padding: 104px 60px;
}
</style>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		
		<div class="w3l_banner_nav_right">
<!-- payment -->
		<div class="privacy about">
			<h3>Pay<span>ment</span></h3>
			
	         <div class="checkout-right">
				<!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
				<li>Cash on delivery (COD)</li>
                <li>Credit/Debit</li>
               
            </ul>
            <div class="resp-tabs-container hor_1">

				<div>
                                     <div class="vertical_post check_box_agile">
										<h5>COD</h5>
											<div class="checkbox">								
												<div class="check_box_one cashon_delivery">
													<label class="anim">
																<input type="checkbox" class="checkbox">
																 <span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span> 
															</label> 
															
															<form  method="post" >
															<input type="submit" class="submit" name="cod" id="cod" style="display: block;
    position: relative;
    padding: 6px 50px 11px;
    letter-spacing: 3px;
    background: #84c639;
    font-size: 1.5em;
    color: #fff;
    font-weight: 500;
    border: none;
    outline: none;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    text-transform: uppercase;" value="COD" required></form>
												<br/><br/>			
											</div>
											
									</div>
								</div>
                </div>
                <div>
                    <form  method="post" >
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="credit-card-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Name on Card</label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith" required>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="controls">
													<label class="control-label">Card No</label>
													<input class="billing-address-name form-control" inputmode="numeric" type="text" placeholder="Enter 16 digit Card No" name="name" pattern="[0-9]{16}"  required>
												</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">CVV</label>
															<input class="security-code form-control"Â·
																		  inputmode="numeric"
																		  type="text" name="security-code"
																		  placeholder="&#149;&#149;&#149;" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Expiration Date</label>
													<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
												</div>
											</div>
											<input type="submit" class="submit" name="pay" id="pay" style="    display: block;
    position: relative;
    padding: 6px 50px 11px;
    letter-spacing: 3px;
    background: #84c639;
    font-size: 1.5em;
    color: #fff;
    font-weight: 500;
    border: none;
    outline: none;
    transition: 0.5s all;
    -webkit-transition: 0.5s all;
    -moz-transition: 0.5s all;
    -o-transition: 0.5s all;
    -ms-transition: 0.5s all;
    text-transform: uppercase;" value="MAKE PAYMENT" required>
										</div>
									</section>
								</form>

                </div>
              
                
                
            </div>
        </div>
	
	<!--Plug-in Initialisation-->

	<!-- // Pay -->
	
			 </div>

		</div>
<!-- //payment -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->


<!-- footer -->
	<?php 
	include('footer.php');
	?>
		</div>
	</div>
<!-- //footer -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- easy-responsive-tabs -->    
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<!-- //easy-responsive-tabs --> 
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
        <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function() {
			  var creditly = Creditly.initialize(
				  '.creditly-wrapper .expiration-month-and-year',
				  '.creditly-wrapper .credit-card-number',
				  '.creditly-wrapper .security-code',
				  '.creditly-wrapper .card-type');

			  $(".creditly-card-form .submit").click(function(e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
				  // Your validated credit card output
				  console.log(output);
				}
			  });
			});
		</script>
	<!-- //credit-card -->

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
</html>