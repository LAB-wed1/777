<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $language = $_POST['language'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];
    $comment = $_POST['comment'];

    // แสดงผลที่ผู้ใช้กรอก
    echo "<h2>ข้อมูลที่คุณกรอก</h2>";
    echo "<ul>";
    echo "<li>Login: $login</li>";
    echo "<li>Password: $password</li>";
    echo "<li>Language: $language</li>";
    echo "<li>Gender: $gender</li>";
    echo "<li>Interest: $interest</li>";
    echo "<li>Comment: $comment</li>";
    echo "</ul>";

    // ตรวจสอบความยาวของข้อมูล login
    if (strlen($login) < 6) {
        echo "Login ต้องยาวอย่างน้อย 6 ตัวอักษร<br>";
    }

    // ตรวจสอบรูปแบบของข้อมูล password
    if (!filter_var($password, FILTER_VALIDATE_INT)) {
        echo "Password ต้องเป็นแบบตัวเลข<br>";
    }

    // เก็บข้อมูลใน session
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['language'] = $language;
    $_SESSION['gender'] = $gender;
    $_SESSION['interest'] = $interest;
    $_SESSION['comment'] = $comment;
} else {
    // ถ้าไม่มีการส่งค่าฟอร์มมา แสดงข้อความ
    echo "ไม่มีข้อมูลที่ส่งมาจากฟอร์ม";
}

// ตรวจสอบว่ามีข้อมูลใน session หรือไม่
if (!empty($_SESSION)) {
    // แสดงข้อมูลจาก session
    echo "<h2>ข้อมูลที่เก็บใน Session</h2>";
    echo "<ul>";
    echo "<li>Login: {$_SESSION['login']}</li>";
    echo "<li>Password: {$_SESSION['password']}</li>";
    echo "<li>Language: {$_SESSION['language']}</li>";
    echo "<li>Gender: {$_SESSION['
