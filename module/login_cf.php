<?php
// Khai báo sử dụng session
session_start();

// Khai báo utf-8 để hiển thị được tiếng Việt
header('Content-Type: text/html; charset=UTF-8');

// Xử lý đăng nhập
if (isset($_POST['login'])) {
    // Kết nối tới database
    include('connect.php');

    // Lấy dữ liệu nhập vào
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    // Kiểm tra đã nhập đủ tên đăng nhập và mật khẩu chưa
    if (empty($username) || empty($password)) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // Mã hóa mật khẩu
    

    // Sử dụng MySQLi thay vì MySQL
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        die('Không thể kết nối database: ' . $conn->connect_error);
    }

    // Kiểm tra tên đăng nhập có tồn tại không
    $query = "SELECT username, password FROM users WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // Lấy mật khẩu trong database ra
    $row = $result->fetch_assoc();

    // So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    // Lưu tên đăng nhập vào session
    $_SESSION['username'] = $username;
    header('Location: ../index.php');
    die();
}
