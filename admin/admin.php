<?php
include '../db.php'; // your database connection

// Fetch all data pivoted by condition including Good and As New
$sql = "SELECT model, storage,
       MAX(CASE WHEN `condition`='As New' THEN price END) AS `As New`,
       MAX(CASE WHEN `condition`='Flawless' THEN price END) AS Flawless,
       MAX(CASE WHEN `condition`='Excellent' THEN price END) AS Excellent,
       MAX(CASE WHEN `condition`='Good' THEN price END) AS Good
FROM mobile_iphone
GROUP BY model, storage
ORDER BY model, FIELD(storage,'128GB','256GB','512GB')";

$result = $conn->query($sql);

// Organize data by model
$data = [];
while($row = $result->fetch_assoc()){
    $data[$row['model']][] = [
        'storage' => $row['storage'],
        'As New' => $row['As New'],
        'Flawless' => $row['Flawless'],
        'Excellent' => $row['Excellent'],
        'Good' => $row['Good']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <button id="addModelBtn">Add New Model</button>

    <div id="addModelModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
    background:rgba(0,0,0,0.5); justify-content:center; align-items:center;">
  <div style="background:#fff; padding:20px; width:500px; max-width:90%;">
    <h3>Add New Model</h3>
    <form id="addModelForm" method="POST" action="add_model.php">
      <label>Brand:</label>
      <input type="text" name="brand" required><br><br>
      
      <label>Model:</label>
      <input type="text" name="model" required><br><br>
      
      <label>Storage & Prices:</label>
      <div id="storageContainer">
        <div class="storage-row">
          <input type="text" name="storage[]" placeholder="128GB" required>
          As New: <input type="number" name="price_As_New[]" required>
          Flawless: <input type="number" name="price_Flawless[]" required>
          Excellent: <input type="number" name="price_Excellent[]" required>
          Good: <input type="number" name="price_Good[]" required>
        </div>
      </div>
      <button type="button" id="addStorageBtn">Add Storage</button><br><br>
      
      <button type="submit">Add Model</button>
      <button type="button" id="closeModalBtn">Cancel</button>
    </form>
  </div>
</div>

    <h2>iPhone Buyback Prices</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Model</th>
        <th>Storage</th>
        <th>As New</th>
        <th>Flawless</th>
        <th>Excellent</th>
        <th>Good</th>
        <th>Edit</th>
    </tr>

<?php foreach($data as $model => $storages): ?>
    <?php $rowspan = count($storages); ?>
    
    <?php foreach($storages as $i => $s): ?>
    <tr>
        <form method="POST" action="update.php">
            
            <?php if($i == 0): ?>
                <td rowspan="<?= $rowspan ?>"><?= $model ?></td>
            <?php endif; ?>

            <td>
                <?= $s['storage'] ?>
                <input type="hidden" name="model" value="<?= $model ?>">
                <input type="hidden" name="storage" value="<?= $s['storage'] ?>">
            </td>

            <td>
                <input type="number" name="prices[As New]" value="<?= $s['As New'] ?>" required>
            </td>
            <td>
                <input type="number" name="prices[Flawless]" value="<?= $s['Flawless'] ?>" required>
            </td>
            <td>
                <input type="number" name="prices[Excellent]" value="<?= $s['Excellent'] ?>" required>
            </td>
            <td>
                <input type="number" name="prices[Good]" value="<?= $s['Good'] ?>" required>
            </td>

            <td>
                <button type="submit">Update</button>
            </td>

        </form>
    </tr>
    <?php endforeach; ?>
<?php endforeach; ?>

</table>