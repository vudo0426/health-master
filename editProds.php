<?php
session_start();
include('adminHeader.php');
$adm=!empty($_SESSION['type'])?$_SESSION['type']:' ';
 if($adm!=' ')
{ 

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
     $start_from = ($page-1) * 8; 
	 ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 <style>
  ul.pagination pagination-lg li a.active {
    background-color: #4CAF50;
    color: white;
}
  </style>


<style type="text/css">
.txt
{
	width:200px;
	height:28px;
	-webkit-border-radius: 10px;
-moz-border-radius: 10px;
	transition: all 0.5s ease 0s;
}

.txt:hover
{
	box-shadow:3px 3px black;
	border:1px solid maroon;
}
.status
{
	width:100px;
	height:28px;
	-webkit-border-radius: 10px;
   -moz-border-radius: 10px;
     border:2px solid black;
}

.status:hover
{
	width:125px;
	height:27px;
	background:maroon;
	color:white;
	-webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border:1px solid black;
}
table.hovertable {
 font-family: verdana,arial,sans-serif;
 font-size:13px;
 color:#333333;
 border-width: 1px;
 border-color: #999999;
 border-collapse: collapse;
}
table.hovertable th {
 background-color:darkgrey;
 color:white;
 border-width: 1px;
 padding: 8px;
 border-style: solid;
 border-color: #a9c6c9;
}
table.hovertable tr {
 background-color:white;
 color:maroon;
}
table.hovertable td {
 border-width: 1px;
 padding: 8px;
 border-style: solid;
 border-color: #a9c6c9;
}
</style>
<script>

function upd(pid) {
  var xhttp;    
 /* if (cust == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }*/
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
	var pid=pid;
	
  xhttp.open("GET", "Update.php?pid="+pid, true);
  xhttp.send();
  window.location.href='editProds.php';
}

</script>

 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php 
if(!empty($_SESSION['type']))
{
echo "
<form method='post'>";

?>
<table border='0' width='90%' align='center'>
<tr><td align='left'>
  
   </td></tr>
</table>

<div id='txtHint'>

</div>

</center><br><br>

 <div class="container" style='width:100%'>
 <div class="row content" style='width:100%'>
 <div class="col-sm-8 text-left" style='width:100%'>
<?php
if(!isset($_POST['cod']))
{
$sql1="select * from product";
$res = $con->query($sql1);
		?>
		<center>
		
		<br><br><br>
		<table class='hovertable' align='center' border='1' width='98%'>
		<th>Product Id</th>
		<th>Name</th>
		<th>Image</th>
		<th>Category</th>
		<th>Description</th>	
		<th>Price</th>	
<th>Edit</th>		
		
		
		<?php
			while($row = $res->fetch_assoc()) 
			{ 
		$id=$row['id'];
		$img=$row['img'];
		$name=$row['name'];
		$comp=$row['catg'];
		$desc=$row['desc1'];
		$price=$row['price'];
				echo "<tr
		onmouseover=\"this.style.backgroundColor='#F8F8FF';\" 
		onmouseout=\"this.style.backgroundColor='white';\"
				><td>".$row['id']."</td>
				
				<td>".$row['name']."</td>
				 <td><img src='images/$img' width='200' height='200'></td>	
				<td>".$row['catg']."</td>					 
				<td>".$row['desc1']."</td>
				 
				 <td>".$row['price']."</td>
				
				
					   
					  <td align='right'><a href='#myModal".$id."' class='btn btn-success' data-toggle='modal'>Delete Product</a><br><br>
					 
					  </tr>
					   <div class='modal fade' id='myModal".$id."' role='dialog'>
  <br><br>";
					   echo"<br/><br/><br><br/>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
 <h4 class='modal-title' style='font-weight:bold;font-family:verdana'>Order Details</h4>	
</div>
<div class='modal-body'>
<input type='text' name='pid' id='pid' value='$id' class='form-control'>
<input type='text' name='name' id='name' value='$name' class='form-control'>
<input type='text' name='comp' id='comp' value='$comp' class='form-control'>
<input type='text' name='desc' id='desc' value='$desc' class='form-control'>
<input type='number' name='price' id='price' value='$price' class='form-control'><br/>";?>
<input type='button' value='Delete' class='btn btn-success' onclick="upd('<?php echo $id ?>')">



<?php
		  
echo"
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>"; 
			}
			echo "</table>";
			
			

}

			?>
			
			</div></div></div>
			
			<tr align='center' ><td colspan='3' align='center'> <?php 
$sql = "SELECT COUNT(id) from product"; 
$rs_result = $con->query($sql); 
$row = mysqli_fetch_row($rs_result); 
$total_records = $row[0]; 
$total_pages = ceil($total_records /8); 

for ($i=1; $i<=$total_pages; $i++) { 
            echo "
		
		<ul class='pagination pagination-lg'><li><a href='editProds.php?page=".$i."'>".$i."</a></li></ul>
		
		"; 
};
?></td></tr>
  </table>
        </div>
		<div class="col-sm-2 sidenav">
     
    </div>
	
		</div>
		
		  
		</div>
			</center>
			</form>
			<?php
}
else
{
	echo "<script>window.location.href='MainPage.php';</script>";
}
}
else
{
	echo "<script>window.location.href='MainPage.php';</script>";
}
?>
