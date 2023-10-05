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

// استقبال معلومات التسجيل من المستخدم
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"]; // لا تقم بتجزئة كلمة المرور هنا

// قم بتحقق من صحة المعلومات المُدخلة وتنفيذ العملية إذا تم التحقق
if (!empty($username) && !empty($email) && !empty($password)) {
    // هنا يمكنك إجراء المزيد من التحقق من البيانات إذا لزم الأمر

    // قم بعمل تجزئة لكلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // قم بإعداد استعلام SQL لإدراج بيانات المستخدم الجديد
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    // قم بتنفيذ الاستعلام وفحص نجاحه
    if (mysqli_query($conn, $sql)) {
        echo "<h1>HELLO</h1>";
    } else {
        echo "خطأ: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "يرجى ملء جميع الحقول المطلوبة.";
}

// أغلق اتصال قاعدة البيانات
mysqli_close($conn);
?>
