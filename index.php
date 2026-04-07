<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Device Buyback Evaluation</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/selection_bar.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/usbs.png" alt="USBS Logo">
        </div>
        <ul class="nav-links">
                <li><a href="https://usbs-uae.com/" target="_blank">USBS Website</a></li>
        </ul>
    </nav>

<div class="main-container">

    <div class="header">
        <!-- Selected items (breadcrumb style) --> 
        <h1>Start your Evaluation</h1>
        <h3>Get an instant quote for your device</h3>
    </div>

     <div id="selection-bar" class="selection-bar"></div>

    <!-- Device selection (new) -->
    <div id="device-section">   
        <h1>Select Device</h1>
        <!-- JS will dynamically add buttons for Mobile, Laptop, Tablet, Smart Watch -->
    </div>

    <!-- Brand selection (only for Mobile) -->
    <div id="brand-section" style="display:none;">
        <h1>Select Brand</h1>
        <div id="brands"></div>
    </div>

    <!-- Model selection -->
    <div id="models" style="display:none;">
        <h2>Select Model</h2>
        <div id="model-buttons" style="color:white;"></div>
    </div>

    <!-- Storage selection -->
    <div id="storages" style="display:none;">
        <h2>Select Storage</h2>
        <div id="storage-buttons"></div>
    </div>

    <!-- Conditions with prices -->
    <div id="conditions" style="display:none;">
        <h2>Buyback Prices</h2>
        <div id="condition-list"></div>
    </div>

</div>

<script src="js/script.js?v=1.0"></script>
<script src="js/selection_bar.js?v=1.0"></script>
</body>
</html>