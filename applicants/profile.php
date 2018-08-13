<?php 
	$page_title = "Profile";
    include_once('../includes/header_applicants.php');

    validateAccess();
?>
 <?php 
 
 $userID = $_SESSION['userid'];
 
    $sql_application = "SELECT 
	

	users.userID,
	applicants.appID,
	applicants.Firstname,
	applicants.Middlename,
	applicants.Lastname,
	applicants.Nickname,
	applicants.Street,
	applicants.Municipality,
	applicants.Postal,
	applicants.Birthdate,
	applicants.Gender,
	applicants.Status
	
	
	
	
    	FROM applicants 
		
			INNER JOIN users ON applicants.userID = users.userID
	
		
		WHERE applicants.userID='$userID' 
    	
    	";

    $result_application = $con->query($sql_application);
while ($row = mysqli_fetch_array($result_application))
			{
					   $appID = $row['appID'];
					   $Firstname = $row['Firstname'];
					   $Middlename = $row['Middlename'];
					   $Lastname = $row['Lastname'];
					   $Nickname = $row['Nickname'];
					   $Street = $row['Street'];
					   $Municipality = $row['Municipality'];
					   $Postal = $row['Postal'];
					   $Birthdate = $row['Birthdate'];
					   $Gender = $row['Gender'];
					   $Status = $row['Status'];
					 
									
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
        function enableButton7() {
            document.getElementById("button7").disabled = false;
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
	<script>
        function enableButton11() {
            document.getElementById("button11").disabled = false;
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
			<input name="ut" type="text" value="<?php echo $userType; ?>" class="form-control"  disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Firstname</label>
			<div class="col-lg-8">
				<input name="Firstname" type="text" id="button3" value="<?php echo $Firstname; ?>"  class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Middlename</label>
			<div class="col-lg-8">
				<input name="Middlename" type="text"  id="button4" value="<?php echo $Middlename; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Lastname</label>
			<div class="col-lg-8">
				<input name="Lastname" type="text" id="button5" value="<?php echo $Lastname; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Nickname</label>
			<div class="col-lg-8">
				<input name="Nickname" type="text" id="button6" value="<?php echo $Nickname; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Password</label>
			<div class="col-lg-8">
				<input name="pw" type="password" id="button12" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"> 
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
					$Middlename = mysqli_real_escape_string($con, $_POST['Middlename']);
					$Lastname = mysqli_real_escape_string($con, $_POST['Lastname']);
					$Nickname = mysqli_real_escape_string($con, $_POST['Nickname']);
					$Municipality = mysqli_real_escape_string($con, $_POST['Municipality']);
					$Birthdate = mysqli_real_escape_string($con, $_POST['Birthdate']);
					$Gender = mysqli_real_escape_string($con, $_POST['Gender']);
					$Postal = mysqli_real_escape_string($con, $_POST['Postal']);
					$Street = mysqli_real_escape_string($con, $_POST['Street']);
					
					
					$sql_update = "UPDATE applicants SET Firstname='$Firstname', Middlename='$Middlename', Lastname='$Lastname',
					Nickname='$Nickname', Street='$Street',	Municipality='$Municipality', Postal='$Postal', Birthdate='$Birthdate',
					Gender='$Gender' 
						WHERE userID=$userID";
					
						
				$con->query($sql_update) or die(mysqli_error($con));
				header('location: Profile.php');
				
				
			}
			?>
		<div class="form-group">
			<div class="col-lg-offset-4 col-lg-8">
				<button name="add" type="submit" class="btn btn-success">
					Change Pass
				</button>
				 <input type="button" id="button1" value="Change info" onclick="enableButton3();
		 enableButton4();enableButton5(); enableButton6(); enableButton7(); enableButton8(); enableButton9();
		 enableButton10(); enableButton11(); disableButton12()"  />
				<button name="addz" type="submit" class="btn btn-success">
					Save info
				</button>
			</div>
		</div>
		
		 
	</div>
	
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-lg-4">Street</label>
			<div class="col-lg-8">
				<input name="Street" type="text" id="button7" value="<?php echo $Street; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Municipality</label>
			<div class="col-lg-8">
				<input name="Municipality" type="text" id="button8" value="<?php echo $Municipality; ?>"  class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Postal</label>
			<div class="col-lg-8">
				<input name="Postal" type="text" id="button9"  value="<?php echo $Postal; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Birthdate</label>
			<div class="col-lg-8">
				<input name="Birthdate" type="date" id="button10" value="<?php echo $Birthdate; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Gender</label>
			<div class="col-lg-8">
				<input name="Gender" type="text"  id="button11" value="<?php echo $Gender; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Status</label>
			<div class="col-lg-8">
				<input name="Status" type="text"  value="<?php echo $Status; ?>" class="form-control" disabled />
			</div>
		</div>
		
	
	</div>
</form>

<?php

if (isset($_POST['submit']))
{
	$send =  $_SESSION['userid'];
	$target = "../upload/$send/";
	$target = $target . basename($_FILES['uploaded']['name']);
	$ok = 1;
	if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
	{
		echo "The file " . basename($_FILES['uploaded']['name']) . " has been uploaded";
	}
	else
	{
		echo "Sorry, there was a problem uploading your file";
	}
}

?>

<?php

if (isset($_POST['YES']))
{
	$target = "../uploads/Pagibig/";
	$target = $target . basename($_FILES['pload']['name']);
	$ok = 1;
	if (move_uploaded_file($_FILES['pload']['tmp_name'], $target))
	{
		echo "The file " . basename($_FILES['pload']['name']) . " has been uploaded";
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
		$upload = "../uploads/Philhealth/"; # location where to upload the image
		$filed = $_FILES["goed"]; # gets the file from file upload
		$newfiled = date('YmdHis-') . basename($filed); # eg. 20170322051234-sample.jpg
		$file = $upload . $newfiled;

	
	if (move_uploaded_file($_FILES["goed"]["tmp_name"], $file))
	{
		echo "The file " . basename($_FILES['goed']['name']) . " has been uploaded";
	}
	else
	{
		echo "Sorry, there was a problem uploading your file.";
	}
	
	$sql_add = "INSERT INTO requirementsjob VALUES ('',  $appID , 1, 2,
			NOW(), 3, 4, NOW(), 5, 6, NOW(), '$newfiled')";
		$con->query($sql_add) or die(mysqli_error($con));
		header('location: index.php');
	
}

?>

<div style="float:right;">
<form action="profile.php" enctype="multipart/form-data" method="post"> 
<label style="float:left;">SSS</label>
<input name="uploaded" type="file" >
<input type="submit" name="submit" value="Upload" style="width:91px;">
Please choose a file:

 <?php
 $userID = $_SESSION['userid'];

$path = "../upload/". $userID ."/";

$files = scandir($path);
foreach ($files as &$value) {
    if(!($value == "." || $value == ".." ))
	echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
}
?>

<br>
<br>
<label style="float:left;">PhilHealth</label>
<input name="goed" type="file" >
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
<input name="pload" type="file" >
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
	include_once('../includes/footer.php');
?>