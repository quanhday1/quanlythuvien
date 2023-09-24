<?php
// Bắt đầu session
session_start();

// Xóa tất cả các biến session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
header("Location: login.php");
exit;
?>