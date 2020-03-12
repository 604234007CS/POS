<?php
require '../db.php';

$staff_type_id = $_GET['id'];
$sql = 'SELECT * FROM staff_type WHERE staff_type_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$staff_type_id]);
$staff_type = $statement->fetch(PDO::FETCH_OBJ);

$message = '';
if (isset($_POST['staff_type_id']) && isset($_POST['staff_type_name']) ){
    $staff_type_id = $_POST['staff_type_id']; 
    $staff_type_name = $_POST['staff_type_name']; 
     
    $sql = "UPDATE staff_type SET staff_type_id=?, staff_type_name=?";
    $statement = $connection->prepare($sql);
    if($statement->execute([$staff_type_id, $staff_type_name]))   {
        $message = 'แก้ไขข้อมูลประเภทพนักงานสำเร็จ';
        header("Location: ../staff_type/show.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>แก้ไขข้อมูลประเภทพนักงาน</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">รหัสประเภทพนักงาน</label>
          <input value="<?= $staff_type->staff_type_id; ?>" type="text" name="staff_type_id" id="staff_type_id" 
          class="form-control" placeholder = 'รหัสประเภทพนักงาน' pattern = "[0-9]{3}" title = "กรุณากรอกตัวเลข 3 หลัก" required >
        </div>
        
        <div class="form-group">
          <label for="">ชื่อประเภทพนักงาน</label>
          <input value="<?= $staff_type->staff_type_name; ?>" type="text" name="staff_type_name" id="staff_type_name" 
          class="form-control" placeholder = 'ชื่อประเภทพนักงาน' required >
        </div>
        
        <div class="form-group">
           <button type="submit" class="btn btn-info">แก้ไขข้อมูลพนักงาน</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>