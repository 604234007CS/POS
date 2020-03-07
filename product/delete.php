<?php
require '../db.php';
$product_id = $_GET['id'];
$sql = 'DELETE FROM product WHERE product_id=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$product_id])) {
  header("Location: ../product/show.php");
}