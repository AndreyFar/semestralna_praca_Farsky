<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/styleForm.css">
<link rel="stylesheet" href="public/css/contact.css">

<?php if ($data['message'] != "") : ?>
    <div class="message"><?= $data['message'] ?></div>
<?php endif; ?>
<h1>Contact</h1>
<form method="post" action="<?= $link->url('home.contact') ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= @$data['review']?->getId() ?>">

    <div class="field">
        <label class="field_label" for="email">Email *</label>
        <input class="field_input" type="email" id="email" name="email" spellcheck="false" autocapitalize="off" value=""
               required>
    </div>

    <div class="field">
        <label class="field_label" for="number">Phone number</label>
        <input type="tel" id="number" class="field_input" autocomplete="tel" name="number" pattern="[0-9\-]*" value="">
    </div>

    <div class="field">
        <label class="field_label" for="message">Message</label>
        <textarea rows="5" id="message" class="text-area field_input" name="message" required></textarea>
    </div>

    <button type="submit" class="btn-submit" name="submit">Send message</button>
</form>


