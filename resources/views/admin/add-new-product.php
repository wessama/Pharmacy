<?php
include('resources/views/layouts/layout.php');
?>
<div class="container">
	<form method="post" action="<?php echo $GLOBALS['ASSET'].$GLOBALS['submitProduct']?>">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputName">Product name</label>
				<input type="text" class="form-control" name="product_name" placeholder="Product name">
			</div>
			<div class="form-group col-md-6">
				<label for="inputDescription">Product description</label>
				<input type="text" class="form-control" name="Product_description" placeholder="Description">
			</div>
		</div>
		<div class="form-group">
			<label for="inputQuantity">Product quantity</label>
			<input type="text" class="form-control" name="quantity" placeholder="Quantity">
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="inputCategory">Product category</label>
				<select class="form-control" name="category_id">
					<option selected>Choose...</option>
					<?php foreach($data as $category){ ?>
						<option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group col-md-2">
				<label for="inputPrice">Product price</label>
				<input type="text" name="price" class="form-control" placeholder="Price">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Add</button>
	</form>
</div>
<?php
include('resources/views/layouts/layout-end.php');
?>