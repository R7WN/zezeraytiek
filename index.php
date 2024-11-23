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
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استرجاع بيانات المستثمرين من الجدول
$sql = "SELECT investor_name FROM bill";  // استرجاع اسم المستثمر من جدول "bill"
$result = $conn->query($sql);

// التحقق من وجود بيانات
if ($result->num_rows > 0) {
    $investors = [];
    while($row = $result->fetch_assoc()) {
        $investors[] = $row['investor_name'];  // تخزين اسم المستثمر في مصفوفة
    }
} else {
    $investors = [];
}

// إغلاق الاتصال بعد الانتهاء
$conn->close();
?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>زرايتك</title>
    <style>
        /* إعدادات أساسية */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        body {
            background-image: url('m.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }

        /* شريط التنقل */
        .navbar {
            position: absolute;
            top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            width: 100%;
        }

        .navbar a {
            color: #343224;
            font-size: 20px;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            transition: color 0.3s, background-color 0.3s, border-radius 0.3s;
            position: relative;
        }

        .navbar a:hover {
            color: #343224;
            background-color: white;
            border-radius: 20px;
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 220px;
            background-color: white;
            color: #204209;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            font-size: 16px;
            line-height: 1.5;
            opacity: 0.95;
            white-space: pre-wrap;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        /* العنوان والنص الفرعي */
        .title {
            font-size: 150px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: -90px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .subtitle {
            font-size: 32px;
            color: #E0F2F1;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        /* جدول الإشعارات */
        #notification-table {
            display: none;
            position: absolute;
            top: 80px;
            right: 20px;
            background-color: white;
            color: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        #notification-table table {
            width: 100%;
            border-collapse: collapse;
        }

        #notification-table th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* زر استمرار */
        .continue-btn {
            position: absolute;
            bottom: 20px;
            padding: 10px 30px;
            font-size: 22px;
            background-color: white;
            color: #343224;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .continue-btn:hover {
            background-color: #343224;
            color: white;
        }
            /* تنسيق جدول الإشعارات */
        #notification-table {
            display: none;
            position: absolute;
            top: 80px;
            right: 20px;
            background-color: white;
            color: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        #notification-table table {
            width: 100%;
            border-collapse: collapse;
        }

        #notification-table th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        #notification-table a {
    color: black; /* تغيير اللون إلى الأسود */
    text-decoration: none; /* إزالة الخط تحت الرابط */
}

#notification-table a:hover {
    color: #343224; /* تغيير اللون عند التمرير على الرابط */
    text-decoration: none; /* إزالة الخط تحت الرابط عند التمرير */
}

        
    </style>
</head>
<body>

    <!-- شريط التنقل -->
    <nav class="navbar">
        <!-- أيقونة الإشعارات -->
        <div class="tooltip">
            <a href="javascript:void(0);" onclick="toggleNotifications()"><b>الإشعارات</b></a>
            
        </div>

        <div class="tooltip">
            <a href="#aboutus"><b>نوفر لكم</b></a>
            <span class="tooltiptext">نوفر لكم البذور و مستلزمات زراعية أخرى</span>
        </div>
        <div class="tooltip">
            <a href="#aboutus"><b>الرسالة</b></a>
            <span class="tooltiptext">توفير منصة زراعية ذكية تجمع بين التكنولوجيا والبيئة، لتسهيل استئجار الأراضي الزراعية وتوجيه الأفراد نحو زراعة مستدامة ومثمرة، ودعم مجتمع زراعي مزدهر ومستدام</span>
        </div>
        <div class="tooltip">
            <a href="#contact"><b>الرؤية</b></a>
            <span class="tooltiptext">أن نصبح المنصة الرائدة  في تقديم حلول الزراعة الذكية، التي تمكّن الأفراد من استئجار وتنمية الأراضي الزراعية، لنساهم في إحداث تغيير مستدام ومستقبل زراعي أفضل </span>
        </div>
        <div class="tooltip">
            <a href="#contact"><b>من نحن</b></a>
            <span class="tooltiptext">نحن شركة نؤمن بأن الزراعة المستقبلية تعتمد على الابتكار والذكاء الاصطناعي، نسعى لتقديم حلول ذكية لسهيل تأجير الأراضي الزراعية. نقدم تجربة زراعية تدمج بين التقنية والبيئة، لتمكين الجميع من زراعة مساحاتهم بسهولة واستدامة</span>
        </div>
        <a href="#home"><b>الصفحة الرئيسية</b></a>

        
    </nav>

    <!-- جدول الإشعارات -->
    <div id="notification-table">
        <table>
            <thead>
                <tr>
                    <th>اسم المستثمر</th>
                    <th>الفاتورة</th>
                </tr>
            </thead>
            <tbody>
                <!-- عرض بيانات المستثمرين -->
                <?php if (count($investors) > 0): ?>
                    <?php foreach ($investors as $investor): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($investor); ?></td>
                            <td><a href="admin.php?investor_name=<?php echo urlencode($investor); ?>">رابط الفاتورة</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">لا توجد بيانات للمستثمرين</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <!-- العنوان والنص الفرعي -->
    <div class="content">  
        <h1 class="title">زِرايتـك</h1>
        <p class="subtitle">نزرع المستقبل بلمسة ذكية</p>
    </div>

    <!-- زر استمرار -->
    <button class="continue-btn" onclick="location.href='list.php'">استمرار</button>

    <script>
        function toggleNotifications() {
            var table = document.getElementById('notification-table');
            if (table.style.display === "none" || table.style.display === "") {
                table.style.display = "block";
            } else {
                table.style.display = "none";
            }
        }
    </script>
</body>
</html>
