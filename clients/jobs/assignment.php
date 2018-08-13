<?php 

# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "Job #$id";
		   include_once('../../includes/header_clients.php');

		 
			  $sql_assignment = "SELECT 
					
					jobs.jobID,
					jobs.title,
				
					users.userID,
					
					clients.contactperson,
				
					
				
					applicants.Firstname,
					applicants.status,
					
					assignments.Remarks,
					assignments.terminationdate,
					assignments.renewaldate,
					assignments.status
			

						FROM assignments  
						
						INNER JOIN users ON assignments.userID = users.userID
						INNER JOIN jobs ON assignments.jobID = jobs.jobID
						INNER JOIN clients ON assignments.clientID = clients.clientID
						INNER JOIN applicants ON assignments.appID = applicants.appID
						
						
						where jobs.jobID=$id AND applicants.status='Unavailable'
    	";
			$result_assignments = $con->query($sql_assignment);

			


		}
	}
?>

<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				
				
				<th>Clients Name</th>
				<th>Job Name</th>
				<th>Applicant's Name</th>
				<th>Remarks</th>
				<th>Termination Date</th>
				<th>Renewal Date</th>
				<th>Status</th>
				
				

				
				
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_assignments))
					{
						
					   
						$Name = $row['contactperson'];
						$Jname = $row['title'];
						$Aname = $row['Firstname'];
						$Remarks = $row['Remarks'];
						$Termination = $row['terminationdate'];
						$renewaldate = $row['renewaldate'];
						$status = $row['status'];
						

						echo "
							<tr>
								
								
								<td>$Name</td>
								<td>$Jname</td>
								
								
								<td>$Aname</td>
								<td>$Remarks</td>
								
								
								<td>$Termination</td>
								<td>$renewaldate</td>
								<td>$status</td>
								
								
								
								
							</tr>
						";
					}

				?>
			</tbody>
		</table>
		<script>
			$(document).ready(function() {
    $('#tblUsers').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
		</script>
	</div>
</form>
<?php
	include_once('../../includes/footer.php');
?>
