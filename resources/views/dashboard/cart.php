<?php
include('resources/views/layouts/layout.php');
?>

<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shopping cart
            <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['home'] ?>" class="btn btn-outline-info btn-sm pull-right">Continue
                shopping</a>
            <div class="clearfix"></div>
        </div>

        <div class="card-body">
            <!-- PRODUCT -->
            <?php
			if(!isset($_SESSION['cart_empty_alert'])){
				
			foreach($data['cartProducts'] as $dataItem){
				
				foreach($dataItem as $product){ ?>

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
                            <h6><strong id="orderPrice"><?php echo '$'.$product['price']; ?></strong></h6>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right" style="padding-right: 40px;">
                            <form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['removeFromCart']; ?>" method="POST">
                            <input name="cartItem" type="hidden" value="<?php echo $product['id']; ?>" /> 
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            <?php }
				}
			}?>
            <!-- END PRODUCT -->
        </div>
        <div class="card-footer">
            <div class="pull-right" style="margin: 10px">
                <?php if(isset($data['total'])){ ?>
                <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['Billing'] ?>" class="btn btn-success pull-right">Checkout</a>
                <?php } ?>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b><?php isset($data['total']) ? print('$'.$data['total']) : print('Cart is empty'); ?></b>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('resources/views/layouts/layout-end.php');
?>