function changeMainImage(clickedImage, newSrc) {
    console.log('Clicked Image:', clickedImage);
    console.log('New Source:', newSrc);
    // Odstrániť .active triedu od všetkých malých obrázkov
    var smallImages = document.querySelectorAll('.other-images img');
    smallImages.forEach(function(image) {
        image.classList.remove('active');
    });

    // Pridať .active triedu k aktuálnemu malému obrázku
    clickedImage.classList.add('active');

    // Zmeniť src veľkého obrázka na vybraný obrazok
    document.getElementById('mainImage').src = newSrc;
}