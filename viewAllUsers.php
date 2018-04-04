<?php
include('adminHeader.php');
?>
<style>
thead
{
	color:white;
}
</style>
			<hr class="bs-docs-separator">
			<center><table width="80%"><tr><td>
			<div class="bs-docs-example">
				<table class="table table-striped">
					<thead style="background-color:black;color:white">
						<tr>
							<th>User Id</th>
							<th>Name</th>
							<th>Contact No</th>
							<th>Email Id</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sel="select * from login";
								  $rel=$con->query($sel);
								  if(mysqli_num_rows($rel)==0)
								  {
									  echo "<script>alert('No data found')</script>";
								  }
								  else
								  {
										
												
												while($data=mysqli_fetch_array($rel))
												  {
													  $uid=$data['id'];
													  $name=$data['name'];
													  $mob=$data['cont'];
													  $email=$data['email'];
													  $add=$data['address'];
													  echo " <tr>
														<td>".$uid."</td>
														<td>".$name."</td>
														<td>".$mob."</td>
														<td>".$email."</td>
														<td>".$add."</td>
													  </tr>";
												  }
								  }
								  ?>
						</tr>
						
					</tbody>
				</table>
			</div></td></tr></table>
			<br/><br/><br/><br/><br/><br/>
			<?php include('footer.php');  ?>

<script src="js/bootstrap.min.js"></script>

</body>
</html>