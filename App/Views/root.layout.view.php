<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KookyMasta</title>

    <link rel="apple-touch-icon" sizes="180x180" href="public/images/unnamed.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/images/unnamed.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/unnamed.png">

    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?= $contentHTML ?>

<nav>
    <ul>
        <li><a href="<?= $link->url('home.index') ?>">Home</a></li>
        <li><a href="<?= $link->url('product.index') ?>">Shop</a></li>
        <li><a href="<?= $link->url('review.index') ?>">Feedback</a></li>
        <li><a href="<?= $link->url('home.ship') ?>">Shipping</a></li>
        <li><a href="">Sizing</a></li>
        <?php if ($auth->isLogged() && $auth->isLoggedUserAdmin()) : ?>
            <li><a href="<?= $link->url('message.index') ?>">Messages</a></li>
        <?php else : ?>
            <li><a href="<?= $link->url('home.contact') ?>">Contact</a></li>
        <?php endif; ?>
        <li><a href="">Legacy</a></li>
    </ul>
</nav>

<footer>
    <div class="nickname-1">Kooky</div>
    <div class="nickname-2">Masta</div>
</footer>

</body>
</html>
