<?php 
	$page_title = "My Products";
    include_once('includes/header.php');

    if (isset($_POST['search']))
    {
    	$keyword = mysqli_real_escape_string($con, $_POST['keyword']);
    	header('location: products.php?s=' . $keyword);
    }
    if (isset($_REQUEST['c']))
    {
    	if (ctype_digit($_REQUEST['c']))
		{
			$catid = $_REQUEST['c'];
			# displays list of products based from selected category
		    $sql_products = "SELECT p.productID, c.name AS catName, p.name,
		    	p.description, p.price, p.image, p.status, 
		    	p.addedOn, p.lastModified 
		    	FROM products p 
		    	INNER JOIN categories c ON p.catID = c.catID
		    	WHERE p.status!='Archived' AND p.catID=$catid";
		}
		else
		{
			header('location: products.php');
		}
    }
    else if (isset($_REQUEST['s']))
    {
    	$filter = "'%" . $_REQUEST['s'] . "%'";
    	# displays list of products based from keyword
	    $sql_products = "SELECT p.productID, c.name AS catName, p.name,
	    	p.description, p.price, p.image, p.status, 
	    	p.addedOn, p.lastModified 
	    	FROM products p 
	    	INNER JOIN categories c ON p.catID = c.catID
	    	WHERE p.status!='Archived' AND
	    	(c.name LIKE $filter OR
	    	p.name LIKE $filter OR
	    	p.description LIKE $filter)";
    }
    else if (isset($_REQUEST['sort']))
    {
    	$sort = $_REQUEST['sort'];
    	$column = $sort == "name" ? "p.name" : 
    		$sort == "price" ? "p.price" : "p.productID";

    	# displays list of products sorted by name (A-Z) or price (min-max)
	    $sql_products = "SELECT p.productID, c.name AS catName, p.name,
	    	p.description, p.price, p.image, p.status, 
	    	p.addedOn, p.lastModified 
	    	FROM products p 
	    	INNER JOIN categories c ON p.catID = c.catID
	    	WHERE p.status!='Archived'
	    	ORDER BY $column";
    }
    else
    {
		# displays list of products
	    $sql_products = "SELECT p.productID, c.name AS catName, p.name,
	    	p.description, p.price, p.image, p.status, 
	    	p.addedOn, p.lastModified 
	    	FROM products p 
	    	INNER JOIN categories c ON p.catID = c.catID
	    	WHERE p.status!='Archived'";
    }
    

    $result_products = $con->query($sql_products);

    # displays list of categories
    $sql_cat = "SELECT c.catID, c.name AS catName,
    	(SELECT COUNT(productID) FROM products
    	WHERE catID = c.catID AND status!='Archived') AS totalCount
    	FROM categories c
    	ORDER BY c.name";

    $result_cat = $con->query($sql_cat);

?>
<form method="POST" class="form-horizontal">
	<div class="col-lg-3">
		<div class="input-group">
			<input name="keyword" class="form-control" placeholder="Keyword..." />
			<span class="input-group-btn">
				<button name="search" type="submit" class="btn">
					<i class="fa fa-search"></i>
				</button>
			</span>
		</div>
		<br/>
		<div class="list-group">
			<a href='products.php' class='list-group-item'>
				<span class='badge'><?php echo countData('products'); ?></span>
				All Categories
			</a>
			<?php
				while ($row = mysqli_fetch_array($result_cat))
				{
					$cid = $row['catID'];
					$catName = $row['catName'];
					$total = $row['totalCount'];

					echo "
						<a href='products.php?c=$cid' class='list-group-item'>
							<span class='badge'>$total</span>
							$catName
						</a>
					";
				}
			?>
		</div>
	</div>
	<div class="col-lg-9">
		<?php
			if (mysqli_num_rows($result_products) > 0)
			{
				while ($row = mysqli_fetch_array($result_products))
				{
					$pid = $row['productID'];
					$image = $row['image'];
					$name = $row['name'];
					$cat = $row['catName'];
					$price = $row['price'];

					echo "
						<a href='details.php?id=$pid' class='product'>
							<div class='col-lg-4'>
								<div class='thumbnail'>
									<div class='ratio' style=\"background-image: url('images/products/$image')\">
		                           	</div>
									<div class='caption'>
										<h3>$name</h3>
										<small>$cat</small><br/>
										P$price
										<hr/>
										<button name='addtocart' class='cart btn btn-success btn-block' type='submit' data-id='$pid'>
											<i class='fa fa-plus'></i> Add to Cart
										</button>
									</div>
								</div>
							</div>
						</a>
					";
				}
			}
			else
			{
				echo "
					<div class='col-lg-12'>
						<div class='thumbnail'>
							<br/>
							<br/>
							<h2 class='text-center'>No records found.</h2>
							<br/>
							<br/>
						</div>
					</div>
				";
			}
		?>
	</div>
</form>
<script>
	$('.cart').on('click', function(event){
		event.preventDefault();
		var url = 'addtocart.php?id=' + $(this).data('id');
		location.replace(url);
	});
</script>

<?php
	include_once('includes/footer.php');
?>