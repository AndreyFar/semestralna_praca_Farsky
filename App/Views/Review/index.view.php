<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/styleBox.css">

<div class="container-reviews">
    <div class="top-container">
        <a href="<?= $link->url('review.add') ?>" class="btn-add-review">ADD new</a>
        <h1>Reviews</h1>
    </div>
    <div class="reviews">
        <ul>
            <?php foreach($data['reviews'] as $review) :?>
                <li class="review">
                    <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $review->getPicture() ?>" alt="#">
                    <div class="review-info">
                        <div class="author"><?= $review->getUserName() ?><img src="<?= $review->getImagePath() ?>"></div>
                        <div class="message"><?= $review->getComment() ?></div>
                        <div class="date"><?= $review->getCreatedAt() ?></div>
                    </div>
                    <?php if ($auth->isLogged()&&$review->getUserName()==$auth->getLoggedUserName() || $auth->isLogged()&&$auth->isLoggedUserAdmin()) : ?>
                        <div class="buttons">
                            <a href="<?= $link->url('review.edit', ['id'=>$review->getId()])?>" class="btn-edit">Edit</a>
                            <a href="<?= $link->url('review.delete', ['id'=>$review->getId()])?>" class="btn-delete">Delete</a>
                        </div>
                    <?php else : ?>
                    <?php endif; ?>
                </li>
            <?php endforeach?>
        </ul>
    </div>
</div>