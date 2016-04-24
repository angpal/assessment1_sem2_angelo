<?php
	session_start();
	if (!isset($_SESSION['loggedin'])){
	header('location:login.php');
	}
	require_once"connection.php";

	$all_contacts = "select * from contacts WHERE `contact_status` = 'current'";

	$sql_all_contacts =  $conn->query($all_contacts);

	$total_contacts = $sql_all_contacts->num_rows;
	
	
	if (isset($_GET['id']) && (isset($_GET['fname']))) {

		require_once"connection.php";

		$id = $_GET['id'];
		$fname = $_GET['fname'];

		// Original code
		//$delete_contact = "delete from contacts where contact_id = '$id'";

		//$sql_delete_contact = $conn->query($delete_contact);

		//if ($sql_delete_contact == true) {
		//	header("Location: index.php");
		//}

		$query2 = "UPDATE `contacts` SET `contact_status` = 'archived' WHERE `contacts`.`contact_id` = $id;";


	    $result2 = mysqli_query($conn, $query2);

	    if ($result2) {

			// This sends a Javascript alert to the client/user.
			$message = "You have successfully removed " . "$fname" . " from your list of contact. Their details have been archived and remain in the database.";
			
			echo "<script>
			alert('$message'); 
			window.location = 'main_list.php';
			</script>";
	    } else {
	      $error = "The availability status was NOT changed";
	    }
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css">
	<?php include"includes/head.inc"; ?>
</head>
<body>
	<div class="wrapper">

		<!-- header section -->
		<div class="header">
			<div class="headerContent"><h1>Phonebook of Arthur Fonzarelli. Hey!!</h1></div>
				<br><br>
			<a class="logout_contact_button" href="logout.php" title="logout">Log Out.</a>
		</div>

		<!-- content section -->
        <div class="back_ground"></div>
        
		<div class="content">
        
        
        
        <div class="counter">
			<div class="floatl"><h1>There are <?php echo $total_contacts ?> contacts in this phonebook!</h1></div>
			<a class="floatr" href="insert_contact.php"><input class="cancel_contact_button" type="button" value="New Contact">
            </a>
         </div>
         
         
         
			<div class="clear"></div>
			<hr class="pageTitle">
			<table id="contactsTable" class="display">
				<thead>
					<tr align="left">
						<th>Name:</th>
						<th class="hidden_col">Nickname:</th>
						<th>Mobile Phone:</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($sql_all_contacts)) { 

						//var_dump($row);
					?>
					<tr>
						<td><a href="contact.php?id=<?php echo $row['contact_id'] ?>"><?php echo $row['contact_fname'] . " " . $row['contact_lname']?></a></td>
						<td class="hidden_col"><?php echo $row['contact_nickname'] ?></td>
						<td><?php echo $row['contact_mphone'] ?></td>
						<td><a href="update_contact.php?id=<?php echo $row['contact_id'] ?>"><i class="fa fa-pencil"></i></a>&nbsp; &nbsp; | &nbsp; &nbsp; <a href="main_list.php?id=<?php echo $row['contact_id'] . "&fname=" . $row['contact_fname'];?>"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>		