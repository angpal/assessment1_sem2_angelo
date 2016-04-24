
<?php

	require_once"connection.php";

	$all_contacts = "select * from contacts";

	$sql_all_contacts =  $conn->query($all_contacts);

	$total_contacts = $sql_all_contacts->num_rows;
?>


<!DOCTYPE html>
<html>
<head>
	<link href="cdn.datatables.net/1.10.5/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
	<?php include"includes/head.inc"; ?>
</head>
<body>
	<div class="wrapper">

		<!-- header section -->
		<?php include"includes/header.inc"; ?>

		<!-- content section -->
		<div class="content">
			<div class="floatl"><h1>There are <?php echo $total_contacts ?> contacts in this phonebook!</h1></div>
			<a class="floatr" href="insert_contact.php"><input class="cancel_contact_button" type="button" value="New Contact"></a>		
			<div class="clear"></div>
			<hr class="pageTitle">
			<table id="contactsTable" class="display">
				<thead>
					<tr align="left">
						<th>Name:</th>
						<th>Nickname:</th>
						<th>Cell Phone:</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_assoc($sql_all_contacts)) { 

						//var_dump($row);
					?>
					<tr>
						<td><a href="contact.php?id=<?php echo $row['contact_id'] ?>"><?php echo $row['contact_fname'] . " " . $row['contact_lname']?></a></td>
						<td><?php echo $row['contact_nickname'] ?></td>
						<td><?php echo $row['contact_cphone'] ?></td>
						<td><a href="update_contact.php?id=<?php echo $row['contact_id'] ?>"><i class="fa fa-pencil"></i></a> | <a href="delete.php?id=<?php echo $row['contact_id'] ?>"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>	
</body>
</html>		