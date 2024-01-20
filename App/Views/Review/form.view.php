<?php
/** @var string $contentHTML */
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/styleForm.css">

<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="message">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<form method="post" action="<?= $link->url('review.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['review']?->getId() ?>">

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source</label>
        <?php if (@$data['review']?->getPicture() != ""): ?>
            <div>Pôvodný súbor: <?= substr($data['review']->getPicture(), strpos($data['review']->getPicture(), '-') + 1)  ?></div>
        <?php endif; ?>
        <input type="file" id="picture" name="picture">
    </div>

    <div class="field">
        <label class="field_label" for="comment">Comment</label>
        <textarea class="field_input" id="comment" name="comment" rows="3" maxlength="50" required><?= @$data['review']?->getComment() ?></textarea>
    </div>

    <label class="rating-label" for="">Rating</label>
    <div class="rating">
        <div class="dot">
            <input type="radio" id="star5" name="rating" value="5" required>
            <label for="star5">5 (top)</label>
        </div>

        <div class="dot">
            <input type="radio" id="star4" name="rating" value="4" required>
            <label for="star4">4</label>
        </div>

        <div class="dot">
            <input type="radio" id="star3" name="rating" value="3" required>
            <label for="star3">3</label>
        </div>

        <div class="dot">
            <input type="radio" id="star2" name="rating" value="2" required>
            <label for="star2">2</label>
        </div>

        <div class="dot">
            <input type="radio" id="star1" name="rating" value="1" required>
            <label for="star1">1</label>
        </div>
    </div>

    <button type="submit" class="btn-submit">Submit</button>
</form>