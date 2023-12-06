<?php
/** @var string $contentHTML */
/** @var \App\Core\LinkGenerator $link */
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
                    <p>0 items in cart</p>
                    <button class="view-cart">view cart</button>
                    <button class="shop-more">shop more</button>
                </div>
            </div>
        </div>

        <div class="main-content">
            <?= $contentHTML ?>
        </div>
    </div>

    <nav class="nav-links" id="menu">
        <ul>
            <li><a href="<?= $link->url('home.index') ?>">Home</a></li>
            <li><a href="">Shop</a></li>
            <li><a href="<?= $link->url('review.index') ?>">Feedback</a></li>
            <li><a href="">Shipping</a></li>
            <li><a href="">Sizing</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Legacy</a></li>
        </ul>
    </nav>
    <button class="menu-btn">MENU</button>

    <footer>
        <div class="nickname-1">Kooky</div>
        <div class="nickname-2">Masta</div>
    </footer>

    <script>
        const menuButton = document.querySelector(".menu-btn");
        const navBar = document.querySelector(".nav-links");
        const body = document.body;

        menuButton.addEventListener('click', () => {
            navBar.classList.toggle("mobile-menu");
            body.classList.toggle("no-scroll");
        });

        window.addEventListener("scroll", function() {
            navBar.style.paddingTop = 200 + window.scrollY + "px";
        });
    </script>

</body>
</html>
