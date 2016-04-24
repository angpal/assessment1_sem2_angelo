<?php
	session_start();
	if (!isset($_SESSION['loggedin'])){
	header('location:login.php');
	}
	
	$nameErr = $emailErr = "";
		$error = false;
		
	if (isset($_POST['submit'])) {



		if (empty($_POST["fname"])) {
			$fname = "";
			$nameErr = "Name is required";
			$error = true;
		} else {
			$fname = test_input($_POST["fname"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z0-9 ]*$/",$fname)) {
			  $nameErr = "Only letters and white space allowed";
			  $error = true;
			}
		}

		if (empty($_POST["email"])) {
			$email = "";
			$emailErr = "Email is required";
			$error = true;
		} else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "Invalid email format";
			  $error = true;
			}
		}
		
		echo "<script>
			alert('$nameErr  $emailErr'); 
			
			</script>";
		
		//$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$nickname = $_POST['nickname'];
		$profile = $_FILES['profile']['name'];
		$profile_tmp = $_FILES['profile']['tmp_name'];
		$mphone = $_POST['mphone'];
		$hphone = $_POST['hphone'];
		$wphone = $_POST['wphone'];
		//$email = $_POST['email'];
		$facebook = $_POST['facebook'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$bio = $_POST['bio'];
	
	if (!$error) {

		require_once"connection.php";

		

		move_uploaded_file($profile_tmp, "profile_images/$profile");

		$insert_contact = "insert into contacts (contact_fname, contact_lname, contact_nickname, contact_mphone, contact_hphone, contact_wphone, 
						contact_email, contact_facebook, contact_address, contact_city, contact_state, contact_zipcode, contact_profile, contact_notes) 
					values ('$fname', '$lname', '$nickname', '$mphone', '$hphone', '$wphone', '$email', '$facebook', '$address', '$city', '$state', 
						'$zipcode', '$profile', '$bio')";

		$sql_insert_contact = $conn->query($insert_contact);

		if ($sql_insert_contact == true) {
			header("Location:main_list.php");
		}
	}

	}

		
		
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php include"includes/head.inc"; ?>
    
	<script>tinymce.init({selector:'textarea'});</script>
    
 <!-- Word counter in text areas -->  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 



</head>

<body>
	<div class="wrapper">

		<!-- header section -->
		<div class="header">
			<div class="headerContent"><h1>CONTACT LIST</h1></div>
		</div>

		<!-- body background section -->
        <div class="back_ground"></div>
        
		<!-- content section -->
		<div class="content">
		<div><h1>Create New Contact</h1></div>
			<hr>
			<div class="contact">
				<div class="contact_insert">
					<form action="insert_contact.php" method="post" enctype="multipart/form-data">
						<table class="create-contact-tbl">

							<p>[<span class="requ_data"> * </span>= required information] </p><br>
							
							<tr>
								<td>First Name:<span class="requ_data"> * </span></td>
								<td><input type="text" name="fname" placeholder="First Name"></td>
							</tr>
							<tr>
								<td>Last Name:</td>
								<td><input type="text" name="lname" placeholder="Last Name" ></td>
							</tr>
							<tr>
								<td>Nickname:</td>
								<td><input type="text" name="nickname" placeholder="Nickname" ></td>
							</tr>
							<tr>
								<td>Profile Image:</td>
								<td><input type="file" name="profile"></td>
							</tr>
							<tr>
								<td>Mobile Phone:<span class="requ_data"> * </span></td>
								<td><input type="text" name="mphone" placeholder="Mobile Phone" required></td>
							</tr>
							<tr>
								<td>Home Phone:</td>
								<td><input type="text" name="hphone" placeholder="Home Phone" ></td>
							</tr>
							<tr>
								<td>Work Phone:</td>
								<td><input type="text" name="wphone" placeholder="Work Phone" ></td>
							</tr>
							
							<tr>
								<td>Email Address:<span class="requ_data"> * </span></td>
								<td><input type="email" name="email" placeholder="Email Address" ></td>
							</tr>
							<tr>
								<td>Facebook Link:</td>
								<td><input type="text" name="facebook" placeholder="Facebook Link" ></td>
							</tr>
							<tr>
								<td>Address:</td>
								<td><input type="text" name="address" placeholder="Address" ></td>
							</tr>
							<tr>
								<td>City:</td>
								<td><input type="text" name="city" placeholder="City" ></td>
							</tr>
							<tr>
								<td>State:</td>
								<td><input type="text" name="state" placeholder="State" ></td>
							</tr>
							<tr>
								<td>Zipcode:</td>
								<td><input type="text" name="zipcode" placeholder="Zipcode" ></td>
							</tr>

							
						</table>
                        
					  <table class="bio_window">
							<tr>
								<td>Bio:</td>								
								<td><textarea name="bio" id="bio" cols="30" rows="10"><div id="textleft"></div></textarea></td>
							</tr>
						</table>
						
						
						<div class="button_wrapper">
							<a href="main_list.php"><input class="cancel_contact_button" type="button" value="Cancel"></a>
							<input class="insert_contact_button" type="submit" name="submit" value="Insert Contact">
							
						</div>
						
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>	
 
</body>


</html>	

