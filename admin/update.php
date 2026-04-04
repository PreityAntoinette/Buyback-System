<?php
include '../db.php';

if(isset($_POST['model'], $_POST['storage'], $_POST['prices'])){

    $model = $_POST['model'];
    $storage = $_POST['storage'];
    $prices = $_POST['prices']; // array: [condition => price]

    foreach ($prices as $condition => $price) {
        $stmt = $conn->prepare("UPDATE mobile_iphone SET price=? WHERE model=? AND storage=? AND `condition`=?");
        $stmt->bind_param("dsss", $price, $model, $storage, $condition);
        $stmt->execute();
    }
}

header("Location: admin.php");
exit;
?>