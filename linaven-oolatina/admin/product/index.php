<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Products Management</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 	<style>
		body{font-family:Arial, Helvetica, sans-serif; padding:15px;}
		.topbar{margin-bottom:25px;}
		table{font-size:12px;}
		form{width:400px; margin-left:20px;}
	</style>
</head>
<body>    

<?php

// config
if(!file_exists('config.php')) die('[index.php] config.php not found');
else include('config.php');
	
  $act = !empty($_GET['act']) ? trim($_GET['act']) : '';
  
  switch($act){
	  
	  case 'add':
	  
	  	  echo '<div class="topbar text-right"><a href="?" class="btn btn-primary">Back to Products</a></div>';
		  
		  if(!empty($_POST)){
			  $errors = array();
			  //validate form
			  foreach($_POST as $k => $val){
				  if($_POST[$k] == '') $errors[$k] = $k.' is required!';
			  }
			  
			  if(!empty($errors)){
				  echo '<div class="alert alert-danger">';
				  foreach($errors as $error){
					 echo $error.'<br />';
				  }
				  echo '</div>';
			  }
			  else{
				  
				  $query = 'INSERT INTO products SET 
				  			title = "'.$_POST['title'].'", short_description = "'.$_POST['short_description'].'", description = "'.$_POST['description'].'",
							category = "'.$_POST['category'].'", sku = "'.$_POST['sku'].'", currency = "'.$_POST['currency'].'", price_supplier = "'.$_POST['price_supplier'].'", 
							price = "'.$_POST['price'].'", 	status = "'.$_POST['status'].'", stock_quantity = "'.$_POST['quantity'].'", meta_title = "'.$_POST['meta_title'].'",
							meta_description = "'.$_POST['meta_description'].'", meta_keywords = "'.$_POST['meta_keywords'].'"';				
				  
				  $result = mysqli_query($db, $query);
				 
				  if($result){
					  
					   $product_id = mysqli_insert_id($db);

					   if($_FILES['imgs']['error'][0] != 4){
						   for($i=0; $i<count($_FILES['imgs']['name']); ++$i){
							   $file_name = rand().time();
							   $extn = strtolower(strrchr($_FILES['imgs']['name'][$i], '.'));
							   $furl = $file_name.$extn;
							   move_uploaded_file($_FILES['imgs']['tmp_name'][$i], 'uploads/'.$furl);
							   
							   $query2 = 'INSERT INTO product_imgs SET product_id = '.$product_id.', img_url = "'.$furl.'"';
							   mysqli_query($db, $query2);
						   }
					   }
					  
					  redirect_to(get_main_url());
				  }
				  else{
					  echo '<div class="alert alert-danger">Could not add - '.mysqli_error($db).'</div>'; 
				  }
									
			  }
		  }
		  
$form = <<<EOF
	<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
		  <label>Title</label>
		  <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
		</div>
		<div class="form-group">
		  <label>Short Description</label>
		  <textarea name="short_description" class="form-control" rows="2" placeholder="Enter Short Description" required></textarea>
		</div>
		<div class="form-group">
		  <label>Description</label>
		  <textarea name="description" class="form-control" rows="5" placeholder="Enter Description" required></textarea>
		</div>
		<div class="form-group">
		  <label>SKU</label>
		  <input type="text" name="sku" class="form-control" placeholder="Enter SKU" required>
		</div>
		<div class="form-group">
		  <label>Currency</label>
		  <input type="text" name="currency" class="form-control" placeholder="Enter Currency" required>
		</div>
		<div class="form-group">
		  <label>Supplier Price</label>
		  <input type="text" name="price_supplier" class="form-control" placeholder="Enter Supplier Price" required>
		</div>
		<div class="form-group">
		  <label>Price</label>
		  <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
		</div>
		<div class="form-group">
		  <label>Stock Quantity</label>
		  <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required>
		</div>
		<div class="form-group">
		  <label>SEO Meta Title</label>
		  <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title" required>
		</div>
		<div class="form-group">
		  <label>SEO Meta Description</label>
		  <input type="text" name="meta_description" class="form-control" placeholder="Enter Meta Description" required>
		</div>
		<div class="form-group">
		  <label>SEO Meta Keywords</label>
		  <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" required>
		</div>
		<div class="form-group">
	  	  <label>Category</label>
		  <select name="category" class="form-control" required>
		  <option value="">Select Category</option>
EOF;

$SQL = "SELECT * FROM tbl_category";
$reponse = mysqli_query($db,$SQL);
while($req = mysqli_fetch_array($reponse))
{
	$form .= '<option value="'.$req['cat_name'].'">'.$req['cat_name'].'</option>';
}

/*foreach($categories as $category){
	$form .= '<option value="'.$category.'">'.$category.'</option>';
}*/

$form .= <<<EOF
	</select>
	</div>
	<div class="form-group">
	  <label>Status</label>
	  <select name="status" class="form-control" required>
		<option value="">Select Status</option>
		<option value="UP">UP</option>
		<option value="DOWN">DOWN</option>
	  </select>
	</div>
	<div class="form-group">
		<label>Upload IMGS</label>
		<input type="file" name="imgs[]" multiple>
   		<p class="help-block">Select multiple images by keep pressing ctrl/cmd button</p>
	</div>
	<div><button type="submit" class="btn btn-success btn-lg">Add Product</button></div>
	</form>
EOF;
		
	  echo $form;	
		  
	  break;
	  
	  case 'edit':
	  	  
		  if(!empty($_GET['id'])){
			  
			   echo '<div class="topbar text-right"><a href="?" class="btn btn-primary">Back to Products</a></div>';
			  
			  $id = $_GET['id'];
			  //get user
			  $query = 'SELECT * FROM products WHERE id = '.$id.' LIMIT 1';
			  $result = mysqli_query($db, $query);
			  if(!$result) exit('Product could not be found!');
			  
			  if(!empty($_POST)){
					$errors = array();
					//validate form
					foreach($_POST as $k => $val){
						if($_POST[$k] == '') $errors[$k] = $k.' is required!';
					}
					
					if(!empty($errors)){
						echo '<div class="alert alert-danger">';
						foreach($errors as $error){
						   echo $error.'<br />';
						}
						echo '</div>';
					}
					else{
						$query = 'UPDATE products SET 
								  title = "'.$_POST['title'].'", short_description = "'.$_POST['short_description'].'", description = "'.$_POST['description'].'",
								  category = "'.$_POST['category'].'", sku = "'.$_POST['sku'].'", currency = "'.$_POST['currency'].'", price_supplier = "'.$_POST['price_supplier'].'", 
								  price = "'.$_POST['price'].'", 	status = "'.$_POST['status'].'", stock_quantity = "'.$_POST['quantity'].'", meta_title = "'.$_POST['meta_title'].'",
								  meta_description = "'.$_POST['meta_description'].'", meta_keywords = "'.$_POST['meta_keywords'].'" WHERE id = '.$id.' LIMIT 1';				
						
						$result = mysqli_query($db, $query);
						if($result){
							
							$product_id = $id;
					   
						   //handle images
						   if($_FILES['imgs']['error'][0] != 4){
							   for($i=0; $i<count($_FILES['imgs']['name']); ++$i){
								   $file_name = rand().time();
								   $extn = strtolower(strrchr($_FILES['imgs']['name'][$i], '.'));
								   $furl = $file_name.$extn;
								   move_uploaded_file($_FILES['imgs']['tmp_name'][$i], 'uploads/'.$furl);
								   
								   $query2 = 'INSERT INTO product_imgs SET product_id = '.$product_id.', img_url = "'.$furl.'"';
								   mysqli_query($db, $query2);
							   }
						   }
							
							redirect_to(get_main_url());
						}
						else{
							echo '<div class="alert alert-danger">Could not add - '.mysqli_error($db).'</div>'; 
						}
										  
					}
				}
				
				$row = mysqli_fetch_array($result);
				
				echo '<form action="" method="post" class="form-horizontal">
						<div class="form-group">
						  <label>Title</label>
						  <input type="text" name="title" class="form-control" placeholder="Enter Title" value="'.$row['title'].'" required>
						</div>
						<div class="form-group">
						  <label>Short Description</label>
						  <textarea name="short_description" class="form-control" rows="2" placeholder="Enter Short Description" required>'.$row['title'].'</textarea>
						</div>
						<div class="form-group">
						  <label>Description</label>
						  <textarea name="description" class="form-control" rows="2" placeholder="Enter Description" required>'.$row['description'].'</textarea>
						</div>
						<div class="form-group">
						  <label>SKU</label>
						  <input type="sku" name="sku" class="form-control" placeholder="Enter SKU" value="'.$row['sku'].'" required>
						</div>
						<div class="form-group">
						  <label>Currency</label>
						  <input type="text" name="currency" class="form-control" placeholder="Enter Currency" value="'.$row['currency'].'" required>
						</div>
						<div class="form-group">
						  <label>Supplier Price</label>
						  <input type="text" name="price_supplier" class="form-control" placeholder="Enter Supplier Price" value="'.$row['price_supplier'].'" required>
						</div>
						<div class="form-group">
						  <label>Price</label>
						  <input type="text" name="price" class="form-control" placeholder="Enter Price" value="'.$row['price'].'" required>
						</div>
						<div class="form-group">
						  <label>Stock Quantity</label>
						  <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" value="'.$row['stock_quantity'].'" required>
						</div>
						<div class="form-group">
						  <label>SEO Meta Title</label>
						  <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title" value="'.$row['meta_title'].'" required>
						</div>
						<div class="form-group">
						  <label>SEO Meta Description</label>
						  <input type="text" name="meta_description" class="form-control" placeholder="Enter Meta Description" value="'.$row['meta_description'].'" required>
						</div>
						<div class="form-group">
						  <label>SEO Meta Keywords</label>
						  <input type="text" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="'.$row['meta_keywords'].'" required>
						</div>
						<div class="form-group">
						  <label>Status</label>
						  <select name="status" class="form-control" required>
							<option value="">Select Status</option>
							<option value="UP" '.is_selected($row['status'], 'UP').'>UP</option>
							<option value="DOWN" '.is_selected($row['status'], 'DOWN').'>DOWN</option>
						  </select>
						</div>
						<div class="form-group">
						  <label>Category</label>
						  <select name="category" class="form-control" required>
						  <option value="">Select Category</option>';
						
						foreach($categories as $category){
							echo '<option value="'.$category.'" '.is_selected($row['category'], $category).'>'.$category.'</option>';
						}
						
					echo '</select></div>
						<div class="form-group">
							<label>Upload IMGS</label>
							<input type="file" name="imgs[]" multiple>
							<p class="help-block">Select multiple images by keep pressing ctrl/cmd button</p>
						</div>
					   <div><button type="submit" class="btn btn-success btn-lg">Edit Product</button></div>
					</form>';
				   
			  
		  }
		  else exit('ID is missing from request!');
	  break;
	  
	  case 'imgs':
	  	  if(!empty($_GET['id'])){
			  $id = $_GET['id'];
			  $query = 'SELECT img_url FROM product_imgs WHERE product_id = '.$id;
			  $result = mysqli_query($db, $query);
		  	  if(!$result) exit('<p style="color:red;">No IMG available to show!</p>');
			  
			  echo '<div class="row">';
			  while ($row = mysqli_fetch_array($result)){
				  echo '<div class="col-xs-4"><img class="img-responsive" src="uploads/'.$row['img_url'].'" alt="'.$row['img_url'].'"></div>';
			  }
			  echo '</div>';
		  }
		  else exit('ID is missing from request!');
	  break;
	  
	  case 'delete':
	  	  if(!empty($_GET['id'])){
			  $id = $_GET['id'];
			  $query = 'DELETE FROM products WHERE id = '.$id.' LIMIT 1';
			  $result = mysqli_query($db, $query); 
			  if($result){
				  redirect_to(get_main_url());
			  }
		  }
		  else exit('ID is missing from request!');
	  break;
	  
	  case 'search':
	  
	  	  if(!empty($_POST['query'])){
			  
			  $squery = trim($_POST['query']);
	  	  
			  echo '<div class="row topbar"><div class="col-lg-6"><form><div class="input-group"><input type="text" name="query" class="form-control" value="'.$squery.'" placeholder="Enter your Search Query" required><span class="input-group-btn"><button class="btn btn-success" type="submit">Search</button></span></div></form></div><div class="col-lg-6 text-right"><a href="?" class="btn btn-primary">All Products</a></div></div>';
			
			  //list all users
			  $query = 'SELECT p.*, COUNT(i.id) AS total_imgs FROM products p LEFT JOIN product_imgs i ON i.product_id = p.id WHERE p.title LIKE "%'.$squery.'%" OR p.short_description LIKE "%'.$squery.'%" OR p.description LIKE "%'.$squery.'%" OR p.category LIKE "%'.$squery.'%" OR p.sku LIKE "%'.$squery.'%" GROUP BY p.id ORDER BY p.id DESC';
			  $result = mysqli_query($db, $query);
			  if(!$result) exit('<p style="color:red;">No Data available to show!</p>');
			  
			  echo '<table class="table table-striped table-bordered"><thead><tr>';
			  echo '<th>#</th> <th>IMGS</th> <th>Title</th> <th>Short Description</th> <th>Description</th> <th>Category</th> <th>SKU</th> <th>Currency</th> <th>Supplier Price</th> <th>Price</th> <th>Quantity</th> <th>Meta Title</th> <th>Meta Description</th> <th>Meta Keywords</th> <th>Status</th> <th>Added on</th> <th></th>';
			  echo '</tr></thead><tbody>';
			  
			  while ($row = mysqli_fetch_array($result)){
				  echo '<tr><td>'.$row['id'].' <td><a href="#" title="view IMGS">'.$row['total_imgs'].' imgs</a> <td>'.$row['title'].'</td> <td><abbr title="'.$row['short_description'].'">'.substr($row['short_description'],0,20).'</abbr></td>  <td><abbr title="'.$row['description'].'">'.substr($row['description'],0,30).'</abbr></td> <td>'.$row['category'].'</td> <td>'.$row['sku'].'</td> <td>'.$row['currency'].'</td> <td>'.$row['currency'].' '.$row['price_supplier'].'</td> <td>'.$row['currency'].' '.$row['price'].'</td> <td>'.$row['stock_quantity'].'</td> <td><abbr title="'.$row['meta_title'].'">'.substr($row['meta_title'],0,15).'</abbr></td> <td><abbr title="'.$row['meta_description'].'">'.substr($row['meta_description'],0,15).'</abbr></td> <td><abbr title="'.$row['meta_keywords'].'">'.substr($row['meta_keywords'],0,15).'</abbr></td> <td>'.$row['status'].'</td> <td>'.dnt_format($row['created_at']).'</td> <td align="right"> <a href="?act=edit&id='.$row['id'].'">Edit</a> | <a style="color:red;" href="?act=delete&id='.$row['id'].'" onclick="return confirm(\'Are you sure?\');">Delete</a></td></tr>';
			  }
			  
			  echo '</tbody></table>';
		  
		  }
		  else exit('Query is empty!');
		  
	  break;
	  
	  default:
	  
	  	  echo '<div class="row topbar"><div class="col-lg-6"><form action="?act=search" method="post"><div class="input-group"><input type="text" name="query" class="form-control" placeholder="Enter your Search Query" required><span class="input-group-btn"><button class="btn btn-success" type="submit">Search</button></span></div></form></div><div class="col-lg-6 text-right"><a href="?act=add" class="btn btn-primary">Add Product</a></div></div>';
	  	
		  //list all users
		  $query = 'SELECT p.*, COUNT(i.id) AS total_imgs FROM products p LEFT JOIN product_imgs i ON i.product_id = p.id GROUP BY p.id ORDER BY p.id DESC';
		  $result = mysqli_query($db, $query);
		  if(!$result) exit('<p style="color:red;">No Data available to show!</p>');
		  
		  echo '<table class="table table-striped table-bordered"><thead><tr>';
		  echo '<th>#</th> <th>IMGS</th> <th>Title</th> <th>Short Description</th> <th>Description</th> <th>Category</th> <th>SKU</th> <th>Currency</th> <th>Supplier Price</th> <th>Price</th> <th>Quantity</th> <th>Meta Title</th> <th>Meta Description</th> <th>Meta Keywords</th> <th>Status</th> <th>Added on</th> <th></th>';
		  echo '</tr></thead><tbody>';
		  
		  while ($row = mysqli_fetch_array($result)){
			  echo '<tr><td>'.$row['id'].' <td><button class="btn btn-sm btn-link" title="view IMGS" onclick="window.open(\'?act=imgs&id='.$row['id'].'\', \'winimgs\', \'width=700, height=500\');">'.$row['total_imgs'].' imgs</button> <td>'.$row['title'].'</td> <td><abbr title="'.$row['short_description'].'">'.substr($row['short_description'],0,20).'</abbr></td>  <td><abbr title="'.$row['description'].'">'.substr($row['description'],0,30).'</abbr></td> <td>'.$row['category'].'</td> <td>'.$row['sku'].'</td> <td>'.$row['currency'].'</td> <td>'.$row['currency'].' '.$row['price_supplier'].'</td> <td>'.$row['currency'].' '.$row['price'].'</td> <td>'.$row['stock_quantity'].'</td> <td><abbr title="'.$row['meta_title'].'">'.substr($row['meta_title'],0,15).'</abbr></td> <td><abbr title="'.$row['meta_description'].'">'.substr($row['meta_description'],0,15).'</abbr></td> <td><abbr title="'.$row['meta_keywords'].'">'.substr($row['meta_keywords'],0,15).'</abbr></td> <td>'.$row['status'].'</td> <td>'.dnt_format($row['created_at']).'</td> <td align="right"> <a href="?act=edit&id='.$row['id'].'">Edit</a> | <a style="color:red;" href="?act=delete&id='.$row['id'].'" onclick="return confirm(\'Are you sure?\');">Delete</a></td></tr>';
		  }
		  
		  echo '</tbody></table>';
	  
  }


?>

</body>
</html>