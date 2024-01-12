<?php
session_start();

// ตรวจสอบว่ามี Cookie ชื่อ "user" หรือไม่
if (isset($_COOKIE['user'])) {
    $username = $_COOKIE['user'];
    $_SESSION['user'] = $username;
} else {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <p>Your profile information goes here.</p>

    <!-- ปุ่ม Logout -->
    <form method="post" action="">
        <button type="submit" name="logout">Logout</button>
    </form>

    <?php
    // ตรวจสอบว่ามีการกดปุ่ม "Logout" หรือไม่
    if (isset($_POST['logout'])) {
        // ลบ Cookie ชื่อ "user"
        setcookie("user", "", time() - 3600);

        // ลบ Session
        session_destroy();

        // ส่งกลับไปที่หน้า Login
        header('Location: login.php');
        exit();
    }
    ?>
</body>
</html>
