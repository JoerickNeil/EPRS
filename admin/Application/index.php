<?php 
	$page_title = "View Application";
    include_once('../../includes/header_admin.php');

    validateAccess();
    
	
    $sql_application = "SELECT applications.applyID, users.email, jobs.code,
	applications.dateapplied, applications.dateapprove, applications.datereject, applications.datecancel, 
	applications.remarks, applications.status
    	FROM applications  
    	INNER JOIN users ON applications.userID = users.userID
		INNER JOIN jobs ON applications.jobID = jobs.jobID
    	WHERE applications.status!='Archived'";

    $result_application = $con->query($sql_application);

?>

<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				<th>#</th>
				<th>Job #</th>
				<th>Email</th>
				
				
				<th>Date Applied</th>
				<th>Date Approve</th>
				<th>Date Reject</th>
				<th>Date Cancel</th>
				
				<th>Remarks</th>
				<th>Status</th>
				
				<th></th>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_application))
					{
						$applyID = $row['applyID'];
						$userID = $row['email'];
						$jobID = $row['code'];
						
						
						$dateapplied = $row['dateapplied'];
						$dateapprove = $row['dateapprove'];
						$datereject = $row['datereject'];
						$datecancel = $row['datecancel'];
						
						$remarks = $row['remarks'];
						$status = $row['status'];
						

						echo "
							<tr>
								<td>$applyID</td>
								<td>$jobID</td>
								<td>$userID</td>
								
								
								<td>$dateapplied</td>
								<td>$dateapprove</td>
								<td>$datereject</td>
								<td>$datecancel</td>
								
								<td>$remarks</td>
								<td>$status</td>
								
								<td>
									<a href='details.php?id=$applyID' class='btn btn-xs btn-warning' title='View application'>
										<i class='fa fa-book'> Applications</i>
									<a href='shortlistadd.php?id=$applyID' class='btn btn-xs btn-danger' title='View Shortlist'>
										<i class='fa fa-list'> Shortlist</i>
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