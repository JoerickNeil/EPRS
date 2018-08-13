<?php 
	$page_title = "View Job";
    include_once('../../includes/header_admin.php');

    validateAccess();
    

    $sql_jobs = "SELECT jobs.jobID, clients.contactperson, categories.category, cities.name,
	jobs.code, jobs.title, jobs.description, jobs.requirements, 
	jobs.startprice, jobs.endprice, jobs.datestarted, jobs.duedate,
	jobs.contractdate, jobs.totalslots, jobs.available, jobs.status, 
	jobs.dateadded, jobs.datemodified
    	FROM jobs  
    	INNER JOIN clients ON jobs.clientID = clients.clientID
		INNER JOIN categories ON jobs.catID = categories.catID
		INNER JOIN cities ON jobs.cityID = cities.cityID
    	WHERE jobs.status!='Archived'";

    $result_jobs = $con->query($sql_jobs);

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-12">
		<table id="tblUsers" class="table table-hover">
			<thead>
				<th>#</th>
				<th>Client Name</th>
				<th>Category</th>
				<th>City</th>
				
				<th>Code</th>
				<th>Title</th>
				<th>Description</th>
				
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
				<th>DateModified</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($result_jobs))
					{
						$jobID = $row['jobID'];
						$clientID = $row['contactperson'];
						$catID = $row['category'];
						$cityID = $row['name'];
						
						$code = $row['code'];
						$title = $row['title'];
						$description = $row['description'];
						
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
						$datemodified = $row['datemodified'];

						echo "
							<tr>
								<td>$jobID</td>
								<td>$clientID</td>
								<td>$catID</td>
								<td>$cityID</td>
								
								<td>$code</td>
								<td>$title</td>
								<td>$description</td>
								
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
								<td>$datemodified</td>
								<td>
									
									<a href='delete.php?id=$jobID' class='btn btn-primary' role='button' style='width: 100%;'>Archive</a>
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