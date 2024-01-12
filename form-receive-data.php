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
    // ถ้าไม่มีการส่งค่าฟอร์มมา แสดงฟอร์มให้กรอก
    ?>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="language">Language:</label>
        <input type="text" id="language" name="language" required><br>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" required><br>

        <label for="interest">Interest:</label>
        <input type="text" id="interest" name="interest" required><br>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" required></textarea><br>

        <button type="submit">Submit</button>
    </form>
<?php
}

// ตรวจสอบว่ามีข้อมูลใน session หรือไม่
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
}
?>
