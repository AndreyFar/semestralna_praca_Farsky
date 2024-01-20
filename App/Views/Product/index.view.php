<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/style-products.css">

<div class="container-products">
    <div class="top-container">
        <?php if ($auth->isLogged()&&$auth->isLoggedUserAdmin()) : ?>
            <a href="<?= $link->url('product.add') ?>" class="btn-add-product">add</a>
        <?php else : ?>
        <?php endif; ?>
    </div>
    <div class="filter">
        <a id="category-all">All</a>
        <a id="category-tops">Tops</a>
        <a id="category-pants">Pants</a>
        <a id="category-jackets">Jackets</a>
        <a id="category-sneakers">Sneakers</a>
        <a id="category-accessories">Accessories</a>
    </div>

    <div class="message" id="message"></div>

    <div class="products">
        <ul class="products-wraper" id="products-wraper">
            <?php foreach($data['products'] as $product) :?>
                <li class="product">
                    <a href="<?=$link->url('product.show', ['id'=>$product->getId()])?>"><img src="<?=$product->getPicture1()?>"></a>
                    <div class="product-info">
                        <div class="title"><?= $product->getTitle()?></div>
                        <div class="price"><?= $product->getPrice()?>€</div>
                    </div>
                    <?php if ($auth->isLogged()&&$auth->isLoggedUserAdmin()) : ?>
                        <div class="buttons">
                            <a href="<?= $link->url('product.delete', ['id'=>$product->getId()])?>" class="btn-delete"><strong>X</strong></a>
                        </div>
                    <?php else : ?>
                    <?php endif; ?>
                </li>
            <?php endforeach?>
        </ul>
    </div>
</div>

<script src="public/js/script-volanie.js"></script>