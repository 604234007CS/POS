<?php
require '../db.php';

$staff_id = $_GET['id'];
$sql = 'SELECT * FROM staff WHERE staff_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$staff_id]);
$staffs = $statement->fetch(PDO::FETCH_OBJ);

$message = '';
if (isset($_POST['password']) && isset($_POST['staff_name']) && isset($_POST['staff_sname']) && isset($_POST['staff_type_id']) && isset($_POST['address']) && isset($_POST['phoneNumber'])){
    $password = $_POST['password'];
    $staff_name = $_POST['staff_name']; 
    $staff_sname = $_POST['staff_sname']; 
    $staff_type_id = $_POST['staff_type_id']; 
    $address = $_POST['address']; 
    $phoneNumber = $_POST['phoneNumber']; 
    $sql = "UPDATE staff SET password=?, staff_name=?, staff_sname=?, staff_type_id=?, address=?, phoneNumber=? WHERE staff_id=?";
    $statement = $connection->prepare($sql);
    if($statement->execute([$password, $staff_name, $staff_sname, $staff_type_id, $address, $phoneNumber, $staff_id]))   {
        $message = 'แก้ไขข้อมูลพนักงานสำเร็จ';
        header("Location: ../staff/show.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>แก้ไขข้อมูลพนักงาน</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">รหัสพนักงาน</label>
          <input value="<?= $staffs->staff_id; ?>" type="text" name="staff_id" id="staff_id" class="form-control" placeholder = 'รหัสพนักงาน' pattern = "s[0-9]{3}" title = "กรุณากรอกตัวอักษร s และตัวเลข 3 หลัก" readonly ></div>
        <div class="form-group">
          <label for="">ชื่อบัญชีผู้ใช้</label>
          <input value="<?= $staffs->username; ?>" type="text" name="username" id="username" class="form-control" placeholder = 'ชื่อบัญชีผู้ใช้' readonly ></div>
        <div class="form-group">
          <label for="">รหัสผ่าน</label>
          <input value="<?= $staffs->password; ?>" type="password" name="password" id="password" class="form-control" placeholder = 'รหัสผ่าน' required ></div>
        <div class="form-group">
          <label for="">ชื่อ</label>
          <input value="<?= $staffs->staff_name; ?>" type="text" name="staff_name" id="staff_name" class="form-control" placeholder = 'ชื่อ' required ></div>
        <div class="form-group">
          <label for="">นามสกุล</label>
          <input value="<?= $staffs->staff_sname; ?>" type="text" name="staff_sname" id="staff_sname" class="form-control" placeholder = 'นามสกุล' required ></div>
        <div class="form-group"> 
            <label for="">ประเภทพนักงาน</label>
            <select value="<?= $staffs->staff_type_id; ?>" name="staff_type_id" id="staff_type_id" class="form-control" placeholder = 'ประเภทพนักงาน' required >
                <option value="">ประเภทพนักงาน</option>
                <option value="1">ผู้จัดการ</option>
                <option value="2">พนักงานทั่วไป</option>
            </select></div>
        <div class="form-group">
          <label for="">ที่อยู่</label>
          <input value="<?= $staffs->address; ?>" type="text" name="address" id="address" class="form-control" placeholder = 'ที่อยู่' required ></div>   
        <div class="form-group">
          <label for="">หมายเลขโทรศัพท์</label>
          <input value="<?= $staffs->phoneNumber; ?>" type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder = 'หมายเลขโทรศัพท์' required ></div>   
        <div class="form-group">
           <button type="submit" class="btn btn-info">แก้ไขข้อมูลพนักงาน</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>