<?php
include('resources/views/layouts/layout.php');
?>





  <p> <span style="font-weight: bold; ">Name : </span> <?php echo $data[0]['name']  ?>  </p>
  <p> <span style="font-weight: bold;">Email : </span> </p>
  <p> <span style="font-weight: bold;">Gender : </span> </p>

  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">Order Number
        </th>
      <th class="th-sm">Produt Name
        </th>
        <th class="th-sm">Product Quantity
        </th>
        <th class="th-sm">Product Price
        </th>
      <th class="th-sm">Product Category 
        </th>
        <th class="th-sm">Order Date
        </th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A</td>
        <td>x</td>
        <td>4</td>
        <td>61</td>
      <td>tablet</td>
        <td>2011/04/25</td>
        
      </tr>
      <tr>
        <td>B</td>
        <td>y</td>
        <td>2</td>
        <td>63</td>
      <td>tablet</td>
        <td>2011/07/25</td>
        
      </tr>
      <tr>
        <td>C</td>
        <td>z</td>
        <td>1</td>
        <td>66</td>
      <td>capsule</td>
        <td>2009/01/12</td>
        
      </tr>
      <tr>
        <td>D</td>
        <td>k</td>
        <td>2</td>
        <td>22</td>
      <td>tablet</td>
        <td>2012/03/29</td>
        
      </tr>
      

    </tbody>

  </table>




<?php

include('resources/views/layouts/layout-end.php');

?>