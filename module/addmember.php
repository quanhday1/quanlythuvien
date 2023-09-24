<?php
include('connect.php');

// Lấy dữ liệu từ form
$name = $_POST['name'];
$address = $_POST['address'];
$contact_info = $_POST['contact_info'];

// Thêm độc giả vào cơ sở dữ liệu
$sql = "INSERT INTO readers (name, address, contact_info)
        VALUES ('$name', '$address', '$contact_info')";
if ($mysqli->query($sql) === TRUE) {
        
    $message = "Thêm thành viên thành công";

    // Tạo mã JavaScript để hiển thị thông báo
    $javascriptCode = "alert('" . addslashes($message) . "');";
    $javascriptCode .= "window.history.back();";
    // In ra mã JavaScript
    echo "<script>{$javascriptCode}</script>";

    sleep(2);
    
} else {
    echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
}

// Đóng kết nối
$mysqli->close();
?>