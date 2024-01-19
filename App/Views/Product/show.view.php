<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/product.css">

<div class="container">
    <div class="block-images">
        <img src="public/images/vesta_main.jpg" class="show-image">
        <div class="other-images">
            <img src="public/images/vesta_second.jpg">
            <img src="public/images/vesta_third.jpg">
        </div>
    </div>
    <div class="block-info">
        <div class="title">NORTH FACE VEST</div>
        <div class="price">189€</div>
        <div class="info">Tax included. Shipping calculated at checkout.</div>
        <h4>Size</h4>
        <div class="size">
            <select name="size">
                <option value="small">small</option>
                <option value="medium">medium</option>
                <option value="large">large</option>
                <option value="xlarge">xlarge</option>
            </select>
        </div>
        <button type="submit" class="btn-add-to-cart">ADD TO CART</button>
        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Accusantium ad animi beatae consectetur deseruntvitae.</div>
    </div>
</div>
