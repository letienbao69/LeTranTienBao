<?php
$host = 'localhost'; // Địa chỉ máy chủ MySQL
$user = 'root';      // Tên người dùng MySQL
$pass = '';          // Mật khẩu MySQL
$dbname = 'web_mysqli'; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
