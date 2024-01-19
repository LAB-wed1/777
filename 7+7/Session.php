<?php
session_start();

// ตรวจสอบว่ามีค่า $_POST['username'] ถูกส่งมาหรือไม่
if (isset($_POST['username'])) {
    $username = $_POST['username'];

    // กำหนดค่าให้กับตัวแปร session
    $_SESSION['username'] = $username; 

    // ตรวจสอบว่ามีค่า $_SESSION['size'] หรือไม่
    if (isset($_SESSION['size'])) {
        $size = $_SESSION['size'] + 1;
        $_SESSION['size'] = $size;
    } else {
        // ถ้าไม่มีค่า $_SESSION['size'] ให้กำหนดค่าเริ่มต้นเป็น 1
        $size = 1;
        $_SESSION['size'] = $size;
    }
}

// ตรวจสอบว่ามีค่า $_SESSION['username'] และ $_SESSION['size'] หรือไม่
if (isset($_SESSION['username'], $_SESSION['size'])) {
    $username = $_SESSION['username'];
    $size = $_SESSION['size'];
    echo "USER 〔 $username 〕  LOGIN FOR THE $size TIME";
} else {
    echo "ENTER YOUR USERNAME";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
</head>
<body>
    <form method="post" action="Session.php">
        <label for="username">USERNAME:</label>
        <input type="text" id="username" name="username">
        <button type="submit">SUBMIT</button>
    </form>

    <?php
    // ตรวจสอบว่ามีค่า $_SESSION['username'] หรือไม่
    if (isset($_SESSION['username'])) {
        echo '<br><a href="logoutS.php">Logout</a>';
    }
    ?>
</body>
</html>