<?php
include('connect.php');

// Kiểm tra xem biến $_POST['id'] có tồn tại không
if (isset($_POST['id'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact_info = $_POST['contact_info'];
    // Xóa sách từ cơ sở dữ liệu
    $sql = "UPDATE readers SET name = '$name', address = '$address', contact_info = '$contact_info' WHERE id = $id";
    if ($mysqli->query($sql) === TRUE) {
        $message = "Sửa dữ liệu thành công";
        // Tạo mã JavaScript để hiển thị thông báo
        $javascriptCode = "alert('" . addslashes($message) . "');";
        $javascriptCode .= "window.history.back();";
        // In ra mã JavaScript
         echo "<script>{$javascriptCode}</script>";
        

    sleep(2);
    } else {
        echo "Lỗi: " . $mysqli->error;
    }
} else {
    echo "Lỗi: Không tìm thấy giá trị id trong biến \$_POST";
}

// Đóng kết nối
$mysqli->close();
?>


