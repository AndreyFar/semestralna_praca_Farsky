<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/style-cart.css">

<h1>Cart</h1>
<div class="pom">ITEMS:</div>
<div class="container-items">
    <?php if ($data['message'] != "") : ?>
        <div class="message"><?= $data['message'] ?></div>
    <?php endif; ?>
    <div class="items">
        <ul>
            <?php foreach($data['items'] as $item) :?>
                <li class="item">
                    <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $item->getPicture() ?>" alt="#">
                    <div class="item-info">
                        <div class="title"><?= $item->getTitle() ?></div>
                    </div>
                    <div class="count">
                        <button class="minus">-</button>
                        <div class="count"><?= $item->getCount() ?></div>
                        <button class="plus">+</button>
                    </div>
                    <div class="price"><?= $item->getPrice() ?>€</div>
                    <a href="<?= $link->url('item.delete', ['id'=>$item->getId()])?>" class="btn-delete">X</a>
                </li>
            <?php endforeach?>
        </ul>
    </div>
</div>
<div class="checkout">
    <div>Total price:</div>
    <div class="total-price">
        <div class="orange">0</div>
        <div>€</div>
    </div>
</div>