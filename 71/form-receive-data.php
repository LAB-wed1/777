<?php
// เริ่ม session
session_start();

// ตรวจสอบว่ามีการส่งค่าฟอร์มมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // กำหนดตัวแปรสำหรับรับค่า
    $login = $_POST['login'];
    $password = $_POST['password'];
    $language = $_POST['language'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];
    $comment = $_POST['comment'];

    // ตรวจสอบความยาวของข้อมูล login
    if (strlen($login) < 6) {
        echo "Login ต้องยาวอย่างน้อย 6 ตัวอักษร<br>";
    }

    // ตรวจสอบรูปแบบของข้อมูล password
    if (!ctype_digit($password)) {
        echo "Password ต้องเป็นตัวเลขเท่านั้น<br>";
    }

    // เก็บข้อมูลใน session
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['language'] = $language;
    $_SESSION['gender'] = $gender;
    $_SESSION['interest'] = $interest;
    $_SESSION['comment'] = $comment;

    // ทำการ redirect ไปยัง URL ที่ต้องการ
    header('Location: ตัวอย่าง_url.php');
    exit();  // จำเป็นต้องใส่ exit เพื่อให้การทำงานสิ้นสุดทันที
} else {
    // ถ้าไม่มีการส่งค่าฟอร์มมา แสดงฟอร์มให้กรอก
    ?>
    <form method="post" action="">
        <!-- ฟอร์มตามที่คุณต้องการ -->
    </form>

    <?php
}
?>
