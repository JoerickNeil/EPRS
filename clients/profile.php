<?php 
	$page_title = "Profile";
    include_once('../includes/header_clients.php');

    validateAccess();
?>
 <?php 
 
 $userID = $_SESSION['userid'];
 
    $sql_application = "SELECT 
	
	users.Name,
	users.password,
	
	
	clients.contactperson,
	clients.landline,
	clients.mobile,
	clients.email,
	clients.website,
	clients.status
	
	
    	FROM clients 
		
			INNER JOIN users ON clients.userID = users.userID
	
		
		WHERE clients.userID='$userID' 
    	
    	";

    $result_application = $con->query($sql_application);
while ($row = mysqli_fetch_array($result_application))
			{
					  
					   $Name = $row['Name'];
					   $contactperson = $row['contactperson'];
					   $landline = $row['landline'];
					   $mobile = $row['mobile'];
					   $email = $row['email'];
					   $website = $row['website'];
					   $status = $row['status'];
					   $password = $row['password'];
									
			}
?>

<script>
        function enableButton3() {
            document.getElementById("button3").disabled = false;
        }
    </script>
	
	<script>
        function enableButton4() {
            document.getElementById("button4").disabled = false;
        }
    </script>
	
	<script>
        function enableButton5() {
            document.getElementById("button5").disabled = false;
        }
    </script>
	
	<script>
        function enableButton6() {
            document.getElementById("button6").disabled = false;
        }
    </script>
	
	<script>
        function disableButton7() {
            document.getElementById("button7").disabled = true;
        }
    </script>
	
	<script>
        function enableButton8() {
            document.getElementById("button8").disabled = false;
        }
    </script>
	
	<script>
        function enableButton9() {
            document.getElementById("button9").disabled = false;
        }
    </script>
	
	<script>
        function enableButton10() {
            document.getElementById("button10").disabled = false;
        }
    </script>
	
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">User Type</label>
			<div class="col-lg-8">
			<input name="ut" type="text" value="<?php echo $userType . ' (' . $userType . ')'; ?>" class="form-control"  disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Name</label>
			<div class="col-lg-8">
				<input name="Name" type="text" id="button3" value="<?php echo $Name; ?>"  class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Contact Person</label>
			<div class="col-lg-8">
				<input name="contactperson" type="text" id="button4" value="<?php echo $contactperson; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Landline</label>
			<div class="col-lg-8">
				<input name="landline" type="text" id="button5" value="<?php echo $landline; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Mobile</label>
			<div class="col-lg-8">
				<input name="mobile" type="text" id="button6" value="<?php echo $mobile; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Password</label>
			<div class="col-lg-8">
				<input name="pw" type="password" id="button7" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> 
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">Email</label>
			<div class="col-lg-8">
				<input name="email" type="text" id="button8" value="<?php echo $email; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Website</label>
			<div class="col-lg-8">
				<input name="website" type="text" id="button9" value="<?php echo $website; ?>"  class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Status</label>
			<div class="col-lg-8">
				<input name="status" type="text" id="button10" value="<?php echo $status; ?>" class="form-control" disabled />
			</div>
		</div>
		
		<?php
				if (isset($_POST['add']))
			{

					$pw = hash('sha256', mysqli_real_escape_string($con, $_POST['pw']));
					$sql_update = "UPDATE users SET password='$pw' 
						WHERE userID=$userID";
					
						
				$con->query($sql_update) or die(mysqli_error($con));
				
				
				
			}
			?>
	 <?php
				if (isset($_POST['addz']))
			{

					$Name = mysqli_real_escape_string($con, $_POST['Name']);
					$contactperson = mysqli_real_escape_string($con, $_POST['contactperson']);
					$landline = mysqli_real_escape_string($con, $_POST['landline']);
					$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
					$email = mysqli_real_escape_string($con, $_POST['email']);
					$website = mysqli_real_escape_string($con, $_POST['website']);
					$status = mysqli_real_escape_string($con, $_POST['status']);

					
					
					$sql_update = "UPDATE clients SET contactperson='$contactperson', landline='$landline',
					mobile='$mobile', email='$email',website='$website', status='$status'
						WHERE userID=$userID";
					
					
						
				$con->query($sql_update) or die(mysqli_error($con));
				
				
				$sql_updates = "UPDATE users SET Name='$Name' where userID=$userID";
				
				$con->query($sql_updates) or die(mysqli_error($con));
				
				
				header('location: Profile.php');
				
				
			}
			?>
			<div class="form-group">
			<div class="col-lg-offset-4 col-lg-8">
				<button name="add" type="submit" class="btn btn-success">
					Change Pass
				</button>
				 <input type="button" id="button1" value="Change info" onclick="enableButton3();
		 enableButton4();enableButton5(); enableButton6(); disableButton7(); enableButton8(); enableButton9();
		 enableButton10(); enableButton11()"  />
		 
		   <input type="button" id="button1" value="Change Name" onclick="enableButton3(); disableButton7()"  />
				<button name="addz" type="submit" class="btn btn-success">
					Save info
				</button>
			</div>
		</div>
	</div>
</form>

<?php

if (isset($_POST['submit']))
{
	$target = "../uploads/SSS/";
	$target = $target . basename($_FILES['uploaded']['name']);
	$ok = 1;
	if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
	{
		echo "The file " . basename($_FILES['uploaded']['name']) . " has been uploaded";
	}
	else
	{
		echo "Sorry, there was a problem uploading your file.";
	}
}

?>

<?php

if (isset($_POST['YES']))
{
	$target = "../uploads/Pagibig/";
	$target = $target . basename($_FILES['uploaded']['name']);
	$ok = 1;
	if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
	{
		echo "The file " . basename($_FILES['uploaded']['name']) . " has been uploaded";
	}
	else
	{
		echo "Sorry, there was a problem uploading your file.";
	}
}

?>

<?php

if (isset($_POST['GO']))
{
	$target = "../uploads/Philhealth/";
	$target = $target . basename($_FILES['uploaded']['name']);
	$ok = 1;
	if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
	{
		echo "The file " . basename($_FILES['uploaded']['name']) . " has been uploaded";
	}
	else
	{
		echo "Sorry, there was a problem uploading your file.";
	}
}

?>

<div style="float:right;">
<form action="profile.php" enctype="multipart/form-data" method="post"> 
<label style="float:left;">SSS</label>
<input name="uploaded" type="file" >
<input type="submit" name="submit" value="Upload" style="width:91px;">
Please choose a file:
 <?php
$path = "../uploads/SSS/";
$files = scandir($path);
foreach ($files as &$value) {
    echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
}
?>
<br>
<br>
<label style="float:left;">PhilHealth</label>
<input name="uploaded" type="file" >
<input type="submit" name="GO" value="Upload" style="width:91px;">
Please choose a file: 
<?php
$path = "../uploads/Philhealth/";
$files = scandir($path);
foreach ($files as &$value) {
    echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
}
?>
<br>
<br>
<label style="float:left;">Pag-Ibig</label>
<input name="uploaded" type="file" >
<input type="submit" name="YES" value="Upload" style="width:91px;">

Please choose a file: 
<?php
$path = "../uploads/Pagibig/";
$files = scandir($path);
foreach ($files as &$value) {
    echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
}
?>
</form>
</div> 


<?php
/*
$path = "../uploads/WordFiles/";
$files = scandir($path);
foreach ($files as &$value) {
    echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
}*/
?>



<?php
	include_once('../includes/footer.php');
?>