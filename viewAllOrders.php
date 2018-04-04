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
							
							<th>Name</th>
							<th>Products</th>
							<th>Total Price</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
							$sel="select * from payment";
								  $rel=$con->query($sel);
								  if(mysqli_num_rows($rel)==0)
								  {
									  echo "<script>alert('No data found')</script>";
								  }
								  else
								  {
										
												
												while($data=mysqli_fetch_array($rel))
												  {
													  
													  $name=$data['name'];
													  $prods=$data['pnames'];
													  $tp=$data['price'];
													  
													  echo " <tr>
														
														<td>".$name."</td>
														<td>".$prods."</td>
														<td>".$tp."</td>
														
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