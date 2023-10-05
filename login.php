<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_accounts";

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من اتصال قاعدة البيانات
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال معلومات تسجيل الدخول من المستخدم
$email = $_POST["email"];
$password = $_POST["password"];

// استعلام لاستعراض المستخدم
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user["password"])) {
        echo "<h1>HELLO</h1>";
    } else {
        echo "كلمة المرور غير صحيحة.";
    }
} else {
    echo "المستخدم غير موجود.";
}

mysqli_close($conn);
?>

