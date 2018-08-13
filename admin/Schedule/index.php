<?php 
	$page_title = "View Schedules";
    include_once('../../includes/header_admin.php');

    validateAccess();
    

    $sql_sched = "SELECT 
	
	schedule.schedID,
	schedule.recordID,
	users.Name,
	time.Time,
	

	schedule.remarks,
    applicants.Firstname,
    applicants.lastname,
	schedule.status, 
	schedule.dateadded,
	schedule.datemodified 
	
	
    	FROM schedule  
		
    	INNER JOIN users ON schedule.userID = users.userID
		INNER JOIN time ON schedule.TimeID = time.TimeID
        INNER JOIN shortlist ON schedule.recordID = shortlist.recordID
        INNER JOIN applicants ON shortlist.appID = applicants.appID";

    $result_sched = $con->query($sql_sched);

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				<th>Schedule #</th>
				<th>Record #</th>
				<th>HR Name</th>
				<th>Time</th>
				<th>Firstname</th>
				<th>Lastname</th>
				
				<th>Remarks</th>
				<th>Status</th>
				<th>Dateadded</th>
				<th>Datemodified</th>
				
				
				<th></th>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_sched))
					{
						$schedID = $row['schedID'];
						$recordID = $row['recordID'];
						$Name = $row['Name'];
						$Time = $row['Time'];
						$Firstname = $row['Firstname'];
						$lastname = $row['lastname'];
						
						$remarks = $row['remarks'];
						$status = $row['status'];
						$dateadded = $row['dateadded'];
						$datemodified = $row['datemodified'];
						

						echo "
							<tr>
								<td>$schedID</td>
								<td>$recordID</td>
								<td>$Name</td>
								<td>$Time</td>
								<td>$Firstname</td>
								<td>$lastname</td>
								
								<td>$remarks</td>
								<td>$status</td>
								<td>$dateadded</td>
								<td>$datemodified</td>
								
								<td>
									<a href='addassignment.php?id=$schedID' class='btn btn-xs btn-info'>
										<i class='fa fa-edit'></i>
									</a>
									<a href='delete.php?id=$schedID' class='btn btn-xs btn-danger' 
										onclick='return confirm(\"Archived record?\");''>
										<i class='fa fa-trash'></i>
									</a>
								</td>
							</tr>
						";
					}

				?>
			</tbody>
		</table>
		<script>
			$(document).ready(function(){
			    $('#tblUsers').DataTable();
			});
		</script>
	</div>
</form>

<?php
	include_once('../../includes/footer.php');
?>