<?php
include 'db.php';

$brand = $_POST['brand'];
$model = $_POST['model'];
$storages = $_POST['storage']; // array of storage
$prices_Flawless = $_POST['price_Flawless'];
$prices_Excellent = $_POST['price_Excellent'];
$prices_Good = $_POST['price_Good'];
$prices_As_New = $_POST['price_As_New'];

foreach($storages as $i => $storage){
    // As New
    $stmt = $conn->prepare("INSERT INTO mobile_iphone (brand, model, storage, `condition`, price) VALUES (?, ?, ?, 'As New', ?)");
    $stmt->bind_param("sssd", $brand, $model, $storage, $prices_As_New[$i]);
    $stmt->execute();

    // Flawless
    $stmt = $conn->prepare("INSERT INTO mobile_iphone (brand, model, storage, `condition`, price) VALUES (?, ?, ?, 'Flawless', ?)");
    $stmt->bind_param("sssd", $brand, $model, $storage, $prices_Flawless[$i]);
    $stmt->execute();

    // Excellent
    $stmt = $conn->prepare("INSERT INTO mobile_iphone (brand, model, storage, `condition`, price) VALUES (?, ?, ?, 'Excellent', ?)");
    $stmt->bind_param("sssd", $brand, $model, $storage, $prices_Excellent[$i]);
    $stmt->execute();

    // Good
    $stmt = $conn->prepare("INSERT INTO mobile_iphone (brand, model, storage, `condition`, price) VALUES (?, ?, ?, 'Good', ?)");
    $stmt->bind_param("sssd", $brand, $model, $storage, $prices_Good[$i]);
    $stmt->execute();
}

header("Location: admin.php");
exit;
?>