<?php
require '../db.php';
$sql = 'SELECT * FROM product_type';
$statement = $connection->prepare($sql);
$statement->execute();
$product_type = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลประเภทสินค้า</h2>
      <a href="add.php" class='btn btn-info'>เพิ่มประเภทสินค้า</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสประเภทสินค้า</th>
          <th>ชื่อประเภทสินค้า</th>
          
        </tr>
        <?php foreach($product_type as $product_types): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $product_types->product_type_id; ?></td> 
            <td><?= $product_types->product_type_name; ?></td> 
        
            <td>
              <a href="edit.php?id=<?= $customers->product_type_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete.php?id=<?= $customers->product_type_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

