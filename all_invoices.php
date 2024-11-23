<?php
// الاتصال بقاعدة البيانات
$servername = "sql310.infinityfree.com";
$username = "if0_37771647"; // اسم المستخدم
$password = "1c5cFmoF5fD8jtI"; // كلمة المرور
$dbname = "if0_37771647_zeraytiek"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("الاتصال بقاعدة البيانات فشل: " . $conn->connect_error);
}

// استعلام لجلب كل الفواتير
$sql = "SELECT * FROM bill"; // تأكد من اسم الجدول والحقول
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>كل الفواتير</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('m.jpg'); 
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 1200px;
            overflow-x: auto;
        }
        h1 {
            text-align: center;
            color: #343224;
            font-size: 36px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #343224; /* اللون البني الغامق */
        }
        th {
            background-color: #343224; /* اللون البني الغامق */
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f0f0f0;
        }
        tr:nth-child(odd) {
            background-color: #dcdcdc;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50; /* اللون الأخضر */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
            display: block;
            text-align: center;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .logout-btn {
            padding: 10px 20px;
            background-color: #4CAF50; /* اللون الأخضر */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: block;
            text-align: center;
        }
        .logout-btn:hover {
            background-color: #45a049; /* درجة أغمق من اللون الأخضر */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>فواتير الإستثمار في زِرايتـك</h1>
    
    <!-- عرض الفواتير في جدول -->
    <table>
        <tr>
            <th>طريقة الدفع</th>
            <th>السعر الكلي</th>
            <th>الخدمات الإضافية</th>
            <th>المعدات</th>
            <th>الأسمدة</th>
            <th>البذور</th>
            <th>الأراضي</th>
            <th>المنطقة</th>
            <th>رقم المستثمر</th>
            <th>اسم المستثمر</th>
        </tr>
        <?php
        // التحقق إذا كان هناك نتائج
        if ($result->num_rows > 0) {
            // وضع النتائج في مصفوفة
            $rows = [];
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            // عكس ترتيب المصفوفة
            $rows = array_reverse($rows);
            
            // عرض كل سجل من الفواتير
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row["payment_method"] . "</td>";
                echo "<td>" . $row["total_price"] . " OMR</td>";
                echo "<td>" . $row["additional_services"] . "</td>";
                echo "<td>" . $row["equipment"] . "</td>";
                echo "<td>" . $row["fertilizers"] . "</td>";
                echo "<td>" . $row["seeds"] . "</td>";
                echo "<td>" . $row["land"] . "</td>";
                echo "<td>" . $row["region"] . "</td>";
                echo "<td>" . $row["investor_id"] . "</td>";
                echo "<td>" . $row["investor_name"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>لا توجد فواتير حالياً</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <!-- زر تسجيل الخروج مع اللون الأخضر و التوجيه إلى الصفحة الرئيسية -->
    <a href="index.php" class="logout-btn">تسجيل الخروج</a>
</div>

</body>
</html>
