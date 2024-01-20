<?php
$layout = 'shop';
?>

<link rel="stylesheet" href="public/css/world-map.css">

<div class="map">
    <h1>Shipping</h1>
    <p>orange areas represent countries, where we can send our products</p>
    <div class="map-container">
        <img src="public/images/world.png" alt="World Map" id="worldMap" usemap="#worldMapAreas">
        <h5>(hover over the map)</h5>
        <h3 id="countryName">Názov krajiny</h3>
        <map name="worldMapAreas">
            <area shape="rect" coords="100,50,200,150" alt="Country 1" title="Country 1">
            <area shape="rect" coords="300,100,400,200" alt="Country 2" title="Country 2">
            <!-- Ďalšie mapové oblasti pre ďalšie krajiny -->
        </map>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Získať element h3, kde budeme meniť názov krajiny
        var countryNameElement = document.getElementById('countryName');

        // Získať všetky mapové oblasti
        var mapAreas = document.querySelectorAll('map[name="worldMapAreas"] area');

        // Priradiť udalosť najazdenia myšou na každú mapovú oblasť
        mapAreas.forEach(function(area) {
            area.addEventListener('mouseover', function() {
                // Zmeniť obsah elementu h3 na názov krajiny
                var countryName = this.getAttribute('title');
                countryNameElement.textContent = countryName;
            });
        });

        // Udalosť pre odstránenie názvu krajiny pri opustení mapovej oblasti
        document.getElementById('worldMap').addEventListener('mouseout', function() {
            countryNameElement.textContent = 'Názov krajiny';
        });
    });
</script>