<?php 
	$page_title = "Profile";
    include_once('../includes/header_employee.php');

    validateAccess();
?>
 <?php 
 
 $userID = $_SESSION['userid'];
 
    $sql_application = "SELECT 
	
	users.Name,
	
	
	employee.Firstname,
	employee.Lastname,
	employee.Middlename,
	employee.email
	
	
	
    	FROM employee 
		
			INNER JOIN users ON employee.userID = users.userID
	
		
		WHERE employee.userID='$userID' 
    	
    	";

    $result_application = $con->query($sql_application);
while ($row = mysqli_fetch_array($result_application))
			{
					  
					   $Firstname = $row['Firstname'];
					   $Lastname = $row['Lastname'];
					   $Middlename = $row['Middlename'];
					   $email = $row['email'];

									
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
        function disableButton12() {
            document.getElementById("button12").disabled = true;
        }
    </script>
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">User Type</label>
			<div class="col-lg-8">
			<input name="ut" type="text" value="<?php echo $userType . ' (' . $userType . ')'; ?>" class="form-control"  readonly />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Firstname</label>
			<div class="col-lg-8">
				<input name="Firstname" type="text"  id="button3" value="<?php echo $Firstname; ?>"  class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Lastname</label>
			<div class="col-lg-8">
				<input name="Lastname" type="text"  id="button4" value="<?php echo $Lastname; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Middlename</label>
			<div class="col-lg-8">
				<input name="Middlename" type="text"  id="button5" value="<?php echo $Middlename; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Password</label>
			<div class="col-lg-8">
				<input name="pw" type="password"  id="button12" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> 
			</div>
		</div>
		
		<div class="form-group">
			<label class="control-label col-lg-4">Email</label>
			<div class="col-lg-8">
				<input name="email" type="text" id="button6" value="<?php echo $email; ?>" class="form-control" disabled />
			</div>
		</div>
		
		
	
	
		<div class="form-group">
			<div class="col-lg-offset-4 col-lg-8">
				<button name="add" type="submit" class="btn btn-success">
					Change Pass
				</button>
				 <input class="btn btn-success" type="button" id="button1" value="Change info" onclick="enableButton3();
		 enableButton4();enableButton5(); enableButton6(); disableButton12()"  />
				<button name="addz" type="submit" class="btn btn-success">
					Save info
				</button>
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

					$Firstname = mysqli_real_escape_string($con, $_POST['Firstname']);
					$Lastname = mysqli_real_escape_string($con, $_POST['Lastname']);
					$Middlename = mysqli_real_escape_string($con, $_POST['Middlename']);
					$email = mysqli_real_escape_string($con, $_POST['email']);
					
					$sql_update = "UPDATE employee SET Firstname='$Firstname', Middlename='$Middlename', 
					Lastname='$Lastname', email='$email'  
						WHERE userID=$userID";
					
						
				$con->query($sql_update) or die(mysqli_error($con));
				header('location: Profile.php');
				
				
			}
			?>
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