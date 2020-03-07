<?php
require '../db.php';
$message = '';
if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_type_id']) && isset($_POST['price']) && isset($_POST['product_MFD']) && isset($_POST['product_EXP'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_type_id = $_POST['product_type_id'];
    $price = $_POST['price']; 
    $product_MFD = $_POST['product_MFD']; 
    $product_EXP = $_POST['product_EXP']; 
    $sql = "INSERT INTO product(product_id, product_name, product_type_id, price, product_MFD, product_EXP)
    VALUES('$product_id', '$product_name', '$product_type_id', '$price', '$product_MFD', '$product_EXP')";
    $statement = $connection->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มสินค้าสำเร็จ';
        header("Location: ../product/show.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-5">
    <div class = "card-header">
    <h2>เพิ่มสินค้า</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">รหัสสินค้า</label>
          <input type="text" name="product_id" id="product_id" class="form-control" placeholder = 'รหัสสินค้า' pattern = "[0-9]{5}" title = "กรุณากรอกรหัส 5 หลัก" required ></div>
        <div class="form-group">
          <label for="">ชื่อสินค้า</label>
          <input type="text" name="product_name" id="product_name" class="form-control" placeholder = 'ชื่อสินค้า' required ></div>
        <div class="form-group"> 
            <label for="">ประเภทสินค้า</label>
            <select name="product_type_id" id="product_type_id" class="form-control" placeholder = 'ประเภทสินค้า' required >
                <option value="">ประเภทสินค้า</option>
                <option value="1">เครื่องดื่ม</option>
                <option value="2">ของใช้</option>
            </select></div>
        <div class="form-group">
          <label for="">ราคา</label>
          <input type="text" name="price" id="price" class="form-control" placeholder = 'ราคา THB' required ></div>   
        <div class="form-group">
          <label for="">วันผลิต</label>
          <input type="date" name="product_MFD" id="product_MFD" class="form-control" placeholder = 'วันผลิต' required ></div>
        <div class="form-group">
          <label for="">วันหมดอายุ</label>
          <input type="date" name="product_EXP" id="product_EXP" class="form-control" placeholder = 'วันหมดอายุ' required ></div>
        <div class="form-group">
           <button type="submit" class="btn btn-info">เพิ่มสินค้า</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>