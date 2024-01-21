<?php
$layout = 'auth';
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/after-logout.css">

<div class="container">
    You have signed out.
    <br>
    <a href="<?= \App\Config\Configuration::LOGIN_URL ?>">Log in</a> again
    or go <a href="<?= $link->url("home.index") ?>">back</a> to the main page?
</div>