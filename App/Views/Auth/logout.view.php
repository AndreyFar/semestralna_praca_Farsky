<?php
$layout = 'auth';
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/after-logout.css">

<div class="container">
    Odhlásili ste sa.
    <br>
    Znovu <a href="<?= \App\Config\Configuration::LOGIN_URL ?>">prihlásiť</a>
    alebo vrátiť sa <a href="<?= $link->url("home.index") ?>">späť</a> na hlavnú stránku?
</div>