
<?php

	require_once"connection.php";

	$all_contacts = "select * from contacts WHERE `contact_status` = 'current'";

	$sql_all_contacts =  $conn->query($all_contacts);

	$total_contacts = $sql_all_contacts->num_rows;
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css">
	<?php include"includes/head.inc"; ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>
<body>
	<div class="wrapper">

		<!-- header section -->
		<div class="header">
			<div class="headerContent"><h1>This Phonebook belongs to Arthur Fonzarelli. Hey!!</h1></div>
		</div>

		<!-- content section -->
        <div class="back_ground"></div>
        
		<div class="content">
        
        
        
        <div class="counter">
			<div class="floatl"><h1 class="welcome_text">Welcome!! Click to enter...</h1></div>
			<a class="enter_floatr" href="login.php"><input class="enter_button" type="button" value="ENTER">
            </a>
         </div>

         </div>
    </div>

</body>
</html>