<?php 
	$page_title = "Add a Employee";
    include_once('../../includes/header_admin.php');

    validateAccess();
    
    # displays list of user types
  

	

	# add a user record
	if (isset($_POST['add']))
	{
		$typeID = mysqli_real_escape_string($con, $_POST['type']);
		$Name = mysqli_real_escape_string($con, $_POST['Name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		
		$Firstname = mysqli_real_escape_string($con, $_POST['Firstname']);
		$Lastname = mysqli_real_escape_string($con, $_POST['Lastname']);
		$Middlename = mysqli_real_escape_string($con, $_POST['Middlename']);
		$emailz = mysqli_real_escape_string($con, $_POST['email']);
		
		
		
		

			$sql_add = "INSERT INTO users VALUES ('', 4, '$Name',
				'$email', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861','Active', NOW(), NULL)";
				
			$con->query($sql_add) or die(mysqli_error($con));
			$userID = $con->insert_id;
			
			$sql_insert = "INSERT INTO employee VALUES ('', $userID, '$Firstname',
				'$Lastname', '$Middlename','$email', NULL)";
				
			
			$con->query($sql_insert) or die(mysqli_error($con));
			header('location: index.php');
		
	}

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">Name</label>
			<div class="col-lg-8">
				<input name="Name" type="Name" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Email Address</label>
			<div class="col-lg-8">
				<input name="email" type="email" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">FirstName</label>
			<div class="col-lg-8">
				<input name="Firstname" type="Firstname" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Lastname</label>
			<div class="col-lg-8">
				<input name="Lastname" type="Lastname" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Middlename</label>
			<div class="col-lg-8">
				<input name="Middlename" type="Middlename" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">email</label>
			<div class="col-lg-8">
				<input name="email" type="email" class="form-control" required />
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<div class="col-lg-offset-4 col-lg-8">
				<button name="add" type="submit" class="btn btn-success">
					Add
				</button>
			</div>
		</div>
	</div>
</form>

<?php
	include_once('../../includes/footer.php');