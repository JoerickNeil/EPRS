<?php 
		
	$page_title = "View Job";
    include_once('../../includes/header_clients.php');

    validateAccess();
    
	
	$userID = $_SESSION['userid'];
	
    $sql_jobs = "SELECT 
	
	
	clients.contactperson, 
	clients.clientID,
	
	categories.category,
	
	jobs.jobID,
	jobs.code,
	jobs.title,
	
	jobs.requirements, 
	jobs.startprice,
	jobs.endprice,
	jobs.datestarted,
	jobs.duedate,
	jobs.contractdate,
	jobs.totalslots,
	jobs.available,
	jobs.status, 
	jobs.dateadded
	
	
    	FROM jobs 
		
		
    	INNER JOIN clients ON jobs.clientID = clients.clientID
		INNER JOIN categories ON jobs.catID = categories.catID
		INNER JOIN cities ON jobs.cityID = cities.cityID
		
    	WHERE clients.userID=$userID AND jobs.status!='Archived'";

    $result_jobs = $con->query($sql_jobs);
	

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				
				
				<th>Client Name</th>
				<th>Category</th>
				
				
				<th>Code</th>
				<th>Title</th>
				
				
				<th>Requirements</th>
				<th>StartPrice</th>
				<th>EndPrice</th>
				
				<th>DateStarted</th>
				<th>DueDate</th>
				<th>ContractDate</th>
				
				<th>TotalSlots</th>
				<th>Available</th>
				<th>Status</th>
				
				<th>DateAdded</th>
				
				<th></th>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_jobs))
					{
						
					
						$contactperson = $row['contactperson'];
						$clientID = $row['clientID'];
						$jobID = $row['jobID'];
						$catID = $row['category'];
						
						
						$code = $row['code'];
						$title = $row['title'];
						
						
						$requirements = $row['requirements'];
						$startprice = number_format($row['startprice'], 2);
						$endprice = $row['endprice'];
						
						$datestarted = $row['datestarted'];
						$duedate = $row['duedate'];
						$contractdate = $row['contractdate'];
						
						$totalslots = $row['totalslots'];
						$available = $row['available'];
						$status = $row['status'];
						
						$dateadded = $row['dateadded'];
						

						echo "
							<tr>
								
								
								<td>$contactperson</td>
								<td>$catID</td>
								
								
								<td>$code</td>
								<td>$title</td>
								
								
								<td>$requirements</td>
								<td>$startprice</td>
								<td>$endprice</td>
								
								<td>$datestarted</td>
								<td>$duedate</td>
								<td>$contractdate</td>
								
								<td>$totalslots</td>
								<td>$available</td>
								<td>$status</td>
								
								<td>$dateadded</td>
								
								<td>
									<a href='assignment.php?id=$jobID' class='btn btn-xs btn-warning' title='View assignments of this job'>
										<i class='fa fa-book'> Assignments</i>
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