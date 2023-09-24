<?php
include('connect.php');

// Kiểm tra xem biến $_POST['id'] có tồn tại không
if (isset($_POST['id'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];

    // Xóa sách từ cơ sở dữ liệu
    $sql = "DELETE FROM books WHERE id='$id'";

    if ($mysqli->query($sql) === TRUE) {
    $message = "Thêm sách thành công";
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