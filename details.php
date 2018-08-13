<?php 
# checks if record is selected
	if (isset($_REQUEST['id']))
	{
		# checks if selected record is an ID value
		if (ctype_digit($_REQUEST['id']))
		{
			$id = $_REQUEST['id'];

			$page_title = "Product #$id";
		    include_once('includes/header.php');

		    # display existing record
			$sql_data = "SELECT p.productID, p.catID, c.name AS catName, 
				p.name,
		    	p.description, p.price, p.image, p.status, 
		    	p.addedOn, p.lastModified 
		    	FROM products p 
		    	INNER JOIN categories c ON p.catID = c.catID
		    	WHERE p.status!='Archived' AND p.productID=$id";
			$result_data = $con->query($sql_data);

			# checks if record is not existing
			if (mysqli_num_rows($result_data) == 0)
			{
				header('location: index.php');
			}

			while ($row = mysqli_fetch_array($result_data))
			{
				$status = $row['status'];
				$catID = $row['catID'];
				$catName = $row['catName'];
				$pname = $row['name'];
				$desc = $row['description'];
				$price = $row['price'];
				$image = $row['image'];
				$added = $row['addedOn'];
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
?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-6">
		<img src="images/products/<?php echo $image; ?>" class="img-responsive"
			alt="<?php echo $pname; ?>"/>
	</div>
	<div class="col-lg-6">
		<h1><?php echo $pname; ?></h1>
		<hr/>
		<?php echo $desc; ?><br/>
		<small>Category: <a href='products.php?c=<?php echo $catID; ?>'><?php echo $catName; ?></a></small>
		<br/>
		Price: P<?php echo $price; ?>
		<hr/>
		<div class="col-lg-4 input-group">
			<input name="qty" class="form-control" value="1" type="number"
				min="1" max="99" required />
			<span class="input-group-btn">
				<button name="add" type="submit" class="btn btn-success">
					Add to Cart
				</button>
			</span>
		</div>
	</div>
</form>

<?php
	include_once('includes/footer.php');
?>