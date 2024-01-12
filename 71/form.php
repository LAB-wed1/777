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