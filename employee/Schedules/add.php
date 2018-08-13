<?php 
	$page_title = "Add a Schedule";
    include_once('../../includes/header_employee.php');

	validateAccess();
	//---------------------------------------------------------------------
	 $sql_time = "SELECT TimeID, Time FROM time ORDER BY time";
    $result_time = $con->query($sql_time);

    $list_time = "";
	while ($row = mysqli_fetch_array($result_time))
	{
		$TimeID = $row['TimeID'];
		$Time = $row['Time'];
		$list_time .= "<option value='$TimeID'>$Time</option>";
	} 
	//---------------------------------------------------------------------
	 $sql_record = "SELECT
	 shortlist.RecordID,
	 shortlist.Remarks,
	 applications.status,
	 applications.Name
	 
	 FROM shortlist 
	 INNER JOIN applications ON shortlist.applyID = applications.applyID
	 INNER JOIN users ON applications.userID = users.userID
	 
	 where applications.status='Shortlisted'
	 ORDER BY RecordID";
	 
    $result_record = $con->query($sql_record);

    $list_record = "";
	while ($row = mysqli_fetch_array($result_record))
	{
		$RecordID = $row['RecordID'];
		$Remarks = $row['Remarks'];
		$Name = $row['Name'];
		$list_record .= "<option value='$RecordID'>$RecordID,$Remarks,$Name</option>";
	} 
	//---------------------------------------------------------------------
	 $sql_employee = "SELECT userID, Email FROM users where typeID=5 ORDER BY userID";
    $result_employee = $con->query($sql_employee);

    $list_employee = "";
	while ($row = mysqli_fetch_array($result_employee))
	{
		$userID = $row['userID'];
		$Email = $row['Email'];
		$list_employee .= "<option value='$userID'>$Email</option>";
	} 
	//---------------------------------------------------------------------
	if (isset($_POST['add']))
	{
		$Timez = mysqli_real_escape_string($con, $_POST['TimeID']);
		$Employeez = mysqli_real_escape_string($con, $_POST['userID']);
		$Recordz = mysqli_real_escape_string($con, $_POST['recordID']);
		$date = mysqli_real_escape_string($con, $_POST['dateadded']);
		$Remarked = mysqli_real_escape_string($con, $_POST['remarks']);
	
		$sql_check = "SELECT TimeID, userID, recordID FROM schedule WHERE TimeID='$Timez' AND userID='$Employeez' AND recordID='$Recordz'";
		$result_check = $con->query($sql_check) or die(mysqli_error($con));
		if (mysqli_num_rows($result_check) == 0)
		{
		
			
			
								if(date('l', strtotime($date)) == 'Sunday' || date('l', strtotime($date)) == 'Saturday')  
								{
									
									echo "<script>alert('The day is Sunday or Saturday you must not choose these dates');</script>";
									
										
								} 
								else
								{
									$sql_add = "INSERT INTO schedule VALUES ('', $Recordz,
										'$Employeez', '$Timez', '$Remarked', 'Active',
										
										 NOW(), NULL)";
									$con->query($sql_add) or die(mysqli_error($con));
									header('location: add.php');
									
								}
		
		
		
													
	
	    }
		else
		{
			echo "<script>alert('Slot Taken');</script>";
		}
	
	}
	?>

	<form method="POST" class="form-horizontal" enctype="multipart/form-data">
	<div class="container">
<div class="form-group">
      <label class="control-label" for="focusedInput">Record</label>
      <div>
        <select name="recordID" class="form-control" id="select">
          <option>--Select One--</option>
				<?php echo $list_record; ?>
        </select>
<div class="form-row">
      <label class="control-label" for="focusedInput">Employee</label>
      <div>
        <select name="userID" class="form-control" id="select">
          <option>--Select One--</option>
				<?php echo $list_employee; ?>
        </select>
<div class="form-row">
  <label class="control-label" for="focusedInput">Date</label>
  <input class="form-control" name="dateadded" id="datepicker" type="date" value="This is focused...">
  
</div>
<div class="form-row">
      <label class="control-label" for="focusedInput">Time Slot</label>
      <div>
        <select name="TimeID" class="form-control" id="select">
          <option>--Select One--</option>
          <?php echo $list_time; ?>

        </select>
<div class="form-row">
  <label class="control-label" for="focusedInput">Remarks</label>
  <textarea rows="5" name="remarks" class="form-control" id="focusedInput" type="text" value="This is focused..."></textarea>
</div>
<br/>
<div class="form-row">
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