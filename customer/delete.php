<?php
require '../db.php';
$customer_id = $_GET['id'];
$sql = 'DELETE FROM customer WHERE customer_id=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$customer_id])) {
  header("Location: ../customer/show.php");
}