<?php include('adminHeader.php');  ?>
<style>
.txt
{
     outline: none;
     padding: 10px;
     font-size: 14px;
     color: #212121;
     background: #f5f5f5;
     width: 100%;
     border: 1px solid #E6E6E6;
}
</style>

		<div class="w3l_banner_nav_right">
<!-- mail -->
		<div class="mail">
			<h3 style="padding-right:30%">Product Entry</h3>
			<div class="agileinfo_mail_grids">

				<div class="col-md-8 agileinfo_mail_grid_right">
					<form action="#" method="post" enctype="multipart/form-data">
						<div class="col-md-10 wthree_contact_left_grid">
						<?php
							$sel="select max(id) as max  from product";
							 $res=$con->query($sel);
							   $row = mysqli_fetch_assoc($res);
							   $nid="";
								 if(mysqli_num_rows($res)== 0)
								  {
											$pid="101";
								  }
								  else
								  {
											$pid = $row['max'] + 1;
								  }
							?>

							<input type="text" name="pid" value="<?php echo $pid; ?>"  required>
						<br/><br/>
						</div>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="text" name="pname" value="Product Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
							<br/><br/>
						</div>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="file" name="image" value="Product Image*" accept="image/x-png,image/gif,image/jpeg" class="txt" required="">
							<br/><br/>
						</div>

						<div class="col-md-10 wthree_contact_left_grid">
						<select input class="txt" id='text' type="text" name='company' required>
						<option>Select Category</option>
						<option>Fruits</option>
						<option>Herbs</option>
						<option>Hospitals</option>
						</select><br/><br/></div>


						<div class="col-md-10 wthree_contact_left_grid">
							<input type="number" name="price" placeholder="Product Price*" class="txt" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
							<br/><br/>
						</div>



						<div class="clearfix"> </div>
						<textarea   name="descn" onfocus="this.value = '';"  required="">Product Description...</textarea>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="text" name="dis" placeholder="Diseases*"   required="">
							<br/><br/>
						</div>

						<input type="submit" value="Submit" name="subm">
						<input type="reset" value="Clear">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //mail -->
		</div>
		<div class="clearfix"></div>

<?php
if(isset($_POST['subm']))
{
	$id=$_POST['pid'];

	 $file=$_FILES['image']['tmp_name'];
					  $iname=$_FILES['image']['name'];
					  if(isset($iname))
					  {
							 if(!empty($iname))
							{
							  $location = 'images/';
							 if(move_uploaded_file($file, $location.$iname))
							 {
									 echo 'uploaded';
							 }
							}
					  }
                else
					{
                     echo 'please upload';
                    }

					$img=$iname;
					$name=$_POST['pname'];
					$comp=$_POST['company'];
					$price=$_POST['price'];
					$descn=$_POST['descn'];
					$dis=$_POST['dis'];
					$sql="Insert into product values('$id','$name','$img','$comp','$descn','$price','$dis')";
			if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Product Details submitted succesfully');</script>";
	  }
	  else
	  {
		  echo "<script>alert('Existing Product Id..Please try again');</script>";
	  }
}


include('footer.php');
?>
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
