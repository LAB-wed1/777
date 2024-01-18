
<?php 
session_start();

// ตรวจสอบว่ามีค่า $_POST['username'] ถูกส่งมาหรือไม่
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // กำหนดค่าให้กับตัวแปร session
    $_SESSION['username'] = $username;

    // สร้าง Cookie ที่มีอายุ 1 ชั่วโมง
    setcookie('username', $username, time() + 3600, '/');
}

// ตรวจสอบว่ามีค่า $_COOKIE['username'] หรือไม่
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "Welcome back, $username!";
} else {
    echo "Please enter your username.";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body align = "center">
    <form method="post" action="Cookie.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <button type="submit">Submit</button>
    </form>

    <?php
    // ตรวจสอบว่ามีค่า $_COOKIE['username'] หรือไม่
    if (isset($_COOKIE['username'])) {
        echo '<br><a href="logoutform.php">Logout</a>';
    }
    ?>
</body>
</html>