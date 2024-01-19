

<?php 
session_start();

// ตรวจสอบว่ามีค่า $_POST['username'] ถูกส่งมาหรือไม่
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    
    
    // กำหนดค่าให้กับตัวแปร session
    $_COOKIE['username'] = $username;

    // สร้าง Cookie ที่มีอายุ 1 ชั่วโมง
    setcookie('username', $username, time() + 3600, '/');
}
// ตรวจสอบว่ามีค่า $_COOKIE['username'] หรือไม่ 

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "𝗪𝗲𝗹𝗰𝗼𝗺𝗲 𝗯𝗮𝗰𝗸 〔 $username 〕 ";
}
?>

</br></br>

<?php 
if (isset($_COOKIE['username'])) {
    echo '<br><a href="logoutCookie.php">Logout</a>';
}
?>