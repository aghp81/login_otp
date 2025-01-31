<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سیستم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">ورود به سیستم</h3>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">شماره موبایل</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">دریافت کد یکبار مصرف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>