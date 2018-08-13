<?php 
	$page_title = "View Shortlist";
    include_once('../../includes/header_admin.php');

    validateAccess();
    

    $sql_shortlist = "SELECT
	shortlist.recordID, 
	shortlist.dateadded,
	shortlist.remarks,
	applications.dateapplied,
	applications.dateapprove,
	applications.datereject,
	applications.datecancel,
	applicants.Firstname,
	applicants.Status,
	applicants.Resume,
	applicants.Dateadded
    	FROM shortlist  
    	INNER JOIN applications ON shortlist.applyID = applications.applyID
		INNER JOIN applicants ON shortlist.appID = applicants.appID";

    $result_shortlist = $con->query($sql_shortlist);

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				<th>#</th>
				<th>Firstname</th>
				<th>Record made at</th>
				<th>Record remarks</th>
				<th>Date Applied</th>
				<th>Date Approve</th>
				<th>Date Reject</th>
				<th>Date Cancel</th>
				<th>Resume</th>
				<th>Joined</th>
				<th>Applicant Status</th>
				
				
				
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_shortlist))
					{
						$recordID = $row['recordID'];
						$firstname = $row['Firstname'];
						$recordmade = $row['dateadded'];
						$recordremarks = $row['remarks'];
						
						$dateapplied = $row['dateapplied'];
						$dateapprove = $row['dateapprove'];
						$datereject = $row['datereject'];
						$datecancel = $row['datecancel'];
						
						$resume = $row['Resume'];
						$joined = $row['Dateadded'];
						$applicantstatus = $row['Status'];
						

						echo "
							<tr>
								<td>$recordID</td>
								<td>$firstname</td>
								<td>$recordmade</td>
								<td>$recordremarks</td>
								
								<td>$dateapplied</td>
								<td>$dateapprove</td>
								<td>$datereject</td>
								<td>$datecancel</td>
								
								<td>$resume</td>
								<td>$joined</td>
								<td>$applicantstatus</td>
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