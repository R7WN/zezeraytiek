<style>
    body {
        font-family: 'Arial', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        background-image: url('m.jpg');
        background-size: cover;
        color: #333;
        direction: rtl;
    }
    .container {
        width: 90%;
        max-width: 600px;
        text-align: center;
        background: rgba(255, 255, 255, 0.7); /* جعل الخلفية شفافة */
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .header {
    font-size: 2.8em;
    color: white; /* تغيير اللون إلى الأبيض */
    font-weight: bold;
    margin-bottom: 30px; /* المسافة أسفل العنوان */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* إضافة تظليل العنوان */
}

    .back-button {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #4CAF50; /* اللون الأخضر */
        color: white;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .back-button:hover {
        background-color: #45a049; /* درجة داكنة من الأخضر */
    }
    .toggle-buttons {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        gap: 10px;
    }
    .toggle-button {
        flex: 1;
        padding: 15px;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
        background-color: #81c784; /* تغيير اللون الأزرق إلى أخضر */
        border-radius: 10px;
        transition: background-color 0.3s ease;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
    }
    .toggle-button:hover {
        background-color: #66bb6a; /* درجة داكنة من الأخضر */
    }
    .toggle-button.active {
        background-color: #4CAF50; /* اللون الأخضر */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }
    th {
        background-color: #4CAF50; /* اللون الأخضر */
        color: #ffffff;
        font-weight: bold;
    }

    /* تنسيق الأيقونات */
    .icon-container {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 10px;
        margin-right: 1%;
    }

    .icon {
        color: #3B1A07;
        padding: 10px 15px;
        cursor: pointer;
        font-weight: bold;
        font-size: 20px;
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #f0f0f0;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
    }

    .icon:hover {
        background-color: white;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .show {
        opacity: 1;
        transform: translate(0, 0);
    }
</style>


</head>
<body>

    <!-- أيقونة الرجوع -->
    <div class="icon-container">
        <a href="big land.php" class="icon" title="الرجوع للصفحة السابقة">
            رجوع
        </a>
    </div>

    <!-- العنوان فوق المربع الشفاف -->
    <div class="header">جدول زراعة المحاصيل الموسمية في سلطنة عمان</div>

    <div class="container">
        <!-- أيقونات التحويل بين الموسمين -->
        <div class="toggle-buttons">
            <div id="summer-btn" class="toggle-button active" onclick="showSeason('summer')">الموسم الصيفي</div>
            <div id="winter-btn" class="toggle-button" onclick="showSeason('winter')">الموسم الشتوي</div>
        </div>

        <!-- جدول الموسم الصيفي -->
        <table id="summer-table">
            <tr>
                <th>المحصول</th>
                <th>الشهور</th>
            </tr>
            <tr>
                <td>الشمام</td>
                <td>فبراير - مارس</td>
            </tr>
            <tr>
                <td>الفندال</td>
                <td>فبراير</td>
            </tr>
            <tr>
                <td>البطيخ</td>
                <td>يناير - مارس</td>
                </tr>
            <tr>
                <td>القرع</td>
                <td>سبتمبر - نوفمبر</td>
                </tr>
            <tr>
                <td>الباميا</td>
                <td>فبراير - مارس</td>
            </tr>
        </table>

        <!-- جدول الموسم الشتوي -->
        <table id="winter-table" style="display: none;">
            <tr>
                <th>المحصول</th>
                <th>الشهور</th>
            </tr>
            <tr>
                <td>الطماطم</td>
                <td>سبتمبر - نوفمبر</td>
            </tr>
            <tr>
                <td>البصل</td>
                <td>نوفمبر - ديسمبر</td>
            </tr>
            <tr>
                <td>الفلفل</td>
                <td>اغسطس - نوفمبر</td>
                </tr>
            <tr>
                <td>الخيار</td>
                <td>سبتمبر - نوفمبر</td>
                </tr>
            <tr>
                <td>الفاصوليا</td>
                <td>اكتوبر - نوفمبر</td>
            </tr>
        </table>
    </div>

    <script>
        function showSeason(season) {
            // تفعيل الزر الصحيح
            document.getElementById('summer-btn').classList.remove('active');
            document.getElementById('winter-btn').classList.remove('active');
            document.getElementById(season + '-btn').classList.add('active');
            
            // عرض الجدول الصحيح
            document.getElementById('summer-table').style.display = season === 'summer' ? 'table' : 'none';
            document.getElementById('winter-table').style.display = season === 'winter' ? 'table' : 'none';
        }
    </script>

</body>
</html>
