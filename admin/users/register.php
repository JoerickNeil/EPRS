<?php 

	$page_title = "Add a Admin or Human Resource";
  
include_once('../../includes/header_admin.php');
    validateAccess();
    
    # displays list of user types
    $sql_types = "SELECT UserType FROM userz";
    $result_types = $con->query($sql_types);

    $list_types = "";
	while ($row = mysqli_fetch_array($result_types))
	{
		$userID = $row['userID'];
		$userType = $row['UserType'];
		$list_types .= "<option value='$userID'>$userType</option>";
	}

	

	# add a user record
	if (isset($_POST['add']))
	{
		
		
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$UserType = mysqli_real_escape_string($con, $_POST['UserType']);
		
		
		
		

			$sql_add = "INSERT INTO userz VALUES ('', '$password','$UserType'
				
				)";
			$con->query($sql_add) or die(mysqli_error($con));
			
		
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
			<label class="control-label col-lg-4">password</label>
			<div class="col-lg-8">
				<input name="email" type="email" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">UserType</label>
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