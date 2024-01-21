document.addEventListener('DOMContentLoaded', function () {
    var priceElements = document.querySelectorAll('.price');
    var totalPriceElement = document.getElementById('totalPrice');

    var totalPrice = 0;

    if (priceElements.length > 0) {
        // Prejdite všetky prvky a pridajte ich ceny k celkovej cene
        priceElements.forEach(function (priceElement) {
            totalPrice += parseFloat(priceElement.textContent);
        });
    }
    totalPriceElement.textContent = totalPrice.toFixed(2);
});