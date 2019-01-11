<?php

include('resources/views/layouts/layout.php');

?>

<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['home'] ?>" class="btn btn-outline-info btn-sm pull-right">Continue
                shopping</a>
            <div class="clearfix"></div>
        </div>

        <div class="card-body">
            <!-- PRODUCT -->
            <?php foreach($data as $product){ ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                        <img class="img-responsive" src="<?php echo $product['product_image'] ?>" alt="prewiew" width="120" height="80">
                    </div>
                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                        <h4 class="product-name"><strong>
                                <?php echo $product['product_name'] ?></strong></h4>
                        <h4>
                            <small><?php echo $product['Product_description'] ?></small>
                        </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                            <h6><strong id="orderPrice"><?php echo $product['orderPrice'] ?><span class="text-muted">x</span></strong></h6>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="quantity" style="text-align:center;">
                                <input type="number" step="1" max="99" min="1" 
                                value="<?php echo $product['quantity'] ?>" title="Qty" class="qty" size="4"
                                    style="text-align:center;" name="ChoosenQuantity" >
                            </div>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <button type="button" class="btn btn-outline-danger btn-xs" style="padding-right:30px;">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
            <?php } ?>
            <!-- END PRODUCT -->



            <div class="pull-right">
            <form action="<?php echo  $_SERVER['REQUEST_URI']?>" method="POST">
                <input type="hidden" name="quantity"   value="<?php echo $product['quantity'] ?>">
                <input type="hidden" name="Productprice"      value="<?php echo $product['price'] ?>">
                <input type="hidden" name="orderPrice" value="<?php echo $product['orderPrice'] ?>">
                <input type="hidden" name="orderTotalPrice" value="<?php echo $product['orderTotalPrice'] ?>">
                <a href="#" onclick="this.parentNode.submit()" class="btn btn-outline-secondary pull-right" name="UpdateButton">
                Update shopping cart</a>
            </form>
                
            </div>
        </div>
        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="cupone code">
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-default" value="Use cupone">
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
                <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['checkout'] ?>" class="btn btn-success pull-right">Checkout</a>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b>50.00€</b>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include('resources/views/layouts/layout-end.php');

?>