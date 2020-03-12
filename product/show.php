<?php
require '../db.php';
$sql = 'SELECT product.product_id, product.product_name, product_type.product_type_name, product.price, product.product_MFD, product.product_EXP 
FROM product, product_type 
WHERE product.product_type_id = product_type.product_type_id'; //join table
$statement = $connection->prepare($sql);
$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container-fluid">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลสินค้า</h2>
      <a href="add.php" class='btn btn-info'>เพิ่มสินค้า</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>ประเภทสินค้า</th>
          <th>ราคา(บาท)</th>
          <th>วันที่ผลิต</th>
          <th>วันหมดอายุ</th>
        </tr>
        <?php foreach($product as $products): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $products->product_id; ?></td> 
            <td><?= $products->product_name; ?></td> 
            <td><?= $products->product_type_name; ?></td> 
            <td><?= $products->price; ?></td> 
            <td><?= $products->product_MFD; ?></td> 
            <td><?= $products->product_EXP; ?></td>   
            <td>
              <a href="edit.php?id=<?= $products->product_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete.php?id=<?= $products->product_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require '../footer.php'; ?>
