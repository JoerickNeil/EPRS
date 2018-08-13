<?php 
	$page_title = "Add a Client";
    include_once('../../includes/header_admin.php');

    validateAccess();
	
	$sql_city = "SELECT cityID, name FROM cities ORDER BY name";
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
		
		
	
		$cityID = mysqli_real_escape_string($con, $_POST['cityID']);
		$postal = mysqli_real_escape_string($con, $_POST['postal']);
		$contactperson = mysqli_real_escape_string($con, $_POST['contactperson']);
		$landline = mysqli_real_escape_string($con, $_POST['landline']);
		$emailz = mysqli_real_escape_string($con, $_POST['email']);
		$website = mysqli_real_escape_string($con, $_POST['website']);
		
		$Mobile = mysqli_real_escape_string($con, $_POST['Mobile']);
		
		
		

			$sql_add = "INSERT INTO users VALUES ('', 2, '$Name',
				'$email', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861','Active', NOW(), NULL)";
				
			
				
				
			$con->query($sql_add) or die(mysqli_error($con));
			$userID = $con->insert_id;
			
			$sql_client = "INSERT INTO clients VALUES ('', $userID, $cityID,
				'$postal', '$contactperson','$landline', '$Mobile', '$emailz', '$website', NULL, NULL, NULL, 'Active', NOW(), NULL)";
				
			$con->query($sql_client) or die(mysqli_error($con));
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
			<label class="control-label col-lg-4">City</label>
			<div class="col-lg-8">
				<select name="cityID" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_city; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Postal</label>
			<div class="col-lg-8">
				<input name="postal" type="text" class="form-control"  pattern="[0-9]{4}" title="incorrect format:" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Contactperson</label>
			<div class="col-lg-8">
				<input name="contactperson" type="text" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">landline</label>
			<div class="col-lg-8">
				<input name="landline" type="text" class="form-control"  pattern="[0-9]{7}" title="incorrect format:" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Mobile</label>
			<div class="col-lg-8">
				<input name="Mobile" type="text" class="form-control"   pattern="[0-9]{11}" title="incorrect format:" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Email</label>
			<div class="col-lg-8">
				<input name="Email" type="text" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Website</label>
			<div class="col-lg-8">
				<input name="website" type="text" class="form-control" required />
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