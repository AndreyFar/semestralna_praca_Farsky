function highlightSize() {
    var category = document.getElementById('categorySelect').value;
    var size = document.getElementById('sizeSelect').value;

    // Odstrániť .active triedu od všetkých veľkostí z kazdej kategorie v tabuľke
    var allSizesTshirt = document.querySelectorAll('.' + 'tshirt' + ' td');
    allSizesTshirt.forEach(function(sizeElement) {
        sizeElement.classList.remove('active');
    });

    var allSizesHoodies = document.querySelectorAll('.' + 'hoodies' + ' td');
    allSizesHoodies.forEach(function(sizeElement) {
        sizeElement.classList.remove('active');
    });

    var allSizesPants = document.querySelectorAll('.' + 'pants' + ' td');
    allSizesPants.forEach(function(sizeElement) {
        sizeElement.classList.remove('active');
    });

    var allSizes = document.querySelectorAll('.' + category + ' td');
    allSizesTshirt.forEach(function(sizeElement) {
        sizeElement.classList.remove('active');
    });

    // Pridať .active triedu k vybranej veľkosti
    var selectedSize = Array.from(allSizes).filter(function(sizeElement) {
        return containsText(sizeElement, size);
    })[0];

    if (selectedSize) {
        selectedSize.classList.add('active');
    }
}

// Funkcia, ktorá sa stará o textový výraz ":contains"
function containsText(element, text) {
    return element.innerText.toLowerCase().includes(text.toLowerCase());
}