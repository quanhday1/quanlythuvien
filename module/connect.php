<?php
$host = 'localhost'; // Tên server
$dbname = 'project'; // Tên cơ sở dữ liệu
$username = 'root'; // Tên người dùng cơ sở dữ liệu
$password = ''; // Mật khẩu của người dùng cơ sở dữ liệu

// Kết nối MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die('Không thể kết nối database: ' . $mysqli->connect_error);
}

// Thiết lập bộ mã hóa kết nối
$mysqli->set_charset('utf8');

// Các câu lệnh tương tác với cơ sở dữ liệu có thể được thực hiện tại đây


?>