<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="<?php echo $auth->isLogged() ? 'welcome' : 'login'; ?>">
    <?php if ($auth->isLogged()) : ?>
        Welcome, <?= $auth->getLoggedUserName() ?>
        <br>
        <a href="<?= $link->url('auth.logout')?>" class="button-54">Log out</a>
    <?php else : ?>
        <a href="<?= $link->url('auth.login') ?>" class="button-54">Login</a>
        <a href="<?= $link->url('auth.register') ?>" class="button-54">Sign in</a>
    <?php endif; ?>
</div>
<div class="title">
    <div class="title-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="1441" height="240" viewBox="0 0 1441 240">
            <text id="KOOKYMASTA_back" data-name="KOOKYMASTA®" transform="translate(0 191)" fill="#f0ae67" font-size="177" font-family="NachlieliCLM-BoldOblique, Nachlieli CLM BoldOblique" font-weight="700" font-style="oblique" letter-spacing="0.04em" opacity="0.27"><tspan x="0" y="0">KOOKY</tspan><tspan y="0" fill="#fff">MASTA</tspan><tspan y="0" fill="#fff" font-family="SegoeUI-SemiboldItalic, Segoe UI" font-weight="600" font-style="italic">®</tspan></text>
        </svg>
    </div>
    <div class="title-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="1441" height="240" viewBox="0 0 1441 240">
            <text id="KOOKYMASTA_front" data-name="KOOKYMASTA®" transform="translate(0 191)" fill="#f0ae67" font-size="177" font-family="NachlieliCLM-BoldOblique, Nachlieli CLM BoldOblique" font-weight="700" font-style="oblique" letter-spacing="0.04em" opacity="0.7"><tspan x="0" y="0">KOOKY</tspan><tspan y="0" fill="#fff">MASTA</tspan><tspan y="0" fill="#fff" font-family="SegoeUI-SemiboldItalic, Segoe UI" font-weight="600" font-style="italic">®</tspan></text>
        </svg>
    </div>
</div>
