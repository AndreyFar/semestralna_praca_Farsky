<?php
/** @var string $contentHTML */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KookyMasta</title>

    <link rel="apple-touch-icon" sizes="180x180" href="public/images/unnamed.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/images/unnamed.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/unnamed.png">

    <link rel="stylesheet" href="public/css/styleShop.css">
</head>
<body>

    <div class="container">
        <div class="cart-bar">
            <div class="cart-box">
                <a href="<?= $link->url('home.index') ?>" class="banner"></a>
                <div class="cart">
                    <h3>CART</h3>
                    <p>view the items</p>
                    <div class="btns">
                        <a href="<?= $link->url('item.index') ?>" class="view-cart">view cart</a>
                        <a href="<?= $link->url('product.index') ?>" class="shop-more">shop more</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <?= $contentHTML ?>
        </div>

        <div class="cart-bar">
            <div class="customer">
                <p class="log">Logged in as</p>
                <?php if ($auth->isLogged()) : ?>
                    <h5><strong><?= $auth->getLoggedUserName() ?></strong></h5>
                <?php else : ?>
                    <h5><strong>guest</strong></h5>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <nav class="nav-links" id="menu">
        <ul>
            <li><a href="<?= $link->url('home.index') ?>">Home</a></li>
            <li><a href="<?= $link->url('product.index') ?>">Shop</a></li>
            <li><a href="<?= $link->url('review.index') ?>">Feedback</a></li>
            <li><a href="<?= $link->url('home.ship') ?>">Shipping</a></li>
            <li><a href="<?= $link->url('home.size') ?>">Sizing</a></li>
            <?php if ($auth->isLogged() && $auth->isLoggedUserAdmin()) : ?>
                <li><a href="<?= $link->url('message.index') ?>">Messages</a></li>
            <?php else : ?>
                <li><a href="<?= $link->url('home.contact') ?>">Contact</a></li>
            <?php endif; ?>
            <li><a href="<?= $link->url('home.legacy') ?>">Faq</a></li>
        </ul>
    </nav>
    <button class="menu-btn">MENU</button>

    <footer>
        <div class="nickname-1">Kooky</div>
        <div class="nickname-2">Masta</div>
    </footer>

    <script src="public/js/script-open-menu.js"></script>

</body>
</html>
