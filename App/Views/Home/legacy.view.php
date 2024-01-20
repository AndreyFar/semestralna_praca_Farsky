<?php
$layout = 'shop';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>

<link rel="stylesheet" href="public/css/style-faq.css">

<div class="faq-container">
    <h1>FAQ</h1>
    <h5>( FREQUENTLY ASKED QUESTIONS )</h5>
    <div class="faq-item" onclick="toggleAnswer('q1', this)">
        <div class="question">RETURN POLICY</div>
        <div class="answer" id="q1">
            You have 30 days to carry out a return, provided that the item is eligible.
            <div>These are the steps you should follow:</div>
            <div>1. Enter your email address and the order number on the dedicated page.</div>
            <div>2. Select the product(s) you wish to return and select the reason for the return.</div>
            <div>3. Make sure to return the items in their original packaging and in their original condition.</div>
            <div>4. Affix the prepaid return label to the parcel.</div>
            <div>5. Take the parcel to a DHL drop-off location or visit DHL's website to schedule a parcel collection.</div>
            Returns must be shipped from the same country to which they were delivered.
        </div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q2', this)">
        <div class="question">REFUND</div>
        <div class="answer" id="q2">
            For security reasons, your refund may only be credited to the same credit card used to place the order.
            We make every effort to process return credits as quickly as possible.
        </div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q3', this)">
        <div class="question">ORDER SHIPPING</div>
        <div class="answer" id="q3">
            Once your package has shipped, you will receive an email with a tracking number.
            For security reasons, an adult signature is required for all deliveries
        </div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q4', this)">
        <div class="question">PRODUCT CARE</div>
        <div class="answer" id="q4">
            All of Balenciaga leather products have unique qualities.
            A special treatment has been developed to maintain the soft hand of the leather, giving it a distinctive vintage appearance.
        </div>
    </div>

    <div class="faq-item" onclick="toggleAnswer('q5', this)">
        <div class="question">CANCELLING AN ORDER</div>
        <div class="answer" id="q5">
            Once an order has been confirmed, it is processed automatically, which means it cannot be cancelled.
            If you are a registered customer, you can cancel any order within 30 minutes of placing it.
        </div>
    </div>

</div>

<script src="public/js/script-show-answear.js"></script>