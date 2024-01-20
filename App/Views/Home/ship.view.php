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
        <h3 id="countryName"></h3>
        <map name="worldMapAreas">
            <!-- North America -->
            <area shape="rect" coords="15,50,90,100" alt="Canada" title="Canada">
            <area shape="rect" coords="70,50,160,100" alt="United States" title="United States">
            <area shape="rect" coords="90,90,100,160" alt="Mexico" title="Mexico">

            <!-- South America -->
            <area shape="rect" coords="100,150,180,230" alt="Brazil" title="Brazil">
            <area shape="rect" coords="150,180,260,270" alt="Argentina" title="Argentina">

            <!-- Europe -->
            <area shape="rect" coords="220,50,300,120" alt="Ireland" title="Ireland">
            <area shape="rect" coords="250,100,330,170" alt="United Kingdom" title="United Kingdom">
            <area shape="rect" coords="200,140,280,210" alt="Europe" title="Europe">

            <!-- Middle East -->
            <area shape="rect" coords="350,100,430,170" alt="Saudi Arabia" title="Saudi Arabia">
            <area shape="rect" coords="400,140,480,210" alt="Egypt" title="Egypt">

            <!-- Asia -->
            <area shape="rect" coords="350,30,430,100" alt="Russia (Moscow)" title="Russia (Moscow)">
            <area shape="rect" coords="440,90,520,160" alt="Thailand" title="Thailand">
            <area shape="rect" coords="470,140,550,210" alt="China" title="China">

            <!-- Oceania -->
            <area shape="rect" coords="470,230,550,300" alt="Australia" title="Australia">
            <area shape="rect" coords="500,270,580,340" alt="New Zealand" title="New Zealand">
        </map>
        <div class="map-dot" style="left: 40px; top: 85px;"></div> <!-- Canada -->
        <div class="map-dot" style="left: 115px; top: 70px;"></div> <!-- United States -->
        <div class="map-dot" style="left: 150px; top: 125px;"></div> <!-- Mexico -->
        <div class="map-dot" style="left: 135px; top: 190px;"></div> <!-- Brazil -->
        <div class="map-dot" style="left: 220px; top: 235px;"></div> <!-- Argentina -->
        <div class="map-dot" style="left: 260px; top: 85px;"></div> <!-- Ireland -->
        <div class="map-dot" style="left: 290px; top: 135px;"></div> <!-- United Kingdom -->
        <div class="map-dot" style="left: 240px; top: 180px;"></div> <!-- Europe -->
        <div class="map-dot" style="left: 400px; top: 135px;"></div> <!-- Saudi Arabia -->
        <div class="map-dot" style="left: 450px; top: 185px;"></div> <!-- Egypt -->
        <div class="map-dot" style="left: 400px; top: 65px;"></div> <!-- Russia (Moscow) -->
        <div class="map-dot" style="left: 510px; top: 120px;"></div> <!-- Thailand -->
        <div class="map-dot" style="left: 540px; top: 170px;"></div> <!-- China -->
        <div class="map-dot" style="left: 540px; top: 265px;"></div> <!-- Australia -->
        <div class="map-dot" style="left: 570px; top: 305px;"></div> <!-- New Zealand -->
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
            countryNameElement.textContent = '';
        });
    });
</script>