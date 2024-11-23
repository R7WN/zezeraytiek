<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة مناطق الأراضي المستثمرة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- رابط مكتبة الأيقونات -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('m.jpg'); /*  'm.jpg'  الصورة الخلفية */
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* مربع شفاف */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            margin-bottom: 30px;
            color: #3B1A07;
        }
        /* تصميم القائمة  */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-button {
            background-color: #3B1A07;
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .dropdown-button:hover {
            background-color: #4f2a1b;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #f5f5f5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            min-width: 200px;
            z-index: 1;
            font-size: 18px;
        }
        .dropdown-content a {
            color: #3B1A07;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #ddd;
        }
        .dropdown-content a:last-child {
            border-bottom: none;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        /* إظهار القائمة عند الضغط */
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* تصميم أيقونات التحكم */
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
    </style>
</head>
<body>

    <!-- أيقونات التحكم في الصفحة -->
    <div class="icon-container">
    
        <a href="index.php" class="icon" title="الرجوع للصفحة السابقة">رجوع</a>
    </div>

    <div class="container">
        <h1>قائمة مناطق الأراضي المستثمرة في صحار</h1>

        <!-- القائمة المنسدلة -->
        <div class="dropdown">
            <button class="dropdown-button">اختر المنطقة</button>
            <div class="dropdown-content">
                <a href="big land.php">غيل الشبول</a>
                <a>خور السيابي</a>
                <a>عوتب</a>
                <a>الطريف</a>
                <a>سيح المكارم</a>
            </div>
        </div>
    </div>

</body>
</html>
