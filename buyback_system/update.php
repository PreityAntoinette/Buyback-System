<?php
include 'db.php';

if(isset($_POST['model'], $_POST['storage'], $_POST['condition'], $_POST['price'])){
    $model = $_POST['model'];
    $storage = $_POST['storage'];
    $condition = $_POST['condition'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("UPDATE mobile_iphone SET price=? WHERE model=? AND storage=? AND `condition`=?");
    $stmt->bind_param("dsss", $price, $model, $storage, $condition);
    $stmt->execute();
}

header("Location: admin.php");
exit;
?>