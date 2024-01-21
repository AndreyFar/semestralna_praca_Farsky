<?php
/** @var string $contentHTML */
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/styleForm.css">

<form method="post" action="<?= $link->url('product.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['product']?->getId() ?>">

    <div class="field">
        <label class="field_label" for="title">Title</label>
        <input class="field_input" type="text" id="title" name="title" value="<?= @$data['product']?->getTitle() ?>" required>
    </div>

    <div class="category">
        <?php if (@$data['product']?->getCategory() != ""): ?>
            <div>Original select: <?= @$data['product']?->getCategory() ?></div>
        <?php endif; ?>
        <select name="category" required>
            <option value="">Select category</option>
            <option value="tops">Tops</option>
            <option value="pants">Pants</option>
            <option value="jackets">Jackets</option>
            <option value="sneakers">Sneakers</option>
            <option value="accessories">Accessories</option>
        </select>
    </div>

    <div class="field">
        <label class="field_label" for="description">Description</label>
        <input class="field_input" type="text" id="description" name="description" value="<?= @$data['product']?->getDescription() ?>" required>
    </div>

    <div class="field">
        <label class="field_label" for="price">Price</label>
        <input class="field_input" type="number" id="price" name="price" min="0" step="1" value="<?= @$data['product']?->getPrice() ?>" required>
    </div>

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source 1</label>
        <?php if (@$data['product']?->getPicture1() != ""): ?>
            <div>Original source: <?= substr($data['product']->getPicture1(), strpos($data['product']->getPicture1(), '-') + 1)  ?></div>
        <?php endif; ?>
        <input type="file" id="picture1" name="picture1" required>
    </div>

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source 2</label>
        <?php if (@$data['product']?->getPicture2() != ""): ?>
            <div>Original source: <?= substr($data['product']->getPicture2(), strpos($data['product']->getPicture2(), '-') + 1)  ?></div>
        <?php endif; ?>
        <input type="file" id="picture2" name="picture2" required>
    </div>

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source 3</label>
        <?php if (@$data['product']?->getPicture3() != ""): ?>
            <div>Original source: <?= substr($data['product']->getPicture3(), strpos($data['product']->getPicture3(), '-') + 1)  ?></div>
        <?php endif; ?>
        <input type="file" id="picture3" name="picture3" required>
    </div>

    <button type="submit" class="btn-submit">Submit</button>
</form>