<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/messages.css">

<div class="container-messages">
    <div class="top-container">
        <h1>Messages</h1>
    </div>
    <div class="messages">
        <ul>
            <?php foreach($data['messages'] as $message) :?>
                <li class="message">
                    <div class="message-info">
                        <div class="author info">
                            <h5 class="color">User:</h5>
                            <p><?=$message->getAuthor() ?></p>
                        </div>
                        <div class="email info">
                            <h5 class="color">Email:</h5>
                            <p><?=$message->getEmail() ?></p>
                        </div>
                        <div class="phone info">
                            <h5 class="color">Phone number:</h5>
                            <p><?=$message->getPhoneNumber() ?></p>
                        </div>
                        <div class="text info">
                            <h5 class="color">Message:</h5>
                            <p><?=$message->getMessage() ?></p>
                        </div>
                        <div class="date info">
                            <h5 class="color">Date:</h5>
                            <p><?=$message->getSentAt() ?></p>
                        </div>
                    </div>
                </li>
            <?php endforeach?>
        </ul>
    </div>
</div>