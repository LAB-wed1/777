<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $language = $_POST['language'];
    $gender = $_POST['gender'];
    $interest = isset($_POST['interest']) ? implode(", ", $_POST['interest']) : ''; // Corrected processing for checkboxes
    $comment = $_POST['comment'];

    if (strlen($login) < 6) {
        echo "Login ต้องยาวอย่างน้อย 6 ตัวอักษร<br>";
    }

    if (!filter_var($password, FILTER_VALIDATE_INT)) {
        echo "Password ต้องเป็นแบบตัวเลข<br>";
    }

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['language'] = $language;
    $_SESSION['gender'] = $gender;
    $_SESSION['interest'] = $interest;
    $_SESSION['comment'] = $comment;
} else {
    ?>
    <form method="post" action="">
        <!-- ... Other form elements ... -->

        <label for="interest">Interest:</label>
        <input class="form-check-input" type="checkbox" id="check1" name="interest[]" value="movies/tv/music" checked>
        <label class="form-check-label">Movies/TV/Music</label><br>
        <input class="form-check-input" type="checkbox" id="check2" name="interest[]" value="sports" checked>
        <label class="form-check-label">Sports</label>
        <input class="form-check-input" type="checkbox" id="check3" name="interest[]" value="travel" checked>
        <label class="form-check-label">Travel</label><br>

        <!-- ... Other form elements ... -->

        <button type="submit">Submit</button>
    </form>
    <?php
}

if (!empty($_SESSION)) {
    echo "<h2>ข้อมูลที่เก็บใน Session</h2>";
    echo "<ul>";
    echo "<li>Login: {$_SESSION['login']}</li>";
    echo "<li>Password: {$_SESSION['password']}</li>";
    echo "<li>Language: {$_SESSION['language']}</li>";
    echo "<li>Gender: {$_SESSION['gender']}</li>";
    echo "<li>Interest: {$_SESSION['interest']}</li>";
    echo "<li>Comment: {$_SESSION['comment']}</li>";
    echo "</ul>";

    echo '<form method="post" action="">';
    echo '<input type="submit" name="refresh" value="รีเฟรช">';
    echo '<input type="submit" name="logout" value="ลบ Session">';
    echo '</form>';
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['refresh'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

?>
<html>
<body>

<?php
if (!isset($_COOKIE[$cookie_name])) {
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
if (count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}
?>
