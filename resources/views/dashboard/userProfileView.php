<?php
include('resources/views/layouts/layout.php');
?>

<title>profile</title>
<body style="background:none !important;">


  <p> <span style="font-weight: bold; ">Name : </span> <?php echo $data[0]['name']; ?>  </p>
  <p> <span style="font-weight: bold;">Email : </span> <?php echo $data[0]['email']; ?>  </p>
  <p> <span style="font-weight: bold;">Gender :</span> <?php echo $data[0]['gender']; ?>  </p>

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
      <tr>
        <td><?php echo $data[0]["id"];  ?></td>
        <td><?php echo $data[0]['product_name'];  ?></td>
        <td><?php echo $data[0]['quantity'];  ?></td>
        <td><?php echo $data[0]['price'];  ?></td>
        <td><?php echo $data[0]['category'];  ?></td>
        <td><?php echo $data[0]['created-at'];?></td>
      </tr>
    </tbody>
  </table>

</body>


<?php

include('resources/views/layouts/layout-end.php');

?>