<?php
// เริ่ม session
session_start();

// ตรวจสอบว่ามี Session หรือไม่
if (isset($_SESSION['login'])) {
    // แสดงข้อมูลจาก Session
    echo "<h2>ข้อมูลจาก Session</h2>";
    echo "<p>Login: {$_SESSION['login']}</p>";
    echo "<p>Password: {$_SESSION['password']}</p>";
    echo "<p>Language: {$_SESSION['language']}</p>";
    echo "<p>Gender: {$_SESSION['gender']}</p>";
    echo "<p>Interest: {$_SESSION['interest']}</p>";
    echo "<p>Comment: {$_SESSION['comment']}</p>";
} else {
    // ถ้าไม่มี Session ให้แสดงข้อความ
    echo "ยังไม่มีข้อมูลที่เก็บใน Session";
}
?>
