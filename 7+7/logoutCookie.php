<?php
// ลบ Cookie โดยกำหนดอายุเป็นย้อนหลัง 1 ชั่วโมง
setcookie('username', '', time() - 3600, '/');

// ลบค่า $_SESSION ที่เก็บ username
unset($_SESSION['username']);

// ลำพังกลับไปหน้าแรก
header('Location: Cookie.php');
?>