<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "library_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$address = $_POST['address'];
$contact_info = $_POST['contact_info'];

// Thêm độc giả vào cơ sở dữ liệu
$sql = "INSERT INTO readers (name, address, contact_info)
        VALUES ('$name', '$address', '$contact_info')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm độc giả thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>