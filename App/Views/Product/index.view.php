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
        <a href="<?= $link->url('product.filter', ['category'=>'all'])?>">All</a>
        <a href="<?= $link->url('product.filter', ['category'=>'tops'])?>">Tops</a>
        <a href="<?= $link->url('product.filter', ['category'=>'pants'])?>">Pants</a>
        <a href="<?= $link->url('product.filter', ['category'=>'jackets'])?>">Jackets</a>
        <a href="<?= $link->url('product.filter', ['category'=>'sneakers'])?>">Sneakers</a>
        <a href="<?= $link->url('product.filter', ['category'=>'accessories'])?>">Accessories</a>
    </div>
    <?php if ($data['message'] != "") : ?>
        <div class="message"><?=$data['message']?></div>
    <?php endif; ?>
    <div class="products">
        <ul class="products-wraper">
            <?php foreach($data['products'] as $product) :?>
                <li class="product">
                    <a href="<?=$link->url('product.show')?>"><img src="<?=$product->getPicture1()?>"></a>
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
