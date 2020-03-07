<?php
require '../db.php';
$staff_id = $_GET['id'];
$sql = 'DELETE FROM staff WHERE staff_id=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$staff_id])) {
  header("Location: ../staff/show.php");
}