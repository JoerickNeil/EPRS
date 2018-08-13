<?php 
	$page_title = "Add a Job";
    include_once('../../includes/header_admin.php');

	validateAccess();

    $sql_client = "SELECT ClientID, contactperson FROM clients ORDER BY contactperson";
    $result_client = $con->query($sql_client);

    $list_client = "";
	while ($row = mysqli_fetch_array($result_client))
	{
		$ClientID = $row['ClientID'];
		$contactperson = $row['contactperson'];
		$list_client .= "<option value='$ClientID'>$contactperson</option>";
	} 
	
    $sql_cat = "SELECT catID, category FROM categories ORDER BY category";
    $result_cat = $con->query($sql_cat);

    $list_cat = "";
	while ($row = mysqli_fetch_array($result_cat))
	{
		$catID = $row['catID'];
		$category = $row['category'];
		$list_cat .= "<option value='$catID'>$category</option>";
	}
	
	$sql_city = "SELECT cityID, name FROM cities ORDER BY name";
    $result_city = $con->query($sql_city);

    $list_city = "";
	while ($row = mysqli_fetch_array($result_city))
	{
		$cityID = $row['cityID'];
		$name = $row['name'];
		$list_city .= "<option value='$cityID'>$name</option>";
	}

	# add a product record
	if (isset($_POST['add']))
	{
		
		$ClientID = mysqli_real_escape_string($con, $_POST['client']);
		$catID = mysqli_real_escape_string($con, $_POST['cat']);
		$cityID = mysqli_real_escape_string($con, $_POST['city']);
		
		
		$desc = mysqli_real_escape_string($con, $_POST['desc']);
		$code = mysqli_real_escape_string($con, $_POST['Code']);
		$title = mysqli_real_escape_string($con, $_POST['title']);
		
		$Requirements = mysqli_real_escape_string($con, $_POST['requirement']);
		$StartPrice = mysqli_real_escape_string($con, $_POST['startprice']);
		$EndPrice = mysqli_real_escape_string($con, $_POST['endprice']);
		
		$DateStarted = mysqli_real_escape_string($con, $_POST['datestarted']);
		$DueDate = mysqli_real_escape_string($con, $_POST['duedate']);
		
		
		$TotalSlots = mysqli_real_escape_string($con, $_POST['totalslots']);
		
		$sql_check = "SELECT code FROM jobs WHERE code='$code'";
		$result_check = $con->query($sql_check) or die(mysqli_error($con));
		
		if (mysqli_num_rows($result_check) == 0)
		{
			
			
		$sql_add = "INSERT INTO jobs VALUES ('', $ClientID, $catID, $cityID,
		'$code', '$title', '$desc',
		'$Requirements', '$StartPrice', '$EndPrice',
		'$DateStarted', '$DueDate', NULL,
		'$TotalSlots', '$TotalSlots', 
			'Active', NOW(), NULL)";
		$con->query($sql_add) or die(mysqli_error($con));
		header('location: index.php');
		}
		else
		{
			
			echo "<script>alert('Job code already existing!');</script>";
		}


	}

?>

<form method="POST" class="form-horizontal" enctype="multipart/form-data">
	<div class="col-lg-6">
	<div class="form-group">
			<label class="control-label col-lg-4">Client</label>
			<div class="col-lg-8">
				<select name="client" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_client; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Category</label>
			<div class="col-lg-8">
				<select name="cat" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_cat; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">City</label>
			<div class="col-lg-8">
				<select name="city" class="form-control" required>
					<option value="">Select one...</option>
					<?php echo $list_city; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Description</label>
			<div class="col-lg-8">
				<textarea name="desc" id="desc" rows="10" cols="80">
	            </textarea>
	            <script>
	                CKEDITOR.replace( 'desc' );
	            </script>
			</div>
		</div>
		
			<div class="form-group">
			<label class="control-label col-lg-4">Requirements</label>
			<div class="col-lg-8">
				<textarea name="requirement" id="requirement" rows="10" cols="80">
	            </textarea>
	            <script>
	                CKEDITOR.replace( 'requirement' );
	            </script>
			</div>
		</div>
		
		
	</div>
	<div class="col-lg-6">
	<div class="form-group">
			<label class="control-label col-lg-4">Code</label>
			<div class="col-lg-8">
				<input name="Code" type="text" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Title</label>
			<div class="col-lg-8">
				<input name="title" type="text" class="form-control" required />
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-4">Start Price</label>
			<div class="col-lg-8">
				<input name="startprice" type="number" min="481.00"  step="0.01"
					class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">End Price</label>
			<div class="col-lg-8">
				<input name="endprice" type="number" min="481.00"  step="0.01" 
				    class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">DateStarted</label>
			<div class="col-lg-8">
				<input name="datestarted" type="date" min="<?php echo date('Y-m-d');?>"  class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">DueDate</label>
			<div class="col-lg-8">
				<input name="duedate" type="date" class="form-control" required />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Total Slots</label>
			<div class="col-lg-8">
				<input name="totalslots" type="number" min="1.00" max="10000.00" step="0.01" 
				    class="form-control" required />
			</div>
		</div>
		
		
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
?>