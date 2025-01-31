<?php
session_start();
require 'includes/db.php';
require 'vendor/autoload.php'; // بارگذاری کتابخانه کاوه نگار

use Kavenegar\KavenegarApi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone_number = $_POST['phone_number'];

    // Generate a random OTP
    $otp_code = rand(100000, 999999);

    // Set Tehran Time
    date_default_timezone_set("Asia/Tehran");
    // Set OTP expiry time (e.g., 5 minutes from now)
    $otp_expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    echo($otp_expiry);

    // Save OTP and expiry time to database
    $stmt = $pdo->prepare("
    INSERT INTO users (phone_number, otp_code, otp_expiry) 
    VALUES (:phone_number, :otp_code, :otp_expiry) 
    ON DUPLICATE KEY UPDATE 
        otp_code = VALUES(otp_code), 
        otp_expiry = VALUES(otp_expiry)
");
    $stmt->execute([
        'phone_number' => $phone_number,
        'otp_code' => $otp_code,
        'otp_expiry' => $otp_expiry
    ]);

    // Save phone number in session
    $_SESSION['phone_number'] = $phone_number;

    // Send OTP via SMS using Kavenegar
    $api = new KavenegarApi("347A34554C49624F2F5757443649333049586C6D6866614B792F744B55357236534D4441466E43572F63633D"); // کلید API خود را وارد کنید
    $sender = "2000660110"; // شماره فرستنده (از پنل کاوه نگار)
    $message = "کد یکبار مصرف شما: $otp_code (این کد تا ۵ دقیقه معتبر است)";

    try {
        $api->Send($sender, $phone_number, $message);
        header('Location: verify.php');
        exit();
    } catch (\Exception $e) {
        echo "خطا در ارسال SMS: " . $e->getMessage();
    }
}
?>