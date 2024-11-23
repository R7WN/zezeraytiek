
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بيانات قطعة أرض</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* إعدادات الصفحة الأساسية */
        body {
            background-color: #B4DF8B;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
            position: relative;
            background-size: cover;
        }
        
        /* تصميم الفيديو */
        .video-container {
            position: relative;
            width: 60vw;
            height: 45vw;
            overflow: visible;
            border-radius: 10px;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* تصميم الخطوط */
        .line {
            position: absolute;
            width: 2px;
            background-color: #3B1A07;
            opacity: 0;
            transition: opacity 0.5s ease, height 0.5s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* مواقع الخطوط والنصوص */
        .line.line1 { top: 10%; left: 50%; height: 20%; transform: translate(-50%, 0); }
        .line.line2 { bottom: 10%; left: 50%; height: 20%; transform: translate(-50%, 0); }
        .line.line3 { left: 10%; top: 50%; width: 20%; height: 2px; transform: translate(0, -50%); }
        .line.line4 { right: 10%; top: 50%; width: 20%; height: 2px; transform: translate(0, -50%); }
        .line.line7 { top: 30%; left: 70%; height: 2px; width: 20%; transform: translate(-50%, -50%) rotate(-45deg); }


        /* تصميم النصوص */
        .arrow {
            position: absolute;
            color: #3B1A07;
            padding: 3px;
            font-size: 20px;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            white-space: nowrap;
            left: 50%;
            transform: translateX(-50%);
            overflow: visible;
        }

        /* تثبيت مواقع النصوص */
        .arrow.arrow1 { top: 5%; transform: translate(-50%, -30%); }
        .arrow.arrow2 { bottom: 5%; transform: translate(-50%, 30%); }
        .arrow.arrow3 { left: 5%; top: 50%; transform: translate(-80%, -50%); }
        .arrow.arrow4 { right: 5%; top: 50%; transform: translate(90%, -50%); }
        .arrow.arrow7 { top: 19%; left: 89%; transform: translate(-96%, -50%); }


        /* تصميم الأيقونات */
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

        .show { opacity: 1; transform: translate(0, 0); }

        /* تنسيقات الرابط الأخير */
        .arrow a {
            color: #3B1A07;
            text-decoration: none;
        }

        .arrow a:hover {
            color: #3B1A07;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- أيقونات التحكم في زاوية الخلفية -->
    <div class="icon-container">
        
        <a href="invoice.php" class="icon" title="استمرار الطلب">
            استمرار
        </a>
        <a href="big land.php" class="icon" title="الرجوع للصفحة السابقة">
            رجوع
        </a>
    </div>

    <!-- صندوق الفيديو -->
    <div class="video-container">
        <video autoplay muted loop>
            <source src="land.MP4" type="video/mp4">
            متصفحك لا يدعم تشغيل الفيديو.
        </video>
        
        <!-- الخطوط والنصوص -->
        <div class="line line1"></div>
        <div class="line line2"></div>
        <div class="line line3"></div>
        <div class="line line4"></div>
        <div class="line line7"></div>

        <div class="arrow arrow1">مساحة قطعة الأرض 60 متر مربع</div>
        <div class="arrow arrow2"><a href="https://maps.google.com/?q=24.325699,56.750519">موقع الأرض</a></div>
        <div class="arrow arrow3">سعر الإستثمار 60 ر.ع شهرياً</div>
        <div class="arrow arrow4">مؤشر درجة الحرارة  35ْ - 18ْ</div>
        <div class="arrow arrow7">مدة الإستثمار 5 شهور</div>
    </div>

    <script>
        let index = 0;
        const lines = document.querySelectorAll('.line');
        const arrows = document.querySelectorAll('.arrow');

        function showNext() {
            if (index < lines.length - 1) {
                lines[index].style.opacity = '1';
                arrows[index].classList.add('show');
                index++;
                setTimeout(showNext, 1000);
            } else {
                // تظهر العناصر السابقة
                lines[index].style.opacity = '1';
                arrows[index].classList.add('show');

                // تظهر العنصر الأخير بعد التأخير المطلوب
                setTimeout(() => {
                    document.querySelector('.line.line7').style.opacity = '1';
                    document.querySelector('.arrow.arrow7').classList.add('show');
                }, 2000);  // التأخير لإظهار النص الأخير بعد العناصر الأخرى
            }
        }

        window.onload = () => {
            setTimeout(showNext, 1000);
        };
    </script>    
</body>
</html>
