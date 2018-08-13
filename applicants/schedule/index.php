<?php 
		
	$page_title = "View Job Schedule";
    include_once('../../includes/header_applicants.php');

    validateAccess();
    
	
	$userID = $_SESSION['userid'];
	
    $sql_sched = "SELECT 
	
	
	time.Time, 
	schedule.remarks,
	schedule.status,
	schedule.dateadded,
	schedule.datemodified
	
	
    	FROM schedule 
		
		
    	INNER JOIN time ON schedule.TimeID = time.TimeID
		
		
    	WHERE schedule.userID=$userID ";

    $result_sched = $con->query($sql_sched);
	

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				
				
				<th>Time</th>
				<th>Remarks</th>
				<th>Status</th>
				<th>DateAdded</th>
				<th>DateModified</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_sched))
					{
						
					
						$Time = $row['Time'];
						$Remarks = $row['remarks'];
						$Status = $row['status'];
						$DateAdded = $row['dateadded'];
						$DateModified = $row['datemodified'];
						echo "
							<tr>
								
								
								<td>$Time</td>
								<td>$Remarks</td>
								<td>$Status</td>
								<td>$DateAdded</td>
								<td>$DateModified</td>
								
								<td>
									<a href='assignment.php?id=$userID' class='btn btn-xs btn-warning' title='Cancel?'>
										<i class='fa fa-book'> Cancel</i>
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