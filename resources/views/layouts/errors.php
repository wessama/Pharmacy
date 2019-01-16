<?php

if(isset($_SESSION['incorrect_password'])){ ?>

<div class="alert alert-danger grow" role="alert">
  <strong>Oh snap!</strong> Incorrect password
</div>

<?php unset($_SESSION['incorrect_password']); }

if(isset($_SESSION['product_already_exists'])){ ?>

<div class="alert alert-info grow" role="alert">
  <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
</div>

<?php }
if(isset($_SESSION['cart_empty_alert'])){ ?>

<div class="alert alert-info grow" role="alert">
  <strong>Alf salama!</strong> The cart is empty
</div>

<?php }

if(isset($_SESSION['order_placed'])){ ?>

<div class="alert alert-success grow" role="alert">
  <strong>Success!</strong> Order has been successfully placed
</div>

<?php unset($_SESSION['order_placed']); } 

if(isset($_SESSION['product_successfully_addded'])){ ?>

<div class="alert alert-success grow" role="alert">
  <strong>Success!</strong> Product has been successfully added
</div>

<?php unset($_SESSION['product_successfully_addded']); } 

if(isset($_SESSION['cart_item_removed'])){ ?>

<div class="alert alert-info grow" role="alert">
  <strong>Alf salama!</strong> Product has been removed from your cart
</div>

<?php unset($_SESSION['cart_item_removed']); } 

if(isset($_SESSION['not_permitted'])){ ?>

<div class="alert alert-danger grow" role="alert">
  <strong>Warning!</strong> You are not allowed to access this page
</div>

<?php } 

if(isset($_SESSION['request_added'])){ ?> 

<div class="alert alert-success grow" role="alert">
  <strong>Success!</strong> Request successfully submitted
</div>


<?php unset($_SESSION['request_added']); }

if(isset($_SESSION['product_added_to_cart'])){ ?>

<div class="alert alert-success grow" role="alert">
  <strong>Success!</strong> Product successfully added to cart
</div>

<?php unset($_SESSION['product_added_to_cart']); } 

if(isset($_SESSION['user_already_exists'])){ ?>

<div class="alert alert-danger grow" role="alert">
  <strong>Registration failure!</strong> A user already exists with this e-mail address
</div>

<?php unset($_SESSION['user_already_exists']); }

if(isset($_SESSION['registration_successful'])){ ?>

<div class="alert alert-success grow" role="alert">
  <strong>Registration success!</strong> You can now log in
</div>

<?php unset($_SESSION['registration_successful']); } 

if(isset($_SESSION['empty_checkout_form'])){ ?>

<div class="alert alert-danger grow" role="alert">
  <strong>Unsuccessful checkout!</strong> Please fill all required fields before submitting
</div>

<?php unset($_SESSION['empty_checkout_form']); } ?>