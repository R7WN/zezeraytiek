<?php
session_start();

// اسم المستخدم والرمز الثابتين
$admin_username = 'admin'; // اسم المستخدم الثابت هنا
$admin_password = '1234'; // الرمز الثابت هنا

// التحقق من تسجيل الدخول
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق من صحة المدخلات
    if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
        $_SESSION['is_admin'] = true; // تعيين جلسة المسؤول
        header("Location: all_invoices.php"); // إعادة التوجيه إلى صفحة الفواتير
        exit;
    } else {
        $error_message = "اسم المستخدم أو الرمز غير صحيح.";
    }
}

// التحقق من أن المستخدم هو المسؤول
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true):
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول إلى المسؤول</title>
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
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            max-width: 100%;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
            font-size: 16px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .login-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="login-container">
    <h1>مرحباً بك في صفحة الإدارة</h1>
        <p>تسجيل الدخول للمسؤول</p>
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="admin.php" method="post">
            <input type="text" name="username" placeholder="Admin name" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit">دخول</button>
        </form>
        <div class="login-footer">
            <p>هذه الصفحة يمكن الوصول إليها فقط من قبل المسؤول</p>
        </div>
    </div>

</body>
</html>
<?php
else:
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المسؤول</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('m.jpg'); /* ضع هنا رابط الخلفية أو المسار */
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .admin-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            max-width: 100%;
        }
        .admin-container h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }
        .admin-container p {
            color: #555;
            font-size: 16px;
            margin-bottom: 30px;
        }
        .logout-btn {
            padding: 15px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #e53935;
        }
        .home-btn {
            padding: 15px;
            background-color: #4CAF50;;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .home-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="admin-container">
        <h1>مرحباً بك في لوحة تحكم المسؤول</h1>
        <p>هذه الصفحة محمية ويمكن الوصول إليها فقط من قبل المسؤول.</p>
        <form action="admin.php" method="post">
            <button type="submit" name="logout" class="logout-btn">تسجيل الدخول</button>
        </form>
        <form action="index.php" method="get">
            <button type="submit" class="home-btn">العودة إلى الصفحة الرئيسية</button>
        </form>
    </div>

</body>
</html>
<?php
// إنهاء الجلسة إذا تم النقر على زر تسجيل الخروج
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}
endif;
?>
