<?php
$layout = 'auth';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/sign-in.css">

<div class="container">
    <h1>Sign in</h1>
    <div class="message">
        <?= @$data['message'] ?>
    </div>
    <form class="form-signin" method="post" action="<?= $link->url("auth.login") ?>">
        <div class="form-label">
            <input name="login" type="text" id="login" class="form-control" placeholder="Username" required autofocus>
        </div>

        <div class="form-label">
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="btn-submit">
            <button class="btn button-54" type="submit" name="submit">Login</button>
        </div>
    </form>
</div>