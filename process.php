<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
</head>
<body>
    <h2>Form Submission Result</h2>

    <?php
    // เลือกตัวแปรที่ใช้รับค่า (ในที่นี้ใช้ $_POST)
    $name = $_POST['name'];
    $email = $_POST['email'];

    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    ?>
</body>
</html>
