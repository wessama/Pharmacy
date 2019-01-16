<?php
include('resources/views/layouts/layout.php');
?>
<div class="card">
  <div class="card-body">
    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <?php for ($i=0; $i <count($data[0]) ; $i++) { ?>
            <th class="th-sm"><?php echo $data[0][$i]; ?></th>
          <?php }?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data[1] as $indexInfo) {?>
          <tr>
            <?php foreach($indexInfo as $singleInfo){ ?>
              <td><?php echo $singleInfo;  ?></td>
            <?php }?>
            <?php if (in_array("can_view_inventory", $_SESSION['permissions'])) {?>
              <td> 
                <form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['inventoryRequest']?>" method="post">
                  <input type="hidden" name="product_id" value="<?php echo $indexInfo['id'] ?>">
                  <button type="submit">Request</button> 
                </form>
              </td>
            <?php } ?>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>

<?php
include('resources/views/layouts/layout-end.php');
?>