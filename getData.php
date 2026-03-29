<?php
include 'db.php';

$sql = "SELECT * FROM mobile_iphone ORDER BY model, FIELD(storage,'128GB','256GB','512GB')";
$result = $conn->query($sql);

$data = [];
while($row = $result->fetch_assoc()){
    $brand = $row['brand'];
    $model = $row['model'];
    $storage = $row['storage'];
    $condition = $row['condition'];
    $price = $row['price'];

    $data[$brand][$model][$storage][$condition] = $price;
}

echo json_encode($data);
?>