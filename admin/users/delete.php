<?php 
	# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];
			
			require($_SERVER['DOCUMENT_ROOT'] . '/Dynamics/config.php');
			require($_SERVER['DOCUMENT_ROOT'] . '/Dynamics/function.php');

			validateAccess();
			
			# archives existing record
			$sql_delete = "UPDATE users SET status='Archived',
				datemodified=NOW()
				WHERE userID=$id";
				
			$result = $con->query($sql_delete) or die(mysqli_error($con));
			header('location: index.php');
		}
		
	}
	
?>