<?php
/** @var string $contentHTML */
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/styleForm.css">

<form method="post" action="<?= $link->url('review.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['review']?->getId() ?>">

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source</label>
        <input class="field_input" type="text" id="picture" name="picture" value="<?= @$data['review']?->getPicture() ?>" required>
    </div>

    <div class="field">
        <label class="field_label" for="name">Name</label>
        <input class="field_input" type="text" id="name" name="name" value="<?= @$data['review']?->getUserName() ?>" required>
    </div>

    <div class="field">
        <label class="field_label" for="comment">Comment</label>
        <textarea class="field_input" id="comment" name="comment" rows="3" maxlength="50" required><?= @$data['review']?->getComment() ?></textarea>
    </div>

    <div class="field">
        <label class="field_label" for="rating">Rating</label>
        <input class="field_input" type="text" id="rating" name="rating" value="<?= @$data['review']?->getRating() ?>" required>
    </div>

    <button type="submit" class="btn-submit">Submit</button>
</form>