   <?php 
# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "Record #$id";
		   include_once('../../includes/header_admin.php');

		    # display existing recobord
			 $sql_assignment = "SELECT 
	
					
					shortlist.applyID,
					
					users.Name,
					users.userID,
					
					
					
					jobs.jobID,
					jobs.title,
				
					clients.ClientID,
				
					applications.applyID,
					applications.status,
				
					
					applicants.Firstname,
					applicants.lastname,
					applicants.appID,
					
					
					schedule.schedID,
					schedule.remarks,
					schedule.recordID,
					schedule.status, 
					schedule.dateadded,
					schedule.datemodified 
					
					
					
						FROM schedule  
						
						INNER JOIN jobs ON schedule.recordID = jobs.jobID
						INNER JOIN users ON schedule.userID = users.userID
						INNER JOIN clients ON jobs.ClientID = clients.ClientID
						
						INNER JOIN shortlist ON schedule.recordID = shortlist.recordID
						
						INNER JOIN applications ON shortlist.applyID = applications.applyID
						INNER JOIN applicants ON shortlist.appID = applicants.appID
						where schedule.schedID='$id' AND applications.status='Shortlisted'
    	";
		
			$result_assignment = $con->query($sql_assignment);

			# checks if record is not existing
		if(mysqli_num_rows($result_assignment) > 0)

		{
				while ($row = mysqli_fetch_array($result_assignment))
			{
						$userID = $row['userID'];
						$ClientID = $row['ClientID'];
						$jobID = $row['jobID'];
						$appID = $row['appID'];
						$applyID = $row['applyID'];
						
						
						$Firstname = $row['Firstname'];
						$title = $row['title'];
						
					
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
	}
?>

	<form method="POST" class="form-horizontal" enctype="multipart/form-data">
	
	<div class="container" style="border: 1px solid black;">
<div class="form-group">
  <label class="control-label" for="disabledInput">Applicant Name</label>
  <input class="form-control" id="disabledInput" type="text" value="<?php echo $Firstname; ?>" readonly="" >
</div>
<div class="form-group">
  <label class="control-label" for="disabledInput">Job title</label>
  <input class="form-control" id="disabledInput" type="text"  value="<?php echo $title; ?>" readonly="">
</div>
<div class="form-group">
  <label class="control-label" for="focusedInput">Remarks</label>
  <textarea rows="5" class="form-control" name="remarks" id="focusedInput" type="text" value="Remarks"></textarea>
</div>
<div class="form-group">
      <div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="reset" class="btn btn-warning">Cancel</button>
      </div>
      <br>
<div>
<?php
if (isset($_POST['add']))
	{
		$Remarks = mysqli_real_escape_string($con, $_POST['remarks']);
			$sql_updates = "UPDATE applicants SET  status='Unavailable'  where appID=$appID";
			$sql_update = "UPDATE applications SET  status='Hired'  where applyID=$applyID";
			$sql_add = "INSERT INTO assignments VALUES ('', $userID, $ClientID,
				$jobID, $appID, '$Remarks', NULL,  NULL, 'Active', NOW() )";
				
			$con->query($sql_updates) or die(mysqli_error($con));	
			$con->query($sql_update) or die(mysqli_error($con));	
			$con->query($sql_add) or die(mysqli_error($con));
			header('location: index.php');
		
	}
	?>
	<p>
        <button name="add" type="submit" class="btn btn-success" role="button" style="width: 150px; height: 75px; position:">
					Add to Assignments
				</button>
          <a href="#" class="btn btn-danger" role="button" style="width: 130px; height: 75px; position:"><br/>Reject</a>
          <a href="#" class="btn btn-warning" role="button" style="width: 130px; height: 75px; position:"><br/>Cancel</a>
    </p>
</div>
</div>
</form>

<?php
	include_once('../../includes/footer.php');
?>