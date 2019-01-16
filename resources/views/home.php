<?php

include('resources/views/layouts/layout.php');

?>

<div class="card-columns" style="margin: 35px;" >
    <?php foreach($data['categories'] as $category){ ?>
        <div class="card" style="border-color: #92a8d1;border-width: initial;">
            <img class="card-img-top" src="<?php echo $category['image'] ?>" alt="<?php echo $category['category'] ?>">
            <div class="card-body">
                <h5 class="card-title"style="color:blue">
                    <!-- putting the link -->
                    <a href="<?php echo $GLOBALS['ASSET'].$GLOBALS['product']?>?category=<?php echo $category['id'] ?>"> 
                            <?php echo $category['category'] /* setting category name */ ?>                      
                    </a>
                </h5>
            </div>
        </div>
    <?php } ?>
</div>



<?php

include('resources/views/layouts/layout-end.php');

?>