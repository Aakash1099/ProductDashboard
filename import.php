<?php
require 'config/db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_FILES['file']) || $_FILES['file']['error'] !== 0) {
    die("File upload failed");
}

$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
if ($ext !== 'csv') {
    die("Only CSV files are allowed");
}

$handle = fopen($_FILES['file']['tmp_name'], "r");
if (!$handle) {
    die("Unable to open CSV file");
}

/* Detect delimiter (, or ;) */
$firstLine = fgets($handle);
$delimiter = (substr_count($firstLine, ';') > substr_count($firstLine, ',')) ? ';' : ',';
rewind($handle);

/* Skip header */
fgetcsv($handle, 1000, $delimiter);

while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {

    if (count($row) < 4) continue;

    [$name, $price, $category, $quantity] = $row;

    if ($name === '' || $category === '' || !is_numeric($price) || !is_numeric($quantity)) {
        continue;
    }

    $stmt = $pdo->prepare(
        "INSERT INTO products (name, price, category, quantity)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->execute([
        trim($name),
        $price,
        trim($category),
        (int)$quantity
    ]);
}

fclose($handle);

header("Location: index.php");
exit;
