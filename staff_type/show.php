<?php
require '../db.php';
$sql = 'SELECT * FROM staff_type';
$statement = $connection->prepare($sql);
$statement->execute();
$staff_type = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container-fluid">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลประเภทพนักงาน</h2>
      <a href="add.php" class='btn btn-info'>เพิ่มประเภทพนักงาน</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสประเภทพนักงาน</th>
          <th>ชื่อประเภทพนักงาน</th>
         
        </tr>
        <?php foreach($staff_type as $staff_types): ?>
          <tr>
            
             <!-- สร้างชื่อให้เหมือนในฐานข้อมูล -->
            <td><?= $staff_types->staff_type_id; ?></td> 
            <td><?= $staff_types->staff_type_name; ?></td> 
              
            <td>
              <a href="edit.php?id=<?= $staff_types->staff_type_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete.php?id=<?= $staff_types->staff_type_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require '../footer.php'; ?>
