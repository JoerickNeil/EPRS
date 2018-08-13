<?php 
	$page_title = "Profile";
    include_once('../includes/header_SuperAdmin.php');

    validateAccess();
?>
 <?php 
 $userID = $_SESSION['userid'];
    $sql_application = "SELECT 
		
		types.typeID,
		users.Name,
		users.email,
		users.status,
		users.dateadded
		
		FROM users 
		INNER JOIN types ON users.typeID = types.typeID 
    	where users.userID=$userID
    	
    	";

    $result_application = $con->query($sql_application);
while ($row = mysqli_fetch_array($result_application))
			{
					  
					   $typeID = $row['typeID'];
					   $Name = $row['Name'];
					   $email = $row['email'];
					   $status = $row['status'];
					   $dateadded = $row['dateadded'];
					  
									
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
			<label class="control-label col-lg-4">First Name</label>
			<div class="col-lg-8">
				<input name="Name" type="text" id="button3" value=" <?php echo $Name; ?>"  class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Email</label>
			<div class="col-lg-8">
				<input name="email" type="text" id="button4" value="<?php echo $email; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Status</label>
			<div class="col-lg-8">
				<input name="email" type="text" id="button5" value="<?php echo $status; ?>" class="form-control" disabled />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-4">Date Joined</label>
			<div class="col-lg-8">
				<input name="pw" type="text" id="button6" value="<?php echo $dateadded; ?>" class="form-control" disabled />
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

					$Name = mysqli_real_escape_string($con, $_POST['Name']);
					$email = mysqli_real_escape_string($con, $_POST['email']);
					
					
					
					$sql_update = "UPDATE users SET Name='$Name', email='$email'  
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
				 <input type="button" id="button1" value="Change info" onclick="enableButton3(); enableButton4(); disableButton12()"/>
<button name="addz" type="submit" class="btn btn-success">
					Save info
				</button>
			</div>
		</div>
	</div>
	
</form>




<?php
	include_once('../includes/footer.php');
?>