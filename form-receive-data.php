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
    if (strlen($login) < 1) {
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
    // ถ้าไม่มีการส่งค่าฟอร์มมา แสดงฟอร์มให้กรอก
    ?>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <div class="form-group">
            <label for="interest">Interest:</label>
            <select name="interest" id="interest">
                <option value="movies/tv/music">ภาพยนตร์/ทีวี/ดนตรี</option>
                <option value="sports">กีฬา</option>
                <option value="travel">ท่องเที่ยว</option>
            </select><br>
       
            

            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="male" value="male"> ชาย
            <input type="radio" name="gender" id="female" value="female"> หญิง<br>

        <label for="interest">Interest:</label>
        <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" checked>
        <label class="form-check-label">Movies/TV/Music</label><br>
        <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" checked>
        <label class="form-check-label">sports</label>
        <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" checked>
        <label class="form-check-label">Travel</label><br>
       
        
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea><br>

        <button type="submit">Submit</button>
    </form>

    <?php
}

//   ตรวจสอบว่ามีข้อมูลใน session หรือไม่
if (!empty($_SESSION)) {
    // แสดงข้อมูลจาก session
    echo "<h2>ข้อมูลที่เก็บใน Session</h2>";
    echo "<ul>";
    echo "<li>Login: {$_SESSION['login']}</li>";
    echo "<li>Password: {$_SESSION['password']}</li>";
    echo "<li>Language: {$_SESSION['language']}</li>";
    echo "<li>Gender: {$_SESSION['gender']}</li>";
    echo "<li>Interest: {$_SESSION['interest']}</li>";
    echo "<li>Comment: {$_SESSION['comment']}</li>";
    echo "</ul>";

    // เพิ่มปุ่ม "รีเฟรช" และ "ลบ Session"
    echo '<form method="post" action="">';
    echo '<input type="submit" name="refresh" value="รีเฟรช">';
    echo '<input type="submit" name="logout" value="ลบ Session">';
    echo '</form>';
}

// ตรวจสอบว่ามีการกดปุ่ม "ลบ Session" หรือไม่
if (isset($_POST['logout'])) {
    // ลบข้อมูลที่เก็บใน session
    session_destroy();
    // ส่งกลับไปที่หน้าฟอร์ม
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// ตรวจสอบว่ามีการกดปุ่ม "รีเฟรช" หรือไม่
if (isset($_POST['refresh'])) {
    // ลบข้อมูลที่เก็บใน session  
    session_destroy();  
    // ส่งกลับไปที่หน้าฟอร์ม
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
    //cookie 
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day  day coolek
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}


setcookie("test_cookie", "test", time() + 3600, '/');
?>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
?>

?>

    