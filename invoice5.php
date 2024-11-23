<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة الإستثمار</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <style>
        /* التنسيقات الرئيسية */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-image: url('m.jpg'); /* تأكدي من أن المسار صحيح */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            color: #444;
        }
        h1 {
            margin-bottom: 20px;
            color: #3B1A07;
            text-align: right;
            font-size: 34px;
            font-weight: bold;
        }
        .invoice-container {
            background-color: rgba(249, 249, 249, 0.8); /* الشفافية */
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            text-align: right;
        }
        
        .section-title {
            font-size: 24px;
            color: #3B1A07;
            border-bottom: 2px solid #3B1A07;
            margin-bottom: 15px;
            padding-bottom: 5px;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        label {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
            color: #444;
        }
        .total-price {
            font-weight: bold;
            font-size: 18px;
            color: #3B1A07;
            margin-top: 15px;
        }
        .payment-options {
            display: flex;
            justify-content: flex-end; 
            gap: 10px;
            margin-bottom: 15px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
            align-items: center;
        }
        .button-container button, .button-container a {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 80%;
            text-align: center;
            transition: background-color 0.3s;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* إضافة تظليل العنوان */
        }
        .button-container button:hover, .button-container a:hover {
            background-color: #4f2a1b;
        }
        a {
            text-decoration: none; 
        }
        .slick-slide {
            text-align: center;
            padding: 10px;
            position: relative; /* لضمان بقاء النص والـ checkbox فوق الصورة */
        }

        .slick-slide img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* تعديل النص والـ checkbox ليظهر فوق الصورة */
        .slick-slide h3, .slick-slide p, .slick-slide input[type="checkbox"] {
            position: absolute;
            top: 85%; /* لضبط النص والـ checkbox في منتصف الصورة */
            left: 50%;
            transform: translate(-50%, -50%); /* لضبط النص في المنتصف تماماً */
            color: #fff; /* تغيير لون النص ليتناسب مع الخلفية */
            font-size: 22px; /* يمكنك تعديل حجم الخط */
            font-weight: bold; /* يمكنك تعديل سمك الخط */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 2.9); /* إضافة تأثير الظل على النص */
            z-index: 1; /* التأكد من أن النص والـ checkbox فوق الصورة */
        }

        /* تعديل مكان الـ checkbox */
        .slick-slide input[type="checkbox"] {
            top: 91%; /* يمكنك تعديل هذه القيمة لضبط مكان الـ checkbox */
            left: 74%;
            transform: translate(-50%, -60%); /* ضبط الـ checkbox بشكل دقيق */
            z-index: 2; /* تأكد من أن الـ checkbox يظهر فوق النص */
        }

        /* رسالة تحديث السعر */
        #price-update-message {
            font-size: 16px;
            color: #3B1A07;
            font-weight: bold;
            margin-top: 5px;
            display: none;
            text-align: center;
        }
        /* تنسيقات رسالة تأكيد الطلب */
        #confirmation-message {
            font-size: 16px;
            color: #3B1A07;
            font-weight: bold;
            margin-top: 15px;
            display: none;
            text-align: center;
        }
        
        
    </style>
</head>
<body>

<h1>فاتورة الإستثمار</h1>

<div class="invoice-container">
    <div class="section-title"><b>تفاصيل المستثمر</b></div>
    <form id="invoice-form" action="store_invoice.php" method="post">
        <div class="form-group">
            <label for="investor-name">اسم المستثمر</label>
            <input type="text" id="investor-name" name="investor_name" required>
        </div>

        <div class="form-group">
            <label for="investor-id">رقم المستثمر</label>
            <input type="text" id="investor-id" name="investor_id" required>
        </div>

        <div class="form-group">
            <label>المنطقة</label>
            <p><b>غيل الشبول</b></p>
        </div>

        <div class="form-group">
            <label for="land-id">رقم قطعة الأرض</label>
            <select id="land-id" name="land" required>
                <option value="5">قطعة الأرض 5</option>
            </select>
        </div>

            <!-- خيارات البذور، الأسمدة، المعدات، والخدمات الإضافية  -->
            <b><div class="section-title">البذور</div></b>
            <div class="seeds-carousel">
                <div class="slick-slide">
                    <img src="jj.jpg" alt="بذور 5">
                    <p>بذور الفندال - 0.700 ر.ع </p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الفندال ,0.700"> </label>
                </div>
                <div class="slick-slide">
                    <img src="55.jpg" alt="بذور 1">
                    <p>بذور الفلفل حار - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الفلفل حار ,0.700"></label>
                </div>
                <div class="slick-slide">
                    <img src="22.jpg" alt="بذور 1">
                    <p>بذور الفاصوليا - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الفاصوليا,0.700"></label>
                </div>
                <div class="slick-slide">
                    <img src="33.jpg" alt="بذور 2">
                    <p>بذور الباذنجان - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الباذنجان ,0.700"></label>
                </div>
                <div class="slick-slide">
                    <img src="hh.jpg" alt="بذور 3">
                    <p>بذور البرتقال - 1 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور برتقال ,1"></label>
                </div>
                <div class="slick-slide">
                    <img src="gg.jpg" alt="بذور 4">
                    <p>بذور الليمون - 1 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الليمون ,1"></label>
                </div>
                <div class="slick-slide">
                    <img src="88.jpg" alt="بذور 5">
                    <p>بذور البصل - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور بصل ,0.700"> </label>
                </div>
                <div class="slick-slide">
                    <img src="77.jpg" alt="بذور 5">
                    <p>بذور الجزر - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الجزر ,0.700"> </label>
                </div>
                <div class="slick-slide">
                    <img src="00.jpg" alt="بذور 5">
                    <p>بذور الخيار - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور الخيار ,0.700"> </label>
                </div>
                <div class="slick-slide">
                    <img src="kk.jpg" alt="بذور 5">
                    <p>بذور البطاطا - 0.700 ر.ع</p>
                    <label><input type="checkbox" name="seeds[]" value="بذور البطاطا,0.700"> </label>
                </div>
            </div>

            <b><div class="section-title">الأسمدة</div></b>
            <div class="fertilizers-carousel">
                <div class="slick-slide">
                    <img src="vvv.avif" alt="سماد 1">
                    <p>سماد عضوي - 30 كيلو 8 ر.ع</p>
                    <label><input type="checkbox" name="fertilizers[]" value="سماد عضوي ,8"></label>
                </div>
                <div class="slick-slide">
                    <img src="vvv.avif" alt="سماد 3">
                    <p>سماد بيوتكنولوجي - 30 كيلو 8 ر.ع</p>
                    <label><input type="checkbox" name="fertilizers[]" value="سماد بيوتكنولوجي ,8"></label>
                </div>
            </div>

            <b><div class="section-title">المعدات</div></b>
            <div class="equipment-carousel">
                <div class="slick-slide">
                    <img src="equipment1.png" alt="معدات 1">
                    <p>معدات الزراعة - 5 ر.ع</p>
                    <label><input type="checkbox" name="equipment[]" value="معدات الزراعة ,5"></label>
                </div>
                <div class="slick-slide">
                    <img src="equipment2.jpg" alt="معدات 2">
                    <p>معدات ري - 5 ر.ع</p>
                    <label><input type="checkbox" name="equipment[]" value="معدات ري ,5"></label>
                </div>
                <div class="slick-slide">
                    <img src="equipment.jpg" alt="معدات 3">
                    <p>معدات حصاد - 5 ر.ع</p>
                    <label><input type="checkbox" name="equipment[]" value="معدات حصاد ,5"></label>
                </div>
            </div>

            <b><div class="section-title">الخدمات الإضافية</div></b>
            <div class="additional-services-carousel">
                <div class="slick-slide">
                    <img src="wee.jpg" alt="خبراء زراعة">
                    <p>خبراء زراعة - 20 ر.ع</p>
                    <label><input type="checkbox" name="additional_services[]" value="خبراء زراعة ,20"></label>
                </div>
                <div class="slick-slide">
                    <img src="move.png" alt="نقل">
                    <p>النقل خارج صحار - 2.500 ر.ع</p>
                    <label><input type="checkbox" name="additional_services[]" value="خدمة النقل ,2.500"></label>
                </div>
                <div class="slick-slide">
                    <img src="move.png" alt="نقل">
                    <p> النقل داخل صحار - مجاني</p>
                    <label><input type="checkbox" name="additional_services[]" value="خدمة النقل ,0"></label>
                </div>
                <div class="slick-slide">
                    <img src="weee.jpg" alt="الأحواض">
                    <p>الأحواض - 2 ر.ع</p>
                    <label><input type="checkbox" name="additional_services[]" value="الأحواض ,2"></label>
                </div>
                <div class="slick-slide">
                    <img src="wer.png" alt="الورش">
                    <p>الورش - 7 ر.ع</p>
                    <label><input type="checkbox" name="additional_services[]" value="الورش ,7"></label>
                </div>
            </div>

            <b><div class="section-title">الأسعار</div></b>
            <div class="form-group total-price">
                إجمالي السعر <span id="total">60</span> ريال عماني
                <div id="price-update-message">تم تحديث السعر!</div>
            </div>

            <b><div class="section-title">آلية الدفع</div></b>
            <div class="payment-options">
                <label><input type="radio" name="payment" value="أقساط شهرية" required> أقساط شهرية</label>
                <label><input type="radio" name="payment" value="دفع مقدم" required> دفع مقدم</label>
            </div>

            <div class="button-container">
                <button type="button" onclick="submitForm()">تأكيد الطلب</button>
                <a href="bill.php">عرض الفاتورة</a>
                <a href="land.php">رجوع</a>
                <a href="index.php">الصفحة الرئيسية</a>
            </div>

            <!-- رسالة تأكيد الطلب -->
            <div id="confirmation-message">تم تخزين الفاتورة بنجاح</div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('.seeds-carousel, .fertilizers-carousel, .equipment-carousel, .additional-services-carousel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: true
        });

        const basePrice = 60;
        let total = basePrice;

        function updateTotal() {
            total = basePrice;
            $('input[type="checkbox"]:checked').each(function() {
                const value = $(this).val().split(',')[1];
                total += parseFloat(value); // استخدام parseFloat لدعم القيم العشرية
            });
            $('#total').text(total.toFixed(3)); // عرض المجموع بثلاث خانات عشرية
            $('#price-update-message').fadeIn(300).delay(1000).fadeOut(300);
        }

        $('input[type="checkbox"]').on('change', updateTotal);
    });

    function submitForm() {
        $.ajax({
            url: 'store_invoice.php',
            type: 'POST',
            data: $('#invoice-form').serialize() + '&total_price=' + $('#total').text(),
            success: function(response) {
                if (response === "success") {
                    $('#confirmation-message').fadeIn(300).delay(2000).fadeOut(300);
                } else {
                    alert("تمت العملية بنجاح");
                }
            }
        });
    }
</script>

</body>
</html>
