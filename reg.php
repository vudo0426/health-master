<!DOCTYPE html>
<html>
<title>Health Shopping Portal</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.w3-sidenav a {font-family: "Roboto", sans-serif}
body,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
h5,h1{font-family: "Montserrat", sans-serif;color:red}
</style>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="jquery.validate.min.js"></script>
  <script>
  $(function() {

    // Setup form validation on the #register-form element
    $("#myForm").validate({

        // Specify the validation rules
        rules: {
				name: "required",
				address: "required",
				user: "required",
				pass: "required",

				email: {
                required: true,
                email: true
				},
				mob:{
				required:true,
				minlength:8,
				maxlength:16,
				number: true
				},
			},


        // Specify the validation error messages
        messages: {
            name: "<label><h5>Please enter your full name!</h5></label>",
            address:"<label><h5>Please enter Address!</h5></label>",
			email:"<label><h5>Please enter valid email Address!</h5></label>",
			mob:"<label><h5>Please enter Valid Contact No!</h5></label>",

			user: "<label><h5>Please enter valid Username!</h5></label>",
			pass: "<label><h5>Please enter valid Password!</h5></label>",
        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });

  </script>


<form method="post" id='myForm'  novalidate="novalidate">
<center>
<br><br>
 <div class="w3-container w3-black w3-padding-32" id='login' style='width:70%;align:center'>
  <center>
    <h1>Register</h1>
    <p>New Customer first register with valid details.</p>
	 <p><input class="w3-input w3-border" type="text" name='name' placeholder="Enter Full name" style="width:40%"></p>
	<p><input class="w3-input w3-border" type="text" name='mob' placeholder="Enter Mobile No." style="width:40%"></p>
	<p><input class="w3-input w3-border" type="text" name='email' placeholder="Enter e-mail" style="width:40%"></p>
    <p><input class="w3-input w3-border" type="text" name='address' placeholder="Enter Address" style="width:40%;height:60px"></p>
	<p><input class="w3-input w3-border" type="text" name='user' placeholder="Enter Username" style="width:40%"></p>
	<p><input class="w3-input w3-border" type="password" name='pass' placeholder="Enter Password" style="width:40%"></p>
    <button type="submit" class="w3-btn w3-padding w3-red w3-margin-bottom" name='reg'>Register</button>
	<br>
	</center>
  </div>
  </center>
  <?php
  if(isset($_POST['reg']))
  {
	  include('connect.php');
	  include('AESEnc.php');
	   $var="select max(uid) as max from users";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
		$key = "steganographyyyy";

	     $uid = $row['max'] + 1;


	$name=$_POST['name'];
	$encname = fnEncrypt($name, $key);

    $mob=$_POST['mob'];
	$encmob = fnEncrypt($mob, $key);

    $email=$_POST['email'];
	$encemail = fnEncrypt($email, $key);

    $address=$_POST['address'];
	$encaddress = fnEncrypt($address, $key);

    $user=$_POST['user'];
	$encuser = fnEncrypt($user, $key);

    $pass=$_POST['pass'];
	$encpass = fnEncrypt($pass, $key);

	$checkSqlInj=$uid." ".$name." ".$mob." ".$email." ".$address." ".$user." ".$pass;



	if (strpos($checkSqlInj, 'select') !== false  ||  strpos($checkSqlInj, '1=1') !== false || strpos($checkSqlInj, 'update') !== false || strpos($checkSqlInj, 'delete') !== false || strpos($checkSqlInj, 'drop') !== false || strpos($checkSqlInj, 'alter') !== false )
	{
      echo "<script>alert('SQL injection detected');</script>";
}
else

	{

	$stmt=$con->prepare("Insert into users(uid,name,mob,email,address,username,password) values (?,?,?,?,?,?,?)");
	$stmt->bind_param("sssssss", $encuid1, $encname1,$encmob1, $encemail1,$encaddress1,$encuser1,$encpass1);

		$encuid1=$uid;
		$encname1=$encname;
		$encmob1=$encmob;
		$encemail1=$encemail;
		$encaddress1=$encaddress;
		$encuser1=$encuser;
		$encpass1=$encpass;
		$stmt->execute();
		echo "<script>alert('register successfully');</script>";
		echo "<script>location.replace('women.php');</script>";

$stmt->close();
$con->close();
  }
  }
  ?>
  </form>
