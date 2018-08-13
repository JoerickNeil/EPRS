<?php 
	$page_title = "Add a Applicant";
    include_once('../../includes/header_admin.php');

    validateAccess();
    
    # displays list of user types
    

	 $sql_city = "SELECT cityID, name FROM cities ORDER BY cityID";
    $result_city = $con->query($sql_city);

    $list_city = "";
	while ($row = mysqli_fetch_array($result_city))
	{
		$cityID = $row['cityID'];
		$name = $row['name'];
		$list_city .= "<option value='$cityID'>$name</option>";
	}

	# add a user record
	if (isset($_POST['add']))
	{
		$typeID = mysqli_real_escape_string($con, $_POST['type']);
		$Name = mysqli_real_escape_string($con, $_POST['Name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		
		
		$CityID = mysqli_real_escape_string($con, $_POST['CityID']);
		$Firstname = mysqli_real_escape_string($con, $_POST['Firstname']);
		$Middlename = mysqli_real_escape_string($con, $_POST['Middlename']);
		$Nickname = mysqli_real_escape_string($con, $_POST['Nickname']);
		$Street = mysqli_real_escape_string($con, $_POST['Street']);
		$Municipality = mysqli_real_escape_string($con, $_POST['Municipality']);
		$Birthdate = mysqli_real_escape_string($con, $_POST['Birthdate']);
		$Gender = mysqli_real_escape_string($con, $_POST['Gender']);
		$Lastname = mysqli_real_escape_string($con, $_POST['Lastname']);
		$Postal = mysqli_real_escape_string($con, $_POST['Postal']);
		
		$sql_check = "SELECT email from users where email='$email'";
		$result_check = $con->query($sql_check) or die(mysqli_error($con));
		
		if (mysqli_num_rows($result_check) == 0)
		{
			$sql_add = "INSERT INTO users VALUES ('', 3, '$Firstname',
				'$email', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861','Active', NOW(), NULL)";
				
			$con->query($sql_add) or die(mysqli_error($con));
			$userID = $con->insert_id;
			
			$sql_insert = "INSERT INTO applicants VALUES ('', $userID, '$CityID',
				'$Firstname', '$Middlename','$Lastname', '$Nickname', '$Street', '$Municipality',
				'$Postal',NULL, '$Birthdate', '$Gender', 'Active', NULL, NOW(), NULL)";
				
			
			$con->query($sql_insert) or die(mysqli_error($con));
			
			header('location: index.php');
		}
		else
		{
			echo "<script>alert('Email already existing!');</script>";
		}
		
	}

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		
	
		<div class="form-group">
			<label class="control-label col-lg-4">Email Address</label>
			<div class="col-lg-8">
				<input name="email" type="email" class="form-control" required />
			</div>
		</div>
		
		
		
		
		
			<div class="form-group">
			<label class="control-label col-lg-4">City</label>
			<div class="col-lg-8">
				<select name="CityID" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_city; ?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-4">Firstname</label>
			<div class="col-lg-8">
				<input name="Firstname" type="Firstname" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Middlename</label>
			<div class="col-lg-8">
				<input name="Middlename" type="Middlename" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Lastname</label>
			<div class="col-lg-8">
				<input name="Lastname" type="Lastname" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Nickname</label>
			<div class="col-lg-8">
				<input name="Nickname" type="Nickname" class="form-control" required />
			</div>
		</div><div class="form-group">
			<label class="control-label col-lg-4">Street</label>
			<div class="col-lg-8">
				<input name="Street" type="Street" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Municipality</label>
			<div class="col-lg-8">
				<input name="Municipality" type="Municipality" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Postal</label>
			<div class="col-lg-8">
				<input name="Postal" type="Postal" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Birthdate</label>
			<div class="col-lg-8">
				<input name="Birthdate" type="date" max="<?php echo date('Y-m-d');?>" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Gender</label>
			<div class="col-lg-8">
				<input name="Gender" type="Gender" class="form-control" required />
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