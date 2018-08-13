<?php 

	$page_title = "Add a Admin or Human Resource";
  
include_once('../../includes/header_admin.php');
    validateAccess();
    
    # displays list of user types
    $sql_types = "SELECT typeID, userType FROM types where typeID=1 OR typeID=5  ORDER BY userType";
    $result_types = $con->query($sql_types);

    $list_types = "";
	while ($row = mysqli_fetch_array($result_types))
	{
		$typeID = $row['typeID'];
		$userType = $row['userType'];
		$list_types .= "<option value='$typeID'>$userType</option>";
	}

	

	# add a user record
	if (isset($_POST['add']))
	{
		$typeID = mysqli_real_escape_string($con, $_POST['type']);
		$Name = mysqli_real_escape_string($con, $_POST['Name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		
		
		
		

			$sql_add = "INSERT INTO users VALUES ('', $typeID, '$Name',
				'$email', '47937d13a66c91a3430c460c61514909509c8a9b754625295f15dd1961cbb861',
				
				'Active', NOW(), NULL)";
			$con->query($sql_add) or die(mysqli_error($con));
			header('location: index.php');
		
	}

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">User Type</label>
			<div class="col-lg-8">
				<select name="type" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_types; ?>
				</select>
			</div>
		</div>
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