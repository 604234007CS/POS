<?php
require '../db.php';
$message = '';
if ( isset($_POST['staff_type_id']) && isset($_POST['staff_type_name'])){
    $staff_type_id = $_POST['staff_type_id'];
    $staff_type_name = $_POST['staff_type_name'];
    $sql = "INSERT INTO staff_type(staff_type_id, staff_type_name)
    VALUES('$staff_type_id', '$staff_type_name')";
    $statement = $connection->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มประเภทพนักงานสำเร็จ';
        header("Location: ../staff_type/show.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>เพิ่มประเภทพนักงาน</h2>
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
          <input type="text" name="staff_type_id" id="staff_type_id" class="form-control" placeholder = 'รหัสประเภทพนักงาน'  required ></div>
        <div class="form-group">
          <label for="">ชื่อประเภทพนักงาน</label>
          <input type="text" name="staff_type_name" id="staff_type_name" class="form-control" placeholder = 'ชื่อประเภทพนักงาน' required ></div>
        <div class="form-group">
           <button type="submit" class="btn btn-info">เพิ่มประเภทพนักงาน</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>