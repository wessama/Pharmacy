<?php
include('resources/views/layouts/layout.php');
?>

<style>
body {
  font-family: Arial;
  font-size: 17px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

<div class="container">
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="../Pharmacy/billing/submit" method="POST">
          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>

              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" value="<?php echo $data['user_info'][0]['name']; ?>" placeholder="Firstname Lastname">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" value="<?php echo $data['user_info'][0]['email']; ?>" placeholder="email@example.com">
              <label for="adr"><i class="fa fa-address-card"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="15 Imam Aly St." required>
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="Cairo" required>

              <div class="row">
                <div class="col-50">
                  <label for="zip"><i class="fa fa-phone"></i> Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="13111" required>
                </div>
              </div>
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="Firstname Lastname" required>
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018" required>
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352" required>
                </div>
              </div>
              <label>Paypal Checkout</label>
              <div class="payment_reviewed">
                <div id="paypal-button-container"></div>
              </div>
            </div>
          </div>
          <input type="submit" value="Place order" class="btn">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo count($data['cartProducts']); ?></b></span></h4>
        <?php foreach($data['cartProducts'] as $product){ ?>
          <p><a href="#"><?php echo $product[0]['product_name']; ?></a><span class="price"><?php echo '$'.$product[0]['price']; ?></span></p>
        <?php } ?>
        <hr>
        <p>Total <span class="price" style="color:black"><b><?php echo '$'.$data['total']; ?></b></span></p>
      </div>
    </div>
  </div>
</div>


<script>
  paypal.Button.render({

            env: 'production', 


            client: {

              sandbox: 'AcrDLbd9HSDHWRUWum0kxiFwGO1C27C3aIvAM7uRCLQZan86T1Tstu6pFrDE9jw2cvLkJtb22QSvDfy8',
              production: 'AZ2LpVuXonlzkklJZio7MRMyCeiWyPpoaP6Ek1JTnNF03w6mJTWg63uVf8_tDoYOPVT3-1_rrN5hsO60'

            },

     
            commit: true,

            payment: function(data, actions) {
                return actions.payment.create({
                  payment: {
                    transactions: [
                    {
                      amount: { total: '<?php echo json_encode($data['total']); ?>', currency: 'USD' }
                    }
                    ]
                  }
                });
              },
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                  window.alert('Payment Complete!');
                });
              }

            }, '#paypal-button-container');

</script>
<?php
include('resources/views/layouts/layout-end.php');
?>