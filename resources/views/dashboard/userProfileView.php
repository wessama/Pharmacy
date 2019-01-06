<?php
include('resources/views/layouts/layout.php');
?>

<title>profile</title>
<body style="background:none !important;">

  <div style="margin:10px;">
  <img src="<?php echo $data[0]['avatar'];?>" alt="userimg" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;" >
    <p style="display: inline-block;margin-right:10px;"> <span style="font-weight: bold;">Name : </span>  <?php echo $data[0]['name']; ?>  </p>
    <p style="display: inline-block;margin-right:10px;"> <span style="font-weight: bold;">Email : </span> <?php echo $data[0]['email']; ?>  </p>
    <p style="display: inline-block;margin-right:10px;"> <span style="font-weight: bold;">Gender :</span> <?php echo $data[0]['gender']; ?>  </p>
  </div>
  
</body>

<?php

include('resources/views/layouts/layout-end.php');

?>