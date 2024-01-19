<?php
session_start();

// ลบค่าทั้งหมดในตัวแปร session
session_destroy();

// ลำพังกลับไปหน้าแรก
header('Location: Session.php');
?>