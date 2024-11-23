<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شبكة الأراضي</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('m.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* طبقة تغطي الخلفية لزيادة التعتيم */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* لون داكن مع شفافية */
            z-index: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* مربع شفاف */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        h1 {
            margin-bottom: 30px;
            color: #3B1A07;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 120px);
            grid-gap: 15px;
            justify-content: center;
        }

        .grid-item {
            width: 120px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 20px;
            cursor: pointer;
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s;
        }

        .grid-item:hover img {
            opacity: 0.8;
        }

        .icon-container {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
            margin-right: 1%;
            z-index: 1;
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
    <div class="icon-container">
        <a href="Crop Table.php" class="icon" title="جدول المحاصيل الزراعية">
            <i class="fas fa-table"></i>
        </a>
        <a href="list.php" class="icon" title="الرجوع للصفحة السابقة">رجوع</a>
    </div>

    <div class="container">
        <h1>أرض استثمار بمساحة 600 كم في غيل الشبول</h1>

        <div class="grid-container">
            <a href="land.php?plot=1" class="grid-item"><img src="1.JPG" alt="قطعة 1"></a>
            <a href="land2.php?plot=2" class="grid-item"><img src="2.JPG" alt="قطعة 2"></a>
            <a href="land3.php?plot=3" class="grid-item"><img src="3.JPG" alt="قطعة 3"></a>
            <a href="land4.php?plot=4" class="grid-item"><img src="4.JPG" alt="قطعة 4"></a>
            <a href="land5.php?plot=5" class="grid-item"><img src="5.JPG" alt="قطعة 5"></a>
            <a href="land6.php?plot=6" class="grid-item"><img src="6.JPG" alt="قطعة 6"></a>
            <a href="land7.php?plot=7" class="grid-item"><img src="7.JPG" alt="قطعة 7"></a>
            <a href="land8.php?plot=8" class="grid-item"><img src="8.JPG" alt="قطعة 8"></a>
            <a href="land9.php?plot=9" class="grid-item"><img src="9.JPG" alt="قطعة 9"></a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
