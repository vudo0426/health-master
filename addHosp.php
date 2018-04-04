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
			<h3 style="padding-right:30%">Hospital Entry</h3>
			<div class="agileinfo_mail_grids">

				<div class="col-md-8 agileinfo_mail_grid_right">
					<form action="#" method="post" enctype="multipart/form-data">
						<div class="col-md-10 wthree_contact_left_grid">
						<?php
							$sel="select max(hid) as max  from hospitals";
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

							<input type="text" name="hid" value="<?php echo $pid; ?>"  required>
						<br/><br/>
						</div>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="text" name="hname" value="Hospital Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required>
							<br/><br/>
						</div>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="text" name="address" value="Hospital Address*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address*';}" required="">
							<br/><br/>
						</div>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="file" name="image" value="Hospital Image*" accept="image/x-png,image/gif,image/jpeg" class="txt" required="">
							<br/><br/>
						</div>


						<div class="col-md-10 wthree_contact_left_grid">
							<input type="text" name="contact" value="Hospital Contact*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Hospital Contact*';}"  pattern="[0-9]{10}" required="">
							<br/><br/>
						</div>

						<div class="clearfix"> </div>
						<textarea   name="info" value="Hospital Information*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Hospital Information*';}"  required="">Hospital Information...</textarea>

						<div class="col-md-10 wthree_contact_left_grid">
							<input type="text" name="dis" value="Diseases*"   onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Diseases*';}" required="">
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
	$id=$_POST['hid'];

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
					$name=$_POST['hname'];
					$address=$_POST['address'];
					$contact=$_POST['contact'];
					$info=$_POST['info'];
					$dis=$_POST['dis'];
					$sql="Insert into hospitals values('$id','$name','$img','$address','$contact','$info','$dis')";
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
