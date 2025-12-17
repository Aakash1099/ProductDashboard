<?php
require "../config/db.php";

$stmt = $pdo->query("
    SELECT category, SUM(quantity) AS count
    FROM products
    GROUP BY category
");
header('Content-Type: application/json');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
