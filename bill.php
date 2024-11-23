<?php
// إعدادات الاتصال بقاعدة البيانات
$servername = "sql310.infinityfree.com";
$username = "if0_37771647"; // اسم المستخدم
$password = "1c5cFmoF5fD8jtI"; // كلمة المرور
$dbname = "if0_37771647_zeraytiek"; // اسم قاعدة البيانات

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استعلام لاسترجاع أحدث البيانات من جدول الفاتورة
$sql = "SELECT * FROM bill ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// التحقق من أن الاستعلام تم تنفيذه بنجاح
if ($result === false) {
    die("خطأ في استعلام قاعدة البيانات: " . $conn->error); // إذا فشل الاستعلام، عرض الخطأ
}

// التحقق من وجود بيانات
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "لا توجد بيانات لعرض الفاتورة.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة الاستثمار</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('m.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            direction: rtl; /* لضبط النصوص من اليمين لليسار */
        }
        .invoice {
            width: 80%;
            max-width: 800px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }
        .invoice h2 {
            text-align: center;
            color: #1e3d58;
            font-size: 30px;
            margin-bottom: 30px;
        }
        .invoice .info, .invoice .details {
            margin-bottom: 30px; /* زيادة المسافة بين الأقسام */
        }
        .invoice .info div, .invoice .details div {
            margin-bottom: 15px; /* زيادة المسافة بين العناصر داخل القسم */
            font-size: 16px;
            text-align: right; /* لضبط النصوص لليمين */
            display: inline-block; /* لجعل العنوان والبيانات بجانب بعض */
            width: 48%; /* تحديد العرض لكل من العنوان والبيانات بحيث تظهر بجانب بعض */
        }
        .invoice .info div strong, .invoice .details div strong {
            color: #1e3d58;
            font-weight: bold;
        }
        .invoice .info div span, .invoice .details div span {
            margin-right: 20px; /* المسافة بين العنوان والبيانات */
        }
        .invoice .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            color: #333;
            margin-top: 40px; /* زيادة المسافة بين العناصر */
        }
        .invoice .total div {
            margin-bottom: 15px; /* زيادة المسافة بين العناصر داخل قسم الإجمالي */
        }
        .invoice .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }
        .invoice .footer a {
            color: #1e3d58;
            text-decoration: none;
        }
        .invoice .line {
            border-top: 2px solid #1e3d58;
            margin: 30px 0;
        }
    </style>
</head>
<body>

<div class="invoice">
    <h2>فاتورة الاستثمار</h2>

    <div class="info">
        <div><strong>اسم المستثمر:</strong><span><?php echo htmlspecialchars($row['investor_name']); ?></span></div>
        <div><strong>رقم المستثمر:</strong><span><?php echo htmlspecialchars($row['investor_id']); ?></span></div>
        <div><strong>المنطقة:</strong><span><?php echo htmlspecialchars($row['region']); ?></span></div>
        <div><strong>رقم الأرض:</strong><span><?php echo htmlspecialchars($row['land']); ?></span></div>
    </div>

    <div class="line"></div>

    <div class="details">
        <div><strong>البذور:</strong><span><?php echo htmlspecialchars($row['seeds']); ?></span></div>
        <div><strong>الأسمدة:</strong><span><?php echo htmlspecialchars($row['fertilizers']); ?></span></div>
        <div><strong>المعدات:</strong><span><?php echo htmlspecialchars($row['equipment']); ?></span></div>
        <div><strong>الخدمات الإضافية:</strong><span><?php echo htmlspecialchars($row['additional_services']); ?></span></div>
    </div>

    <div class="line"></div>

    <div class="total">
        <div><strong>الإجمالي:</strong><span><?php echo htmlspecialchars($row['total_price']); ?> OMR</span></div>
        <div><strong>طريقة الدفع:</strong><span><?php echo htmlspecialchars($row['payment_method']); ?></span></div>
    </div>

    <div class="footer">
        <p>شكرًا لاختياركم زِرايتك</p>
        <p><a href="mailto:info@zeraytiek.com">تواصل معنا</a> | <a href="index.php">الصفحة الرئيسية</a></p>
    </div>
</div>

</body>
</html>
