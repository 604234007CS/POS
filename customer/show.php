<?php
require '../db.php';
$sql = 'SELECT * FROM customer';
$statement = $connection->prepare($sql);
$statement->execute();
$customer = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container-fluid">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลลูกค้า</h2>
      <a href="add.php" class='btn btn-info'>เพิ่มลูกค้า</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสลูกค้า</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>ที่อยู่</th>
          <th>หมายเลขโทรศัพท์</th>
        </tr>
        <?php foreach($customer as $customers): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $customers->customer_id; ?></td> 
            <td><?= $customers->customer_name; ?></td> 
            <td><?= $customers->customer_sname; ?></td> 
            <td><?= $customers->address; ?></td> 
            <td><?= $customers->phoneNumber; ?></td>   
            <td>
              <a href="edit.php?id=<?= $customers->customer_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete.php?id=<?= $customers->customer_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require '../footer.php'; ?>
