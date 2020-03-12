<?php
require '../db.php';
$staff_type_id = $_GET['id'];
$sql = 'DELETE FROM staff_type WHERE staff_type_id=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$staff_type_id])) {
  header("Location: ../staff_type/show.php");
}