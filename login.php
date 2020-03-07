<?php
require_once 'db.php';
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT username, password, staff_name, staff_sname FROM staff WHERE username=? AND password=?";
$statement=$connection->prepare($sql);
$statement->execute([$username, $password]);
$username=$statement->fetch();
$staff_name=$username['staff_name'];
$staff_sname=$username['staff_sname'];
if(isset($staff_name) && isset($staff_sname)){
    session_start();
    $_SESSION['staff_name']=$staff_name;
    $_SESSION['staff_sname']=$staff_sname;
    header("Location:main.php");
}else{
    header("Location:index.php");
}
?>