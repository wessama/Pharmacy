<?php
include('resources/views/layouts/layout.php');
?>

<title>profile</title>
<body style="background:none !important;">

  <div>
    <p> <span style="font-weight: bold;  display: inline;">Name : </span>  <?php echo $data[0]['name']; ?>  </p>
    <p> <span style="font-weight: bold;  display: inline;">Email : </span> <?php echo $data[0]['email']; ?>  </p>
    <p> <span style="font-weight: bold;  display: inline;">Gender :</span> <?php echo $data[0]['gender']; ?>  </p>
  </div>
  
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Order Number</th>
        <th class="th-sm">Produt Name</th>
        <th class="th-sm">Product Quantity</th>
        <th class="th-sm">Product Price</th>
        <th class="th-sm">Product Category </th>
        <th class="th-sm">Order Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data as $info){ ?>
        <tr>
          <td><?php echo $info["id"];  ?></td>
          <td><?php echo $info['product_name'];  ?></td>
          <td><?php echo $info['quantity'];  ?></td>
          <td><?php echo $info['price'];  ?></td>
          <td><?php echo $info['category'];  ?></td>
          <td><?php echo $info['created-at'];?></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
  

</body>
<!-- <?php var_dump($data)?> -->
<?php

include('resources/views/layouts/layout-end.php');

?>