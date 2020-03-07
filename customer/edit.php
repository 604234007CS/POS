<?php
require '../db.php';
$customer_id = $_GET['id'];
$sql = 'SELECT * FROM customer WHERE customer_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$customer_id]);
$customers = $statement->fetch(PDO::FETCH_OBJ);

$message = '';
if (isset($_POST['customer_name']) && isset($_POST['customer_sname']) && isset($_POST['address']) && isset($_POST['phoneNumber'])){
    $customer_name = $_POST['customer_name'];
    $customer_sname = $_POST['customer_sname'];
    $address = $_POST['address']; 
    $phoneNumber = $_POST['phoneNumber']; 
    $sql = "UPDATE customer SET customer_name=?, customer_sname=?, address=?, phoneNumber=? WHERE customer_id=?";
    $statement = $connection->prepare($sql);
    if($statement->execute([$customer_name, $customer_sname, $address, $phoneNumber, $customer_id]))   {
        $message = 'แก้ไขข้อมูลลูกค้าสำเร็จ';
        header("Location: ../customer/show.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>แก้ไขข้อมูลลูกค้า</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">รหัสลูกค้า</label>
          <input value="<?= $customers->customer_id; ?>" type="text" name="customer_id" id="customer_id" class="form-control" placeholder = 'รหัสลูกค้า' pattern = "c[0-9]{4}" title = "กรุณากรอกตัวอักษร s และตัวเลข 3 หลัก" required ></div>
        <div class="form-group">
          <label for="">ชื่อ</label>
          <input value="<?= $customers->customer_name; ?>" type="text" name="customer_name" id="customer_name" class="form-control" placeholder = 'ชื่อ' required ></div>
        <div class="form-group">
          <label for="">นามสกุล</label>
          <input value="<?= $customers->customer_sname; ?>" type="text" name="customer_sname" id="customer_sname" class="form-control" placeholder = 'นามสกุล' required ></div>
        <div class="form-group">
          <label for="">ที่อยู่</label>
          <input value="<?= $customers->address; ?>" type="text" name="address" id="address" class="form-control" placeholder = 'ที่อยู่' required ></div>   
        <div class="form-group">
          <label for="">หมายเลขโทรศัพท์</label>
          <input value="<?= $customers->phoneNumber; ?>" type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder = 'หมายเลขโทรศัพท์' required ></div>   
        <div class="form-group">
           <button type="submit" class="btn btn-info">แก้ไขข้อมูลลูกค้า</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>