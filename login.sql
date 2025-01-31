CREATE DATABASE login_system;
USE login_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(15) NOT NULL UNIQUE,
    otp_code VARCHAR(6),
    otp_expiry DATETIME, -- زمان انقضای کد یکبار مصرف
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);