<?php
require '../db.php';
$message = '';
if (isset($_POST['customer_id']) && isset($_POST['customer_name']) && isset($_POST['customer_sname']) && isset($_POST['address']) && isset($_POST['phoneNumber'])){
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_sname = $_POST['customer_sname'];
    $address = $_POST['address']; 
    $phoneNumber = $_POST['phoneNumber']; 
    $sql = "INSERT INTO customer(customer_id, customer_name, customer_sname, address, phoneNumber)
    VALUES('$customer_id', '$customer_name', '$customer_sname', '$address', '$phoneNumber')";
    $statement = $connection->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มลูกค้าสำเร็จ';
        header("Location: ../customer/show.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>เพิ่มลูกค้า</h2>
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
          <input type="text" name="customer_id" id="customer_id" class="form-control" placeholder = 'รหัสลูกค้า' pattern = "c[0-9]{4}" title = "กรุณากรอกตัวอักษร c และตัวเลข 4 หลัก" required ></div>
        <div class="form-group">
          <label for="">ชื่อ</label>
          <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder = 'ชื่อ' required ></div>
        <div class="form-group">
          <label for="">นามสกุล</label>
          <input type="text" name="customer_sname" id="customer_sname" class="form-control" placeholder = 'นามสกุล' required ></div>
        <div class="form-group">
          <label for="">ที่อยู่</label>
          <input type="text" name="address" id="address" class="form-control" placeholder = 'บ้านเลขที่ หมู่ ตำบล อำเภอ จังหวัด รหัสไปรษณีย์' required ></div>   
        <div class="form-group">
          <label for="">หมายเลขโทรศัพท์</label>
          <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder = 'หมายเลขโทรศัพท์' required ></div>   
        <div class="form-group">
           <button type="submit" class="btn btn-info">เพิ่มลูกค้า</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>