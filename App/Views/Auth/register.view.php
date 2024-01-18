<?php
$layout = 'auth';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/sign.css">
<link rel="stylesheet" href="public/css/sign-in.css">

<div class="container">
    <h1>Register</h1>
    <div class="message">
        <?= @$data['message'] ?>
    </div>
    <form class="form-signin" method="post" action="<?= $link->url("auth.register") ?>">
        <div class="form-label">
            <input name="login" type="text" id="login" class="form-control" placeholder="Username" required autofocus>
        </div>

        <div class="form-label">
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="form-label">
            <input name="confirm_password" type="password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
        </div>

        <div class="form-label">
            <input name="code" type="text" id="code" class="form-control" placeholder="Special code">
        </div>
        <div class="question">register as <strong>admin</strong>? type the special code..</div>

        <div class="btn-submit">
            <button class="btn button-54" type="submit" name="submit">Submit</button>
        </div>
    </form>
    <a href="<?= $link->url('home.index')?>" class="home">Back</a>
</div>