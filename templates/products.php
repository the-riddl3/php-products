<?php
/* @var $products array */
$title = 'products';
?>

<div class="d-flex flex-wrap flex-col">
    <?php foreach($products as $product): ?>
        <div class="card m-2" style="width: 18rem;">
            <div class="card-body">
                <input type="checkbox" class="delete-checkbox" value="<?= $product->sku ?>"/>
                <h5 class="card-title"><?= $product->sku ?></h5>
                <p class="card-text">
                    <h6><?= $product->name ?></h6>
                    <h6><b><?= $product->price ?><span class="text-success">$</span></b></h6>

                <?php foreach($product->meta as $key => $value): ?>
                    <h6><?= $key ?>: <?= $value ?></h6>
                <?php endforeach; ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>