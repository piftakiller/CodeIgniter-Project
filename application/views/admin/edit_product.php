<?php require_once __DIR__.'/../includes/header.php'; ?>
<form method="POST" action="<?php echo base_url('admin/edit_product/' . $product->PRODUCT_ID); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product->PRODUCT_NAME; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"><?php echo $product->DESCRIPTION; ?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="<?php echo $product->PRICE; ?>">
    </div>
    <div class="form-group">
    <label for="category">Category:</label>
        <select name="category_id" id="category">
         <?php foreach ($categories as $category) : ?>
        <option value="<?php echo $category['CATEGORY_NAME']; ?>"<?php if ($product->CATEGORY_ID == $category['CATEGORY_ID']) echo ' selected'; ?>><?php echo $category['CATEGORY_NAME']; ?></option>
         <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?php require_once __DIR__.'/../includes/footer.php'; ?>