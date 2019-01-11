<?php

include('resources/views/layouts/layout.php');

?>

<div class="card-columns" style="margin: 35px;" >

    <?php foreach($data as $product){ ?>
        <div class="card" style="border-color: #92a8d1;border-width: initial;">
            <img class="card-img-top" src="<?php echo $product['product_image'] ?>" alt="<?php echo $product['product_name'] ?>">
            <div class="card-body" >
                <h5 class="card-title"style="color:blue"><?php echo $product['product_name'] ?></h5>
            </div>
            <form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['addProduct']?>" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                <button type="submit" class="btn-primary">Add to cart</button>
            </form>
        </div>
    <?php } ?>
</div>

<?php

include('resources/views/layouts/layout-end.php');

?>