<?php require_once __DIR__.'/../includes/header.php'; ?>
<div class="container-sm text-center">
  <h2>Admin Page</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category ID</th>
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product) { ?>
        <tr>
          <td><?php echo $product->PRODUCT_ID; ?></td>
          <td><?php echo $product->PRODUCT_NAME; ?></td>
          <td><?php echo $product->DESCRIPTION; ?></td>
          <td><?php echo $product->PRICE; ?></td>
          <td><?php echo $product->CATEGORY_ID; ?></td>
          <td>
            <?php if ($product->IMAGE_ID) { ?>
              <img src="<?php echo base_url('image/display/' . $product->IMAGE_ID); ?>" alt="<?php echo $product->PRODUCT_NAME; ?>" height="50" width="50">
            <?php } ?>
          </td>
          <td>
            <a href="<?php echo base_url('admin/edit_product/' . $product->PRODUCT_ID); ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="<?php echo base_url('admin/delete_product/' . $product->PRODUCT_ID); ?>" class="btn btn-sm btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="<?php echo base_url('admin/create_product'); ?>" class="btn btn-primary">Create Product</a>
</div>
<?php require_once __DIR__.'/../includes/footer.php'; ?>
