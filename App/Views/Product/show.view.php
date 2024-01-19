<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/product.css">

<div class="container">
    <div class="block-images">
        <img src="<?= @$data['product']->getPicture1()?>" class="show-image" id="mainImage">
        <div class="other-images">
            <img src="<?= @$data['product']->getPicture1()?>" class="active" onclick="changeMainImage(this, '<?= @$data['product']->getPicture1()?>')">
            <img src="<?= @$data['product']->getPicture2()?>" onclick="changeMainImage(this, '<?= @$data['product']->getPicture2()?>')">
            <img src="<?= @$data['product']->getPicture3()?>" onclick="changeMainImage(this, '<?= @$data['product']->getPicture3()?>')">
        </div>
    </div>
    <div class="block-info">
        <div class="title"><?= @$data['product']->getTitle()?></div>
        <div class="price"><?= @$data['product']->getPrice()?>€</div>
        <div class="info">Tax included. Shipping calculated at checkout.</div>
        <h4>Size</h4>
        <div class="size">
            <select name="size">
                <option value="small">small</option>
                <option value="medium">medium</option>
                <option value="large">large</option>
                <option value="xlarge">xlarge</option>
            </select>
        </div>
        <div class="btn-add-to-cart"><a href="<?= $link->url('item.index')?>">ADD TO CART</a></div>
        <div class="description"><?= @$data['product']->getDescription()?></div>
    </div>
</div>

<script src="public/js/script-set-image.js"></script>