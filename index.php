<?php require 'header.php'; ?>


<div class="container">
  <div class = "card mt-5">
    <div class = "card-header">
    <h2>ลงชื่อเข้าใช้</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

    <form action="login.php" method="post">        
        <div class="form-group">  
          <input type="username" name="username" id="username" class="form-control" placeholder = 'บัญชีผู้ใช้'></div>
        <div class="form-group">
          <input type="password" name="password" id="password" class="form-control" placeholder = 'รหัสผ่าน'></div>  
        <div class="form-group">
           <button type="submit" class="btn btn-info">เข้าสู่ระบบ</button></div>
      </form>
    </div>
  </div>
</div>


<?php require 'header.php'; ?>
