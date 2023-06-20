<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php require_once __DIR__.'./includes/header.php'; ?>

<div class="container text-center">
    <h2>Shopping <small class="text-body-secondary">With faded secondary text</small></h2>  
    <h4>Check out our latest products:</h4>
     <div class="row">
        <?php foreach ($products as $product) { ?>
            <div class='col'>
                <div class="card" style="width: 18rem;">
                    <img src="./image.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product->PRODUCT_NAME;?></h5>
                        <p class="card-text"><?php echo $product->DESCRIPTION;?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php } ?>           
    </div>
</div>
<?php require_once __DIR__.'./includes/footer.php'; ?>
