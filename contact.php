<?php
	session_start();
	if (!isset($_SESSION['loggedin'])){
	header('location:login.php');
	}
	
	if (isset($_GET['id'])) {
		
		require_once"connection.php";

		$contacts = array();

		$id = $_GET['id'];

		$contact = "select * from contacts where contact_id = '$id'";

		$sql_contact = $conn->query($contact);

		while ($row = mysqli_fetch_assoc($sql_contact)) {

			$contacts[] = $row;
		}

		foreach ($contacts as $person);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php include"includes/head.inc"; ?>
</head>
<body>
	<div class="wrapper">

		<!-- header section -->
		<div class="header">
			<div class="headerContent"><h1>This Phonebook belongs to Arthur Fonzarelli. Hey!!</h1></div>
			
		</div>

		<!-- content section -->
		<div class="content">

				<div class="floatl"><h1><?php echo $person['contact_fname'] . " " . $person['contact_lname'] ?></h1></div>
                
				<a href="main_list.php"><input class="cancel_contact_button" type="button" value="Home"></a>
				<div class="clear"></div>
				<hr>
				<div class="contact">

					<?php if ($person['contact_profile'] == "") { ?>

						<img src="img/default_profile_pic.jpg" alt="default image"  width="40%" style="float:left;">

					<?php } else { ?>

						<img src="profile_images/<?php echo $person['contact_profile'] ?>" alt="<?php echo $person['contact_fname'] ?>"  width="40%" style="float:left;">

					<?php } ?>

					<div class="contact_info">
						<p><b>Nickname:</b> <?php echo $person['contact_nickname'] ?></p>
						<p><b>Mobile Phone:</b> <?php echo $person['contact_mphone'] ?></p>
						<p><b>Home Phone:</b> <?php echo $person['contact_hphone'] ?></p>
						<p><b>Work Phone:</b> <?php echo $person['contact_wphone'] ?></p>
						<p><b>Address:</b> <a href="http://maps.google.com/?q=<?php echo $person['contact_address'] . " " . $person['contact_city'] . " " . $person['contact_state'] . " " . $person['contact_zipcode']?>" target="_blank"><?php echo $person['contact_address'] . " " . $person['contact_city'] . " " . $person['contact_state'] . " " . $person['contact_zipcode']  ?></a></p>
						
						<p><b>Email Address:</b> <?php echo $person['contact_email'] ?></p>
						<p><b>Facebook Link:</b> <?php echo "<a href='http://www.facebook.com/" . $person['contact_facebook'] . "' target='_blank'>Go to profile</a>"?></p>
						

					
						<p><b>Bio:</b> <?php echo $person['contact_notes'] ?></p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>		