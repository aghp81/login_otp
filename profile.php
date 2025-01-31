<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['phone_number'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp_code = $_POST['otp_code'];
    $phone_number = $_SESSION['phone_number'];

    // Verify OTP and check expiry
    $stmt = $pdo->prepare("SELECT * FROM users WHERE phone_number = :phone_number AND otp_code = :otp_code AND otp_expiry > NOW()");
    $stmt->execute(['phone_number' => $phone_number, 'otp_code' => $otp_code]);
    $user = $stmt->fetch();

    if ($user) {
        // OTP is correct and not expired, redirect to profile
        $_SESSION['user_id'] = $user['id'];
        header('Location: profile.php');
        exit();
    } else {
        // OTP is incorrect or expired
        echo "<script>alert('کد یکبار مصرف نادرست است یا منقضی شده است.'); window.location.href='verify.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروفایل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">پروفایل کاربری</h3>
                    </div>
                    <div class="card-body">
                        <p>شماره موبایل: <?php echo $_SESSION['phone_number']; ?></p>
                        <a href="logout.php" class="btn btn-danger w-100">خروج</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>