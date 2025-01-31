<?php
session_start();
if (!isset($_SESSION['phone_number'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأیید کد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">تأیید کد یکبار مصرف</h3>
                    </div>
                    <div class="card-body">
                        <form action="profile.php" method="POST">
                            <div class="mb-3">
                                <label for="otp_code" class="form-label">کد یکبار مصرف</label>
                                <input type="text" class="form-control" id="otp_code" name="otp_code" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">تأیید</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>