<?php 
	# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "User #$id Details";
		    include_once('../../includes/header_admin.php');

		    validateAccess();

		    # display existing record
			$sql_data = "SELECT userID, status, typeID, firstName, lastName, email,
				street, municipality, cityID, landline, mobile
				FROM users
				WHERE userID=$id";
			$result_data = $con->query($sql_data);

			# checks if record is not existing
			if (mysqli_num_rows($result_data) == 0)
			{
				header('location: index.php');
			}

			while ($row = mysqli_fetch_array($result_data))
			{
				$status = $row['status'];
				$type = $row['typeID'];
				$fn = $row['firstName'];
				$ln = $row['lastName'];
				$email = $row['email'];
				$street = $row['street'];
				$muni = $row['municipality'];
				$city = $row['cityID'];
				$phone = $row['landline'];
				$mobile = $row['mobile'];
			}

			# displays list of user types
		    $sql_types = "SELECT typeID, userType FROM types ORDER BY userType";
		    $result_types = $con->query($sql_types);

		    $list_types = "";
			while ($row = mysqli_fetch_array($result_types))
			{
				$typeID = $row['typeID'];
				$userType = $row['userType'];
				$selected = $typeID == $type ? "selected" : "";
				$list_types .= "<option value='$typeID' $selected>$userType</option>";
			}


			# displays list of cities
		    $sql_cities = "SELECT cityID, name FROM cities ORDER BY name";
		    $result_cities = $con->query($sql_cities);

		    $list_cities = "";
			while ($row = mysqli_fetch_array($result_cities))
			{
				$cityID = $row['cityID'];
				$name = $row['name'];
				$selected = $cityID == $city ? "selected" : "";
				$list_cities .= "<option value='$cityID' $selected>$name</option>";
			}

			# updates existing record
			if (isset($_POST['update']))
			{
				$status = mysqli_real_escape_string($con, $_POST['status']);
				$typeID = mysqli_real_escape_string($con, $_POST['type']);
				$fn = mysqli_real_escape_string($con, $_POST['fn']);
				$ln = mysqli_real_escape_string($con, $_POST['ln']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$pw = hash('sha256', mysqli_real_escape_string($con, $_POST['pw']));
				$st = mysqli_real_escape_string($con, $_POST['st']);
				$muni = mysqli_real_escape_string($con, $_POST['muni']);
				$cityID = mysqli_real_escape_string($con, $_POST['cities']);
				$phone = mysqli_real_escape_string($con, $_POST['phone']);
				$mobile = mysqli_real_escape_string($con, $_POST['mobile']);

				if ($_POST['pw'] == "")
				{
					$sql_update = "UPDATE users SET typeID=$typeID, firstName='$fn', 
						lastName='$ln', email='$email', street='$st', municipality='$muni', 
						cityID=$cityID, landline='$phone', mobile='$mobile',
						status='$status', lastModified=NOW()
						WHERE userID=$id";
				}
				else
				{
					$sql_update = $sql_update = "UPDATE users SET typeID=$typeID, firstName='$fn', 
						lastName='$ln', email='$email', password='$pw', 
						street='$st', municipality='$muni', 
						cityID=$cityID, landline='$phone', mobile='$mobile',
						status='$status', lastModified=NOW()
						WHERE userID=$id";
				}
				
				$result = $con->query($sql_update) or die(mysqli_error($con));
				header('location: index.php');
			}
		}
		else
		{
			header('location: index.php');
		}
	}
	else
	{
		header('location: index.php');
	}
?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">Status</label>
			<div class="col-lg-8">
				<select name="status" class="form-control" required>
					<option <?php if ($status == "Active") echo 'selected' ; ?>>Active</option>
					<option <?php if ($status == "Inactive") echo 'selected' ; ?>>Inactive</option>
					<option <?php if ($status == "Blocked") echo 'selected' ; ?>>Blocked</option>
				</select>
			</div>
		</div>
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
			<label class="control-label col-lg-4">First Name</label>
			<div class="col-lg-8">
				<input name="fn" type="text" class="form-control" value="<?php echo $fn; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Last Name</label>
			<div class="col-lg-8">
				<input name="ln" type="text" class="form-control" value="<?php echo $ln; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Email Address</label>
			<div class="col-lg-8">
				<input name="email" type="email" class="form-control" value="<?php echo $email; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Password</label>
			<div class="col-lg-8">
				<input name="pw" type="password" class="form-control" />
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">Street</label>
			<div class="col-lg-8">
				<input name="st" type="text" class="form-control" value="<?php echo $street; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Municipality</label>
			<div class="col-lg-8">
				<input name="muni" type="text" class="form-control" value="<?php echo $muni; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">City</label>
			<div class="col-lg-8">
				<select name="cities" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_cities; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Landline</label>
			<div class="col-lg-8">
				<input name="phone" type="text" class="form-control" value="<?php echo $phone; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Mobile</label>
			<div class="col-lg-8">
				<input name="mobile" type="text" class="form-control" value="<?php echo $mobile; ?>" required />
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-4 col-lg-8">
				<button name="update" type="submit" class="btn btn-success">
					Update
				</button>
				<a href="index.php" class="btn btn-default">
					Back to View
				</a>
			</div>
		</div>
	</div>
</form>

<?php
	include_once('../../includes/footer.php');