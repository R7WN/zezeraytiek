<?php
// إعدادات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = ""; // اتركه فارغًا إذا كنت تستخدم الإعداد الافتراضي لـ XAMPP
$dbname = "zeraytiek";

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق مما إذا كان النموذج قد أرسل
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // استقبال البيانات من النموذج
    $investor_name = $_POST['investor_name'];
    $investor_id = $_POST['investor_id'];
    $region = $_POST['region'] ?? "غيل الشبول";
    $land = $_POST['land'] ?? "1";

    // تحويل المصفوفات إلى سلاسل نصية باستخدام implode
    $seeds = isset($_POST['seeds']) ? implode(", ", $_POST['seeds']) : "";
    $fertilizers = isset($_POST['fertilizers']) ? implode(", ", $_POST['fertilizers']) : "";
    $equipment = isset($_POST['equipment']) ? implode(", ", $_POST['equipment']) : "";
    $additional_services = isset($_POST['additional_services']) ? implode(", ", $_POST['additional_services']) : "";

    $total_price = $_POST['total_price'];
    $payment_method = $_POST['payment'];

    // إعداد كود الإدخال باستخدام الاستعلامات المحضرة
    $stmt = $conn->prepare("INSERT INTO bill (investor_name, investor_id, region, land, seeds, fertilizers, equipment, additional_services, total_price, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssds", $investor_name, $investor_id, $region, $land, $seeds, $fertilizers, $equipment, $additional_services, $total_price, $payment_method);

    // تنفيذ كود الإدخال والتحقق من نجاح العملية
    if ($stmt->execute()) {
        echo "<script>alert('تمت العملية بنجاح'); window.location.href = 'invoice.php';</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء إدخال البيانات: " . $stmt->error . "');</script>";
    }

    // إغلاق الاستعلام
    $stmt->close();
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
