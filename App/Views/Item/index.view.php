<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/style-cart.css">

<h1>KOSIK</h1>
<p><?= $data['id']?></p>
<p><?= $data['name']?></p>
<p><?= $data['items']?></p>