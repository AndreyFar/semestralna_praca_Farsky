<?php
/** @var string $contentHTML */
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<link rel="stylesheet" href="public/css/styleForm.css">

<form method="post" action="<?= $link->url('product.save') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['review']?->getId() ?>">

    <div class="field">
        <label class="field_label" for="title">Title</label>
        <input class="field_input" type="text" id="title" name="title" value="" required>
    </div>

    <div class="category">
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
        <input class="field_input" type="text" id="description" name="description" value="" required>
    </div>

    <div class="field">
        <label class="field_label" for="price">Price</label>
        <input class="field_input" type="number" id="price" name="price" min="0" step="1" required>
    </div>

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source 1</label>
        <input class="field_input" type="text" id="picture1" name="picture1" value="" required>
    </div>

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source 2</label>
        <input class="field_input" type="text" id="picture2" name="picture2" value="" required>
    </div>

    <div class="field">
        <label class="field_label" for="picture" class="form-label">Picture source 3</label>
        <input class="field_input" type="text" id="picture3" name="picture3" value="" required>
    </div>

    <button type="submit" class="btn-submit">Submit</button>
</form>