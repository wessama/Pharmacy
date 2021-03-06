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
        <?php foreach ($data[1] as $indexInfo){ ?>
          <tr>
            <?php foreach($indexInfo as $singleInfo){ ?>
              <td><?php echo $singleInfo;  ?></td>
            <?php }?>
            <td>
              <select class="custom-select" onchange="adjustRole(this.value, '<?php echo $indexInfo['id'] ?>')">
                <option selected>Select user role</option>
                <?php foreach($data[2] as $role){ ?>
                  <option value="<?php echo $role['id']; ?>"><?php echo $role['displayName'];  ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>

<?php
include('resources/views/layouts/layout-end.php');
?>