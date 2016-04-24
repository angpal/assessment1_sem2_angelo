<?php

	if (isset($_GET['id'] && $_GET['fname'])) {

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
			$message = "You have successfully removed" . "$fname" . " from your list of contact. Their details have been archived and remain in the database.";
			
			echo "<script>
			alert('$message'); 
			window.location = 'main_list.php';
			</script>";
	    } else {
	      $error = "The availability status was NOT changed";
	    }
	}

?>


