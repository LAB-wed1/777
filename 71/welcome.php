<?php
session_start();

// ตรวจสอบว่ามี Session ชื่อ 'username' หรือไม่
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "Welcome, $username!";
} else {
    echo "You are not logged in.";
}
?>
